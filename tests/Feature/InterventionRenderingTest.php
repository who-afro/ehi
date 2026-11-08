<?php

namespace Tests\Feature;

use App\Models\AgeCohort;
use App\Models\Condition;
use App\Models\Intervention;
use App\Models\LevelOfCare;
use App\Models\ProgramArea;
use App\Models\PublicHealthFunction;
use App\View\ReferenceData;
use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Event;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class InterventionRenderingTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        Cache::memo()->flush();

        foreach (['program_groups', 'program_areas', 'conditions', 'age_cohorts', 'level_of_cares', 'public_health_functions'] as $table) {
            Schema::create($table, function (Blueprint $table): void {
                $table->id();
                $table->text('name');
                $table->text('description')->nullable();
                $table->string('uuid')->nullable();
                $table->string('slug')->nullable();
                $table->unsignedBigInteger('program_group_id')->nullable();
                $table->unsignedBigInteger('program_area_id')->nullable();
                $table->integer('min_age')->nullable();
                $table->integer('max_age')->nullable();
                $table->string('who')->nullable();
                $table->string('snomed')->nullable();
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }
    }

    public function testMarkdownIsReusedAndChangesWithContentAndLocale(): void
    {
        $intervention = Intervention::factory()->make(['details' => '**Original**']);
        $writes = [];
        Event::listen(KeyWritten::class, function (KeyWritten $event) use (&$writes): void {
            $writes[] = $event->key;
        });

        $this->assertStringContainsString('<strong>Original</strong>', $intervention->rendered_details);
        $firstWriteCount = count($writes);
        $this->assertGreaterThan(0, $firstWriteCount);
        $this->assertStringContainsString('<strong>Original</strong>', $intervention->rendered_details);
        $this->assertCount($firstWriteCount, $writes);

        $intervention->details = '*Updated*';
        $this->assertStringContainsString('<em>Updated</em>', $intervention->rendered_details);
        app()->setLocale('fr');
        $this->assertStringContainsString('<em>Updated</em>', $intervention->rendered_details);
        $this->assertCount(3, array_unique($writes));
    }

    public function testReferenceDataIsReusedAndInvalidatedAfterCommittedChanges(): void
    {
        $cohort = AgeCohort::factory()->create(['name' => ['en' => 'Adults', 'fr' => 'Adultes']]);
        $composer = new ReferenceData;
        $view = View::make('components.nav');
        $composer->compose($view);

        DB::enableQueryLog();
        $composer->compose($view);
        $this->assertSame([], DB::getQueryLog());
        $this->assertSame('Adults', $view->getData()['referenceAgeCohorts']->first()->name);
        app()->setLocale('fr');
        $this->assertSame('Adultes', $view->getData()['referenceAgeCohorts']->first()->name);

        DB::transaction(function () use ($cohort): void {
            $cohort->update(['name' => ['en' => 'Changed']]);
            $this->assertTrue(Cache::memo()->has(ReferenceData::CacheKey));
        });
        $this->assertFalse(Cache::memo()->has(ReferenceData::CacheKey));
        $composer->compose($view);
        app()->setLocale('en');
        $this->assertSame('Changed', $view->getData()['referenceAgeCohorts']->first()->name);

        $cohort->delete();
        $composer->compose($view);
        $this->assertTrue($view->getData()['referenceAgeCohorts']->isEmpty());
    }

    public function testAllDetailViewsRenderEachInterventionInTheCorrectCellWithoutQueries(): void
    {
        $condition = Condition::factory()->create(['name' => ['en' => 'Condition heading']]);
        $cohort = AgeCohort::factory()->create(['name' => ['en' => 'Cohort heading']]);
        $level = LevelOfCare::factory()->create(['id' => 11, 'name' => 'Care heading']);
        $function = PublicHealthFunction::factory()->create(['id' => 22, 'name' => 'Function heading']);
        $otherLevel = LevelOfCare::factory()->create(['id' => 33, 'name' => 'Other care']);
        $otherFunction = PublicHealthFunction::factory()->create(['id' => 44, 'name' => 'Other function']);
        $items = new Collection;
        foreach ([[$level, $function, '**First intervention**', true], [$otherLevel, $otherFunction, '*Second intervention*', false]] as [$care, $healthFunction, $details, $confirmed]) {
            $items->push(Intervention::factory()->make([
                'condition_id' => $condition->id,
                'age_cohort_id' => $cohort->id,
                'level_of_care_id' => $care->id,
                'public_health_function_id' => $healthFunction->id,
                'details' => $details,
                'confirmed_with_evidence' => $confirmed,
            ])->setRelation('condition', $condition)->setRelation('ageCohort', $cohort));
        }
        (new ReferenceData)->compose(View::make('components.nav'));
        DB::enableQueryLog();

        foreach (['condition', 'age-cohort', 'level-of-care', 'public-health-function', 'intervention'] as $name) {
            $interventions = $name === 'intervention' ? new LengthAwarePaginator($items, 2, 1000) : $items;
            $html = View::make("components.details.{$name}", compact('interventions'))->render();
            $this->assertSame(1, substr_count($html, '<strong>First intervention</strong>'), $name);
            $this->assertSame(1, substr_count($html, '<em>Second intervention</em>'), $name);
            $this->assertStringContainsString('intervention-details text-iaho-green', $html);
            $this->assertStringContainsString($name === 'condition' ? 'Cohort heading' : 'Condition heading', $html);
            if ($name === 'public-health-function') {
                $document = new \DOMDocument;
                $document->loadHTML($html);
                $cells = (new \DOMXPath($document))->query('//tbody/tr[2]/td');
                $this->assertStringContainsString('First intervention', $cells->item(0)->textContent);
                $this->assertStringContainsString('Second intervention', $cells->item(1)->textContent);
            }
        }

        $this->assertSame([], DB::getQueryLog());
    }

    public function testDetailLabelsAreEagerLoadedInTwoQueriesForMultipleInterventions(): void
    {
        $condition = Condition::factory()->create(['name' => ['en' => 'Shared condition']]);
        $cohort = AgeCohort::factory()->create();
        $level = LevelOfCare::factory()->create();
        $function = PublicHealthFunction::factory()->create();
        $interventions = Intervention::factory()->count(10)->make([
            'condition_id' => $condition->id,
            'age_cohort_id' => $cohort->id,
            'level_of_care_id' => $level->id,
            'public_health_function_id' => $function->id,
            'details' => '**Repeated content**',
        ]);
        (new ReferenceData)->compose(View::make('components.nav'));
        DB::enableQueryLog();

        $html = View::make('components.details.age-cohort', compact('interventions'))->render();

        $this->assertStringContainsString('Shared condition', $html);
        $this->assertSame(10, substr_count($html, '<strong>Repeated content</strong>'));
        $this->assertCount(2, DB::getQueryLog());
    }

    public function testEmptyDetailViewsDoNotRenderInterventions(): void
    {
        foreach (['condition', 'age-cohort', 'level-of-care', 'public-health-function', 'intervention'] as $name) {
            $html = View::make("components.details.{$name}", ['interventions' => new Collection])->render();
            $this->assertStringNotContainsString('<table', $html);
        }
    }

    public function testNavigationAndFiltersUseTheSameCachedReferenceData(): void
    {
        $area = ProgramArea::factory()->create();
        $condition = Condition::factory()->create(['program_area_id' => $area->id, 'name' => ['en' => 'Cached condition']]);
        Condition::factory()->create(['name' => ['en' => 'Other condition']]);
        (new ReferenceData)->compose(View::make('components.nav'));
        DB::enableQueryLog();

        $html = View::make('components.filters.condition', ['programAreaId' => $area->id])->render();
        $this->assertStringContainsString($condition->name, $html);
        $this->assertStringNotContainsString('Other condition', $html);
        View::make('components.nav')->render();
        $this->withoutVite()->get('/')->assertOk();
        $this->assertSame([], DB::getQueryLog());
    }
}
