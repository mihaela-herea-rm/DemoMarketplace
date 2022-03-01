
<x-setting :heading="'Edit Service: ' . $service->title">
    <form method="POST" action="/admin/services/{{$service->id}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-form.input name="title" :value="old('title', $service->title)" required/>
        <x-form.input name="slug" :value="old('slug', $service->slug)" required/>
        <x-form.input name="price" :value="old('price', $service->price)" required/>
        <div class="flex mt-6">
            <div class="flex-1">
                <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $service->thumbnail)"/>
            </div>
            @if ($service->thumbnail != '')
                <img src="{{ asset('storage/' . $service->thumbnail)}}" alt = "" class="rounded-xl ml-6" width="100"/>
            @endif
        </div>
        <x-form.textarea name="excerpt">{{old('excerpt', $service->excerpt)}}</x-form.textarea>
        <x-form.textarea name="body">{{old('body', $service->body)}}</x-form.textarea>

        <x-form.field>
            <x-form.label name="category" />

            <select name="category_id" id="category">
                @foreach (\App\Models\Category::all() as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >{{ ucwords($category->name) }}</option>
                @endforeach
            </select>

            <x-form.error name="category" />
        </x-form.field>

        <div class="mt-4">
            <livewire:locationdropdown :selectedCounty="$countyId" :selectedCity="$service->city_id"/>
            <x-form.error name="city_id" />
        </div>
        <div class="form-control @error('gender') border-red-400 @enderror">
            <label class="cursor-pointer align-middle">
                <span class="label-text mx-1">Male</span>
                <input type="radio" class="radio border-sky-400 checked:bg-sky-500 mx-1 -mb-1" name="gender" value="{{$gender['male']}}" @if($service->gender === $gender['male']) checked @endif>
            </label>
            <label class="cursor-pointer align-middle">
                <span class="label-text mx-1">Female</span>
                <input type="radio" class="radio radio-secondary mx-1 -mb-1" name="gender" value="{{$gender['female']}}" @if($service->gender === $gender['female']) checked @endif>
            </label>
            <label class="cursor-pointer align-middle">
                <span class="label-text mx-1">Any</span>
                <input type="radio" class="radio border-green-400 checked:bg-green-500 mx-1 -mb-1" name="gender" value="{{$gender['any']}}" @if($service->gender === $gender['any']) checked @endif>
            </label>
        </div>

        <x-form.primary-button>Update</x-form.primary-button>
    </form>
</x-setting>

