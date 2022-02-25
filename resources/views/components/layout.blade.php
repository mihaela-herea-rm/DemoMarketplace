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
<section class="px-6 pb-6">
    <nav class="bg-white shadow-xl rounded-xl">
        <div class="container mx-auto py-3">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold text-gray-700 inline-flex align-middle md:-mx-16 ">
                    <a href="/">
                        <img src="/images/logo.png" alt="MyMarketPlace Logo" width="165" height="16">
                    </a>
                    <a href="/" class="font-semibold flex items-center pl-4">Home</a>
                    <a href="/contact" class="font-semibold flex items-center pl-4">Contact</a>
                </div>
                <div class="md:flex md:items-center md:justify-between">
                    <div class="md:-mx-16 md:flex md:items-center">
                        @auth
                            <p class="hidden md:flex mr-2"><span class="font-semibold">{{auth()->user()->name}}</span></p>
                            <div class="dropdown dropdown-end">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="https://i.pravatar.cc/60?u={{auth()->user()->id}}">
                                    </div>
                                </label>
                                <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                                    <li>
                                        <a href="#" class="justify-between active:bg-sky-500">
                                            Profile
                                            <span class="badge">New</span>
                                        </a>
                                    </li>
                                    @can('admin')
                                        <li><a href="/admin/service-list" class="active:bg-sky-500">Service List</a></li>
                                        <li><a href="/admin/add-create" class="active:bg-sky-500">Add New Service</a></li>
                                    @endif
                                    <li><a href="/logout" class="active:bg-sky-500">Logout</a></li>
                                </ul>
                            </div>
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

    <footer id="newsletter" class="bg-sky-50 border border-black border-opacity-5 rounded-xl text-center py-8 px-10 mt-8">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto" style="width: 145px;">
        <h5 class="text-3xl">You can also find us here</h5>
        <div class="mt-6 space-x-6">
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
