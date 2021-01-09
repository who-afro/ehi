@props([
    'class' => 'font-medium text-purple-900 hover:text-purple-600 focus:outline-none focus:underline transition ease-in-out duration-150',
])

<a {{ $attributes }} class="{{ $class }}">
    {{ $slot }}
</a>
