@props(['heading'])

<x-layout>
    <section class="text-gray-600 body-font px-8 py-8">
        <h1 class="text-lg font-bold mb-4 pb-2 border-b">{{$heading}}</h1>
        <div class="flex">
            <aside class="w-48 flex-shrink-0">
                <ul>
                    <li>
                        <a href="/user/profile/{{auth()->id()}}" class="{{request()->is('admin/profile/' . auth()->id()) ? 'text-blue-500' : ''}}">
                            Profile
                        </a>
                    </li>
                    @can('admin')
                        <li>
                            <a href="/admin/services" class="{{request()->is('admin/services') ? 'text-blue-500' : ''}}">
                                All services
                            </a>
                        </li>
                        <li>
                            <a href="/admin/services/create" class="{{request()->is('admin/services/create') ? 'text-blue-500' : ''}}">
                                New Service
                            </a>
                        </li>
                    @endif
                </ul>
            </aside>
            <main class="flex-1">
                <x-panel>
                    {{$slot}}
                </x-panel>
            </main>
        </div>
    </section>
</x-layout>
