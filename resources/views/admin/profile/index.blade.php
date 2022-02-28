<x-setting heading="Profile">
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto flex flex-col">
            <div class="lg:w-4/6 mx-auto">
                <div class="flex flex-col sm:flex-row ">
                    <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                        <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                            <img src="https://i.pravatar.cc/60?u={{$user->id}}">
                        </div>
                        <div class="flex flex-col items-center text-center justify-center">
                            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">
                                <span class="font-semibold">Name:</span> {{$user->name}}
                            </h2>
                            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">
                                <span class="font-semibold">Email:</span> {{$user->email}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-setting>
