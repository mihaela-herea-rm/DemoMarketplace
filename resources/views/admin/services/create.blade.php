
<x-setting heading="Publish New Service">
    <form method="POST" action="/admin/services" enctype="multipart/form-data">
        @csrf
        <x-form.input name="title" required/>
        <x-form.input name="slug" required/>
        <x-form.input name="thumbnail" type="file" required/>
        <x-form.textarea name="excerpt"/>
        <x-form.textarea name="body"/>

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
        <x-form.primary-button>Publish</x-form.primary-button>
    </form>
</x-setting>

