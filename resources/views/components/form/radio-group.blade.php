@props(['label'])

<div class="main flex border rounded-full overflow-hidden m-2 select-none grid grid-cols-12">
    <div class="form-control py-3 my-auto px-2 md:px-5 bg-sky-500 text-white text-sm font-semibold mr-1 md:mr-3 col-span-3">
        {{$label}}</div>
    {{$slot}}
</div>
