<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InterventionsExport implements FromCollection, WithHeadings
{
    private $interventions;

    use Exportable;

    public function __construct(Collection $interventions)
    {
        $thiss = $interventions;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $thiss;
    }

    public function headings(): array
    {
        return [
            'Program Area',
            'Condition',
            'Age Cohort',
            'Public Health Function',
            'Service Area',
            'Intervention'
        ];
    }
}
