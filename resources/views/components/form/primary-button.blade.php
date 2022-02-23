@props(['categories'])

<x-form.field>
    <button
        {{$attributes->merge(["class" => "bg-sky-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bl-sky-600"])}}>
        {{$slot}}
    </button>
</x-form.field>

