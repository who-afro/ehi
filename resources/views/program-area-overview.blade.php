<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program Area') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 prose">
        The program areas in the digital toolkit are derived from the WHO Global burden of diseases
        <!-- accordian inspiration and code adapted from https://codepen.io/QJan84/pen/zYvRMMw -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2" x-data="{selected:null}">
            <ol>
                @foreach(App\Models\ProgramArea::with('conditions')->get() as $programArea)
                <li class="text-left cursor-pointer" @click="selected !== {{ $programArea->id }} ? selected = {{ $programArea->id }} : selected = null">
                        <div class="flex items-center justify-between">
					<span>
						{{ $programArea->name }}				</span>
                            <span class="ico-plus"></span>
                        </div>

                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container{{ $programArea->id }}"
                         x-bind:style="selected == {{ $programArea->id }} ? 'max-height: ' + $refs.container{{ $programArea->id }}.scrollHeight + 'px' : ''">
                        <div>
                            <ul class="list-roman">
                            @forelse($programArea->conditions as $i => $condition)
                                <li>{{ $condition->name }}</li>
                            @empty
                               No conditions in program
                            @endforelse
                            </ul>
                        </div>
                    </div>
                </li>
                @endforeach
            </ol>
        </div>
    </div>
</x-app-layout>
