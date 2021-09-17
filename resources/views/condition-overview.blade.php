<x-app-layout>
    <x-slot name="header">
            {{ __('Conditions') }}
    </x-slot>

    <div class="max-w-7xl mx-auto prose">
        The program areas in the digital toolkit are derived from the WHO Global burden of diseases, click on a program area to show details
        <!-- accordian inspiration and code adapted from https://codepen.io/QJan84/pen/zYvRMMw -->
        <div class="mt-4" x-data="{selected:null}">
                @foreach(App\Models\ProgramArea::has('conditions')->get() as $programArea)
                    <div class="grid grid-cols-2 relative rounded-lg border border-gray-300 bg-white px-6 py-5 my-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 cursor-pointer" @click="selected !== {{ $programArea->id }} ? selected = {{ $programArea->id }} : selected = null; ">
                        <div class="align-top">{{ $programArea->name }}
                            <span x-bind:style="selected == {{ $programArea->id }} ? '' : 'display:none'" style="display: none;">
                                {!! Str::markdown($programArea->description) !!}
                            </span>
                        </div>

                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                             x-ref="container{{ $programArea->id }}"
                             x-bind:style="selected == {{ $programArea->id }} ? 'max-height: ' + $refs.container{{ $programArea->id }}.scrollHeight + 'px' : ''">
                            <ol>
                                @forelse($programArea->conditions as $i => $condition)
                                    <li><a href="{{ route('condition', ['program_area_id' => $programArea->id, 'condition_id' => $condition->id]) }}">{{ $condition->name }}</a></li>
                                @empty
                                    No conditions in program
                                @endforelse
                            </ol>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</x-app-layout>
