@auth
    <x-panel>
        <form
            wire:submit.prevent="postComment"
            {{--method="POST"
            action="/services/{{$service->slug}}/comments"--}}
        >
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="60" height="60" class="rounded-full">
                <h2 class="ml-4">Leave a comment</h2>
            </header>
            <div class="mt-6">
                @error('comment')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
                <textarea
                    wire:model.defer="comment"
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="Quick, think of something to say..."
                    required></textarea>
                @error('body')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.primary-button>Post</x-form.primary-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="underline">Register</a> or <a href="/login" class="underline">Log In</a> to leave a comment.
    </p>
@endauth
