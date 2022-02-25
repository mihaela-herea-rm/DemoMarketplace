<div>
    <section class="px-6 py-5">
        <main class="max-w-lg mx-auto mt-8 bg-gray-100  rounded-xl">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>

                <form wire:submit.prevent="submitUser" method="POST" action="/register" class="mt-8">
                    @csrf
                    <x-form.input wire:model.defer="name" name="name" type="text"/>
                    <x-form.input wire:model.defer="email"  name="email" type="email"/>
                    <x-form.input wire:model.defer="password"  name="password" type="password" autocomplete="new-password"/>
                    <div class="text-center">
                        <x-form.primary-button>Submit</x-form.primary-button>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</div>
