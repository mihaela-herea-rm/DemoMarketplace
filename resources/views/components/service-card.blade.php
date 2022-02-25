@props(['service'])
<article
    {{$attributes->merge(['class' => "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"])}}>
    <div class="py-6 px-5">
        <a href="/services/{{$service->slug}}">
            <div>
                <img src="/images/thumb.jpg" alt="Service thumbnail" class="rounded-xl">
            </div>
        </a>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-dynamic-component :component="'badges.' . $service->category->id" :name="$service->category->name" />
                    @if(\Carbon\Carbon::parse($service->created_at)->gt(date("Y-m-d H:i:s", strtotime( '-2 day' ))))
                        <x-badges.new name="New"/>
                    @endif
                </div>

                <div class="mt-4">
                    <h1 class="text-xl font-semibold">
                        <a href="/service/{{$service->slug}}">{{$service->title}}</a>
                    </h1>
                    <span class="mt-2 block text-gray-400 text-xs ">
                        Published <time>{{$service->created_at->diffForHumans()}}</time>
                    </span>
                </div>
            </header>

            <div class="font-semibold mr-6 mb-2 max-h-16 text-xl text-right">
                {{ number_format($service->price, 0) }} &euro;
            </div>

            <div class="text-sm mt-2 space-y-4 max-h-16 overflow-hidden break-words text-ellipsis justify-evenly">
                {!! $service->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="https://i.pravatar.cc/60?u={{$service->author->id}}" alt="Avatar" class="rounded-full">
                    <div class="ml-3">
                        <a href="/?author={{$service->author->username}}"><h5 class="font-bold">{{$service->author->name}}</h5></a>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/services/{{$service->slug}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>

