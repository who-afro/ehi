@props([
    'icon' => null,
    'class' =>
        [
            'primary' => 'inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-purple-600 hover:bg-purple-500 focus:outline-none focus:border-purple-700 focus:shadow-outline-purple active:bg-purple-700 transition ease-in-out duration-150',
            'secondary' => 'inline-flex items-center px-4 py-2 border border-gray-300 hover:text-purple-500 text-sm leading-5 font-medium rounded-md text-gray-600 focus:outline-none focus:shadow-outline-purple active:bg-purple-100 transition ease-in-out duration-150',
            'danger' => 'inline-flex items-center px-4 py-2 border border-red-300 hover:text-red-500 text-sm leading-5 font-medium rounded-md text-red-700 focus:outline-none focus:shadow-outline-red active:bg-red-100 transition ease-in-out duration-150',
        ][$attributes->get('design') ?? 'primary']
])

<span class="inline-flex rounded-md shadow-sm">
    @if($attributes->get('href'))
        <a {{ $attributes->except('class') }} class="{{ $class }}">
            @if($icon)
                @svg($icon, ['class' => '-ml-1 mr-2 h-5 w-5'])
            @endif

            {{ $slot }}
        </a>
    @else
        <button type="button" {{ $attributes->except('class') }} class="{{ $class }}">
            @if($icon)
                @svg($icon, ['class' => '-ml-1 mr-2 h-5 w-5'])
            @endif

            {{ $slot }}
        </button>
    @endif
</span>
