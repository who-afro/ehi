<x-app-layout>
<div class="text-lg">
    <x-slot name="header">
        Download Essential Package
    </x-slot>

    <div class="flex flex-col px-2">
        <div class="flex justify-between justify-end p-4">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <a href="{{ route('download-essential-package', ['package' => $package]) }}" class="text-cool-gray-700 text-sm leading-5 font-medium focus:outline-none focus:text-cool-gray-800 focus:underline transition duration-150 ease-in-out px-2 justify-center" class="px-2 justify-center">
                    <img src="{{ asset('svg/excel.svg') }}" class="h-16" alt="Download to Excel" />
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
