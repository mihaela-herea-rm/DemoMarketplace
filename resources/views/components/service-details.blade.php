@props(['service'])

<div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
    <h2 class="text-sm title-font text-gray-500 tracking-widest">
        {{$service->author->username}}
    </h2>
    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
        {{$service->title}}
    </h1>
    <div class="flex mb-4">
        <x-rating :service="$service"/>
        <x-social-media-share :service="$service"/>
    </div>
    <p class="leading-relaxed justify-evenly">
        {{$service->body}}
    </p>
    <div class="flex mt-8">
        <span class="title-font font-medium text-2xl text-gray-900">
            {{ number_format($service->price, 0) }} &euro;
        </span>
        <button class="flex ml-auto text-white bg-sky-500 border-0 py-2 px-6 focus:outline-none hover:bg-sky-600 rounded">
            Reserve
        </button>
        <x-favourite :service="$service"/>
    </div>
</div>
