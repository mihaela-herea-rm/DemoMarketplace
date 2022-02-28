
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
        </div>

        <x-form.primary-button>Update</x-form.primary-button>
    </form>
</x-setting>

