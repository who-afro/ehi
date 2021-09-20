<x-app-layout>
    <div class="max-w-7xl mx-auto bg-local bg-cover h-[720px]"
         style="background-image: url({{ asset('img/home-page-background.svg') }})">
        <div class="grid grid-cols-6">
            <div class="h-full"
                 style="background-image: url({{ asset('img/iaho-pattern.svg') }}); transform:scaleX(-1); background-repeat: repeat-y">
            </div>
            <div class="col-span-3">

            </div>
            <div class="flex flex-col justify-end col-span-2 h-full">
                <span class="text-6xl text-iaho-yellow font-extrabold my-10">
                    Welcome to the IAHO digital toolkit of essential health services
                </span>
                <span class="text-4xl text-white my-18">
                    Your one-stop shop to help you search and compile health interventions across the WHO African Region
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
