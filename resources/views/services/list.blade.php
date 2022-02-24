
<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($services->count())
            <div class="lg:grid lg:grid-cols-6">
                @foreach($services as $service)
                    <x-service-card :service="$service" class="col-span-2"/>
                @endforeach
            </div>
        @endif
            @if($services->count())
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    {{$services->links()}}
                </div>
            @endif
    </main>
</x-layout>
