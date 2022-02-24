<x-layout>
    <x-header-image :categories="$categories" :gender="$gender"/>
    <h1 class="text-4xl mt-8 md:mt-16 ml-8">
        Latest <span class="text-sky-500">Services</span>
    </h1>
    <x-panel class="mx-auto mt-6 lg:mt-20 space-y-6">
        <x-service-grid :services="$services"/>
    </x-panel>
</x-layout>


