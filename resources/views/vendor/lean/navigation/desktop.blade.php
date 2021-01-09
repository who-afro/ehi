<nav class="mt-5 flex-1 px-2 bg-purple-800 space-y-1">
    @foreach(Lean::pages() as $alias => $page)
        <a href="{{ route('lean.page', ['page' => $alias]) }}"
            @if(Lean::isCurrentPage($alias))
                class="group flex items-center px-2 py-2 text-sm leading-5 font-medium text-white rounded-md bg-purple-900 focus:outline-none focus:bg-purple-700 transition ease-in-out duration-150">
            @else
                class="group flex items-center px-2 py-2 text-sm leading-5 font-medium rounded-md text-purple-300 hover:text-white hover:bg-purple-700 focus:outline-none focus:text-white focus:bg-purple-700 transition ease-in-out duration-150">
            @endif
            @svg($page::icon(), ['class' => 'mr-3 h-6 w-6 text-purple-400 group-focus:text-purple-300 transition ease-in-out duration-150'])

            {{ $page::label() }}
        </a>
    @endforeach

    @foreach(Lean::resources() as $alias => $resource)
        <a href="{{ route('lean.resource.index', ['resource' => $alias]) }}"
            @if($resource::isActive())
                class="group flex items-center px-2 py-2 text-sm leading-5 font-medium text-white rounded-md bg-purple-900 focus:outline-none focus:bg-purple-700 transition ease-in-out duration-150"
            @else
                class="group flex items-center px-2 py-2 text-sm leading-5 font-medium rounded-md text-purple-300 hover:text-white hover:bg-purple-700 focus:outline-none focus:text-white focus:bg-purple-700 transition ease-in-out duration-150"
            @endif
        >
            @svg($resource::icon(), ['class' => 'mr-3 h-6 w-6 text-purple-400 group-focus:text-purple-300 transition ease-in-out duration-150'])

            {{ $resource::pluralLabel() }}
        </a>
    @endforeach
</nav>
