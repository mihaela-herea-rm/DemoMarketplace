@props(['categories', 'gender'])

<header>
    <div class="w-full bg-center md:bg-cover bg-center mt-7  rounded-xl h-full " style="background-image: url('/images/header-image.jpg');">
        <x-hero-search :categories="$categories" :gender="$gender" />
    </div>
</header>
