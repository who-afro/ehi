<x-app-layout>
    <div class="max-w-7xl mx-auto bg-local bg-cover h-screen" style="background-image: url({{ asset('img/home-page-background.svg') }})">
        <div class="grid grid-cols-3">
            <div class="overflow-hidden bg-repeat-y h-screen" style="background-image: url({{ asset('img/iaho-pattern.svg') }}); transform:scaleX(-1);" >

            </div>
            <div class="flex flex-col mt-48 col-span-2 pl-12">
                <span class="text-8xl text-iaho-yellow font-extrabold">
                    Welcome to the digital toolkit of essential health services
                </span>
                <span class="text-4xl text-white mt-12">
                    Your one-stop shop to help you search and compile health interventions across the WHO African Region
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
