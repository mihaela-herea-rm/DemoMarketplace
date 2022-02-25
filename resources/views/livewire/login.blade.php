<div>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 rounded-xl">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In</h1>

                <form wire:submit.prevent="logUser" method="POST" action="/login" class="mt-10">
                    @csrf
                    <x-form.error name="login" />
                    <x-form.input name="email" wire:model.defer="email" type="email" autocomplete="email"/>
                    <x-form.input name="password" wire:model.defer="password" type="password" autocomplete="current-password"/>
                    <x-form.primary-button>Submit</x-form.primary-button>
                </form>
            </x-panel>
        </main>
    </section>
</div>
