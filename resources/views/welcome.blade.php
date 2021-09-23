<x-app-layout>
    <div class="mx-auto h-[720px]"
         style="background-image: url({{ asset('img/home-page-background.svg') }});">
        <div class="grid grid-cols-6">
            <div class="h-full bg-repeat-y" style="background-image: url({{ asset('img/iaho-pattern.svg') }}); transform:scaleX(-1); background-repeat: repeat-y">
            </div>
            <div class="col-span-3">
                <form method="GET" action="interventions">
                    <div class="flex justify-center mt-[600px] mb-12">
                        <x-input.text name="search" placeholder="Find Interventions..."
                                      class="p-4 rounded border appearance-none w-96 h-10 placeholder-gray-300"/>
                        <x-button.primary type="submit" class="flex-none mx-4 h-10 text-lg">Search</x-button.primary>
                    </div>
                </form>
            </div>

            <div class="flex flex-col justify-end col-span-2">
                <span class="text-6xl text-iaho-yellow font-extrabold my-4">
                    Welcome to the iAHO digital toolkit of essential health services
                </span>
                <span class="text-4xl text-white my-18">
                    Your one-stop shop to help you search and compile health interventions across the WHO African Region
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
