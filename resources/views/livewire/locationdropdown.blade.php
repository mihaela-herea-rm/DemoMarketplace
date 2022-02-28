
<div>
    <select
        class="select w-full px-6 py-2 my-1 text-sm font-semibold flex lg:inline-flex @error('county') border-red-400 @enderror"
        name="county"
        wire:model="selectedCounty"
        x-on:change="() => {$element.classList.remove('border-red-400');}"
        required
    >
        <option disabled value="0" class="block text-center px-3 text-sm leading-6 hidden">County</option>
        @foreach ($counties as $county)
            <option
                class="py-2 mt-2 absolute rounded-xl w-full z-50 overflow-auto"
                value="{{$county->id}}"
            >
                {{ucfirst($county->name)}}
            </option>
        @endforeach
    </select>

    @if (!is_null($selectedCounty) && $selectedCounty != 0)
        <select
            class="select w-full px-6 py-2 my-1 text-sm font-semibold flex lg:inline-flex"
            name="city"
            wire:model="selectedCity"
        >
            <option value="0" class="block text-center px-3 text-sm leading-6 hidden">City</option>
            @foreach ($cities as $city)
                <option class="py-2 mt-2 absolute rounded-xl w-full z-50 overflow-auto"
                        value="{{$city->id}}"
                        @if($selectedCity == $city->id) selected @endif
                >
                    {{ucfirst($city->name)}}
                </option>
            @endforeach
        </select>
    @else
        <select class="select w-full px-6 py-2 my-1 text-sm font-semibold flex lg:inline-flex" disabled>
            <option disabled selected value="0" class="block text-center px-3 text-sm leading-6">City</option>
        </select>
    @endif

</div>


