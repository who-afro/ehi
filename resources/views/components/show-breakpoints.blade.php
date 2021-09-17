@if (config('app.debug'))
<div class="max-w-7xl mx-auto flex space-x-2 mb-4 rounded border text-center text-sm font-bold">
    <div class="flex-1 p-2"><span class="text-green-700 mr-1 xs:inline-block sm:hidden">&#x2713;</span><span
            class="text-red-700 mr-1 hidden sm:inline-block">&#x2717;</span><br>XS
    </div>
    <div class="flex-1 p-2"><span class="text-green-700 mr-1 hidden sm:inline-block md:hidden">&#x2713;</span><span
            class="text-red-700 mr-1 inline-block sm:hidden md:inline-block">&#x2717;</span><br>SM
    </div>
    <div class="flex-1 p-2"><span class="text-green-700 mr-1 hidden md:inline-block lg:hidden">&#x2713;</span><span
            class="text-red-700 mr-1 inline-block md:hidden lg:inline-block">&#x2717;</span><br>MD
    </div>
    <div class="flex-1 p-2"><span class="text-green-700 mr-1 hidden lg:inline-block xl:hidden">&#x2713;</span><span
            class="text-red-700 mr-1 inline-block lg:hidden xl:inline-block">&#x2717;</span><br>LG
    </div>
    <div class="flex-1 p-2"><span class="text-green-700 mr-1 hidden xl:inline-block 2xl:hidden">&#x2713;</span><span
            class="text-red-700 mr-1 inline-block xl:hidden 2xl:inline-block">&#x2717;</span><br>XL
    </div>
    <div class="flex-1 p-2"><span class="text-green-700 mr-1 hidden 2xl:inline-block">&#x2713;</span><span
            class="text-red-700 mr-1 inline-block 2xl:hidden">&#x2717;</span><br>2XL
    </div>
</div>
@endif
