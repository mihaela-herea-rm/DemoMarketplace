@props(['services'])

@if($services->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($services as $service)
            @if($loop->iteration > 6)
                @break
            @endif
            <x-service-card :service="$service" class="col-span-2"/>
        @endforeach
    </div>
@endif
