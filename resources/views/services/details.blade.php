<x-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                @if($service->thumbnail)
                    <img class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset('storage/' . $service->thumbnail)}}">
                @else
                    <img  class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="/images/default-thumbnails/{{$service->category_id}}.jpg">
                @endif
                <x-service-details :service="$service"/>
            </div>
            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @include('services._add-comment-form')

                @foreach($service->comments as $comment)
                    <x-service-comment :comment="$comment"/>
                @endforeach
            </section>
        </div>
    </section>
</x-layout>
