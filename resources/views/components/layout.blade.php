<!doctype html>

<title>MyMarketPlace</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<link href="/css/app.css" rel="stylesheet">
<livewire:styles />


<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 pb-8">
    <nav class="bg-white shadow-xl rounded-xl">
        <div class="container mx-auto py-3">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold text-gray-700 inline-flex align-middle">
                    <a href="/">
                        <img src="/images/logo.png" alt="MyMarketPlace Logo" width="165" height="16">
                    </a>
                    <a href="/" class="font-semibold md:flex md:items-center pl-4">Home</a>
                    <a href="/contact" class="font-semibold md:flex md:items-center pl-4">Contact</a>
                </div>
                <div class="md:flex md:items-center md:justify-between">
                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="hidden -mx-4 md:flex md:items-center">
                        @auth

                            {{--<div class="dropdown dropdown-end">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="https://api.lorem.space/image/face?hash=33791">
                                    </div>
                                </label>
                                <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                                    <li>
                                        <a class="justify-between">
                                            Profile
                                            <span class="badge">New</span>
                                        </a>
                                    </li>
                                    <li><a>Settings</a></li>
                                    <li><a>Logout</a></li>
                                </ul>
                            </div>--}}
                            {{--<x-dropdown>
                                <x-slot name="trigger">
                                    <button class="text-xs font-bold ucfirst">Welcome {{auth()->user()->name}}</button>
                                </x-slot>
                                @if (auth()->user()->can('admin'))
                                    <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Posts</x-dropdown-item>
                                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
                                @endif

                                @can('admin')
                                    <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Posts</x-dropdown-item>
                                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
                                @endif

                                @admin
                                <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Posts</x-dropdown-item>
                                <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
                                @endadmin

                                <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                                <form id="logout-form" method="POST" action="/logout" class="hidden">
                                    @csrf
                                    <button type="submit">Log Out</button>
                                </form>
                            </x-dropdown>--}}

                        @else
                            <a href="/register" class="font-semibold">Register</a>
                            <a href="/login" class="m-3 font-semibold">Log In</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{$slot}}

    <footer id="newsletter" class="bg-sky-50 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">You can also find us here</h5>
        <div class="mt-10 space-x-6">
            <div class="relative inline-block mx-auto rounded-full">
                <a href="/">
                    <img src="/images/instagram-logo.png" alt="Instagram Logo" width="50" height="50">
                </a>
            </div>
            <div class="relative inline-block mx-auto rounded-full">
                <a href="/">
                    <img src="/images/twitter-logo.png" alt="Twitter Logo" width="50" height="50">
                </a>
            </div>
            <div class="relative inline-block mx-auto rounded-full">
                <a href="/">
                    <img src="/images/facebook-logo.svg" alt="Facebook Logo" width="50" height="50">
                </a>
            </div>
        </div>
    </footer>
</section>

@if (session()->has('success'))
    <div x-data="{show:true}"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-sky-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
    >
        <p>{{session('success')}}</p>
    </div>
@endif
<livewire:scripts />
</body>
