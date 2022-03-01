
<x-setting heading="Publish New Service">
    <form method="POST" action="/admin/services" enctype="multipart/form-data">
        @csrf
        <x-form.input name="title" :value="old('title')" required/>
        <x-form.input name="slug" :value="old('slug')" required/>
        <x-form.input name="thumbnail" type="file" required/>
        <x-form.textarea name="excerpt" :value="old('excerpt')"/>
        <x-form.textarea name="body" :value="old('body')"/>
        <x-form.input name="price" :value="old('price')" required/>

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
            <livewire:locationdropdown />
        </div>
        <div class="form-control @error('gender') border-red-400 @enderror">
            <label class="cursor-pointer align-middle">
                <span class="label-text mx-1">Male</span>
                <input type="radio" class="radio border-sky-400 checked:bg-sky-500 mx-1 -mb-1" name="gender" value="{{$gender['male']}}">
            </label>
            <label class="cursor-pointer align-middle">
                <span class="label-text mx-1">Female</span>
                <input type="radio" class="radio radio-secondary mx-1 -mb-1" name="gender" value="{{$gender['female']}}">
            </label>
            <label class="cursor-pointer align-middle">
                <span class="label-text mx-1">Any</span>
                <input type="radio" class="radio border-green-400 checked:bg-green-500 mx-1 -mb-1" name="gender" value="{{$gender['any']}}">
            </label>
        </div>
        <x-form.primary-button>Publish</x-form.primary-button>
    </form>
</x-setting>

