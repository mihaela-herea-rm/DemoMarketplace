@props(['categories', 'counties', 'cities'])

<div class="flex items-center justify-left h-full w-full bg-gray-900 bg-opacity-50 rounded-xl grid grid-cols-12 gap-4">
    <x-panel class="bg-base-100 shadow-xl bg-white rounded-xl mx-5 md:mx-0 col-start-1 col-span-12 md:col-start-3 md:col-span-3 my-10">
        <h1 class="text-center font-bold text-xl">Find a service</h1>
        <form method="POST" action="/" class="mt-10">
            @csrf
            <select class="select w-full px-6 py-2 my-1 text-sm font-semibold flex lg:inline-flex">
                <option disabled selected value="0" class="block text-center px-3 text-sm leading-6 ">Category</option>
                @foreach ($categories as $category)
                    <option class="py-2 mt-2 absolute rounded-xl w-full z-50 overflow-auto" value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                @endforeach
            </select>
            <select class="select w-full px-6 py-2 my-1 text-sm font-semibold flex lg:inline-flex">
                <option disabled selected value="0" class="block text-center px-3 text-sm leading-6 ">County</option>
                @foreach ($counties as $county)
                    <option class="py-2 mt-2 absolute rounded-xl w-full z-50 overflow-auto" value="{{$county->id}}">{{ucfirst($county->name)}}</option>
                @endforeach
            </select>
            <select class="select w-full px-6 py-2 my-1 text-sm font-semibold flex lg:inline-flex">
                <option disabled selected value="0" class="block text-center px-3 text-sm leading-6 ">City</option>
                @foreach ($cities as $city)
                    <option class="py-2 mt-2 absolute rounded-xl w-full z-50 overflow-auto" value="{{$city->id}}">{{ucfirst($city->name)}}</option>
                @endforeach
            </select>
            <x-form.radio-group label="Gender">
                <div class="form-control flex col-span-9">
                    <div class="label justify-evenly">
                        <label class="cursor-pointer align-middle">
                            <span class="label-text mx-1">Male</span>
                            <input type="radio" class="radio border-sky-400 checked:bg-sky-500 mx-1 -mb-1" name="gender">
                        </label>
                        <label class="cursor-pointer align-middle">
                            <span class="label-text mx-1">Female</span>
                            <input type="radio" class="radio radio-secondary mx-1 -mb-1" name="gender">
                        </label>
                        <label class="cursor-pointer align-middle">
                            <span class="label-text mx-1">Any</span>
                            <input type="radio" class="radio border-green-400 checked:bg-green-500 mx-1 -mb-1" name="gender">
                        </label>
                    </div>
                </div>
            </x-form.radio-group>
            <div class="text-center">
                <x-form.primary-button>Search</x-form.primary-button>
            </div>
        </form>
    </x-panel>
</div>
