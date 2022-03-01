<div class="flex flex-col mt-8">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="max-w-lg w-full lg:max-w-xs">
                    <div class="relative inline-flex">
                        <input wire:model="search"
                               id="search"
                               class="px-4 w-full pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                               placeholder="Search" type="search">
                    </div>
                </div>
            </div>

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-4">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button
                                    wire:click="sortBy('title')"
                                    class="inline-flex bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Name
                                    <x-sort-icon
                                        field="title"
                                        :sortField="$sortField"
                                        :sortAsc="$sortAsc"
                                    />
                                </button>
                            </div>
                        </th>
                        <th
                            class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button
                                    wire:click="sortBy('price')"
                                    class="inline-flex bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Price
                                    <x-sort-icon
                                        field="price"
                                        :sortField="$sortField"
                                        :sortAsc="$sortAsc"
                                    />
                                </button>
                            </div>
                        </th>
                        <th class="px-6 py-4 whitespace-nowrap text-left">
                            City
                        </th>
                        <th class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                        </th>
                        <th class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($services as $service)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        <a href="/services/{{$service->slug}}" target="_blank">
                                            {{$service->title}}
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ number_format($service->price, 0) }} &euro;
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{$service->city->name}}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="/admin/services/{{$service->id}}/edit" class="text-blue-500 hover:text-blue-600">
                                    Edit
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form method="POST" action="/admin/services/{{$service->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-8">
                {{ $services->links() }}
            </div>
        </div>
    </div>
    <div class="h-96"></div>
</div>
