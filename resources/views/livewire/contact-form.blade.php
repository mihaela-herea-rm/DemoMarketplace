<div>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
            <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                <iframe class="absolute inset-0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2784.3273519158233!2d21.22863571575653!3d45.74458292271115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47455d84d22c20bb%3A0x283a1aa27e007811!2sBulevardul%20Victor%20Babe%C8%99%2C%20Timi%C8%99oara!5e0!3m2!1sen!2sro!4v1645727217317!5m2!1sen!2sro" width="100%" height="100%" frameborder="0"></iframe>
                <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                    <div class="lg:w-1/2 px-6">
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
                        <p class="mt-1">Victor Babeș Street, no. 2, Timișoara
                        </p>
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                        <a class="text-sky-500 leading-relaxed">mihaela.herea@imobiliare.ro</a>
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
                        <p class="leading-relaxed">+40 766 551 225</p>
                    </div>
                </div>
            </div>
           <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
               @if ($success)
                   <div class="alert shadow-lg alert-success mb-4"
                        x-data="{show:true}"
                        x-init="setTimeout(() => show = false, 4000)"
                        x-show="show"
                   >
                       <div>
                           <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                           </svg>
                           <span>{{ $success }}</span>
                       </div>
                   </div>
               @endif
                <form wire:submit.prevent="contactFormSubmit" method="POST" action="/contact">
                    @csrf
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Feedback</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">
                        If you have any questions or feedback, feel free to contact us and we will get back to you as soon as posible.
                    </p>
                    <div class="relative mb-4">
                        @error('name')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input wire:model.defer="name" type="text" id="name" name="name"
                               class="w-full bg-white rounded border border-gray-300 focus:border-sky-500 focus:ring-2 focus:ring-sky-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        >
                    </div>
                    <div class="relative mb-4">
                        @error('email')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input wire:model.defer="email" type="email" id="email" name="email"
                               class="w-full bg-white rounded border border-gray-300 focus:border-sky-500 focus:ring-2 focus:ring-sky-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        >
                    </div>
                    <div class="relative mb-4">
                        @error('message')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                        <label for="comment" class="leading-7 text-sm text-gray-600">Message</label>
                        <textarea wire:model.defer="comment" id="comment" name="comment"
                                class="w-full bg-white rounded border border-gray-300 focus:border-sky-500 focus:ring-2 focus:ring-sky-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                        ></textarea>
                    </div>
                    <button
                        class="text-white bg-sky-500 border-0 py-2 px-6 focus:outline-none hover:bg-sky-600 rounded text-lg"
                    >
                        Send
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>
