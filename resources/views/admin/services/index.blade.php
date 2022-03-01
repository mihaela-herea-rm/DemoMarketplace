
<x-setting heading="Manage Services">
    <livewire:admin-service-list/>
    {{--<div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if($services->count())
                            <tr class="bg-gray-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            Service name
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            Price
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Status
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                </td>
                            </tr>
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
                                            Published
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
                        @else
                            <p class="text-center">No services yet.</p>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
            @if($services->count())
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    {{$services->links()}}
                </div>
            @endif
        </div>
    </div>--}}
</x-setting>

