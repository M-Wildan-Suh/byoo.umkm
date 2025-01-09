<x-layout.guest>
    @include('components.guest.header')
    <div class="pt-28 px-4 space-y-16">
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" w-full space-y-6">
                <div class=" w-full flex flex-col items-center justify-center text-[#4b5d70]">
                    <p class=" text-3xl font-black">Recomended</p>
                    <p>~~~~~~</p>
                </div>
                <div class=" w-full swiper">
                    <div class="swiper-wrapper">
                        @foreach ($recomend as $item)
                            <div class=" swiper-slide w-full aspect-video rounded-md overflow-hidden relative">
                                <img class=" w-full h-full object-cover"
                                    src="{{asset('storage/images/product/'. $item->image)}}"
                                    alt="">
                                <a href="{{route('detail', ['slug'=>$item->slug])}}" class=" text-center text-sm sm:text-base absolute top-0 left-0 flex items-center justify-center w-full h-full bg-[#4b5d70]/40 hover:bg-[#4b5d70]/70 text-white duration-300 font-black">
                                    <p>{{$item->name}}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <script>
                        window.addEventListener('load', function() {
                            const swiper = new Swiper('.swiper', {
                                // Optional parameters
                                direction: 'horizontal',
                                slidesPerView: 3,
                                spaceBetween: 8,
                                loop: true,
                                autoplay: {
                                    delay: 2500,
                                    disableOnInteraction: false,
                                },
                                speed: 500,
                                breakpoints: {
                                    640: {
                                        slidesPerView: 4,
                                        spaceBetween: 8,
                                    },
                                    748: {
                                        slidesPerView: 5,
                                        spaceBetween: 8,
                                    },
                                    1024: {
                                        slidesPerView: 6,
                                        spaceBetween: 8,
                                    },
                                },
                                // Navigation arrows
                                navigation: {
                                    nextEl: '.next',
                                    prevEl: '.prev',
                                },
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[1080px] mx-auto">
            <div class=" w-full space-y-8 pb-24">
                <div class=" w-full">
                    <div class=" w-full flex flex-col items-center justify-center text-[#4b5d70]">
                        <p class=" text-3xl font-black">Product</p>
                        <p>~~~~~~</p>
                    </div>
                    <form action="{{ route('home') }}" class="flex justify-end" method="GET">
                        <div class="w-full flex items-center justify-end gap-4">
                            <!-- Search Input -->
                            <input type="text" name="search" placeholder="Search..." class="w-full sm:w-auto py-1 rounded-md" value="{{ request('search') }}" @input="document.querySelector('form').submit()">
                    
                            <!-- Dropdown Filter -->
                            <div x-data="{ open: false }" class="relative">
                                <!-- Button -->
                                <button 
                                    @click="open = !open" 
                                    type="button"
                                    class="w-7 h-7 p-1 duration-300"
                                    :class="{ 'text-black': open, 'text-neutral-600 hover:text-black': !open }"
                                    aria-expanded="open"
                                    :aria-expanded="open.toString()">
                                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m12 12 8-8V0H0v4l8 8v8l4-4v-4z" fill="currentColor" class="fill-000000"></path>
                                    </svg>
                                </button>
                    
                                <!-- Dropdown Content -->
                                <div 
                                    x-show="open" 
                                    @click.outside="open = false" 
                                    class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-95">
                                    <ul class="py-2 text-sm text-neutral-600">
                                        <li>
                                            <button 
                                                type="submit" 
                                                name="filter" 
                                                value="all" 
                                                class="block w-full text-left px-4 py-2 hover:bg-neutral-100"
                                                :class="{ 'bg-neutral-100': '{{ request('filter') }}' == 'all' || '{{ request('filter') }}' === '' }"
                                                @click="open = false">
                                                Semua
                                            </button>
                                        </li>
                                        @foreach ($tag as $item)
                                            <li>
                                                <button 
                                                    type="submit" 
                                                    name="filter" 
                                                    value="{{ $item->id }}" 
                                                    class="block w-full text-left px-4 py-2 hover:bg-neutral-100"
                                                    :class="{ 'bg-neutral-100': '{{ request('filter') }}' == '{{ $item->id }}' }"
                                                    @click="open = false">
                                                    {{ $item->tag }}
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="grid grid-cols-2 gap-3 lg:gap-8">
                    @foreach ($data as $item)
                        <div class=" w-full bg-[#F8FAFC] shadow-md shadow-black/20 rounded-md grid grid-cols-1 md:grid-cols-7 md:p-4 gap-2 md:gap-4">
                            <div class=" md:col-span-3 flex items-center w-full aspect-[5/4] md:max-h-[157.6px] md:aspect-auto rounded-t-md md:rounded overflow-hidden">
                                <img class=" w-full h-full object-cover"
                                    src="{{asset('storage/images/product/'. $item->image)}}"
                                    alt="">
                            </div>
                            <div class=" md:col-span-4 flex flex-col justify-between md:pt-1 gap-1 p-2 pt-0 md:p-0 md:gap-2 text-sm md:text-base">
                                <a href="{{route('detail', ['slug'=>$item->slug])}}">
                                    <p class=" text-lg font-semibold line-clamp-1">{{$item->name}}</p>
                                </a>
                                <div class="">
                                    {{-- <p class="">Mulai dari Rp. {{ str_replace(',', '.', number_format($item->price))}}</p> --}}
                                    <p class=" text-neutral-600 text-sm line-clamp-2">{{$item->subtitle}}</p>
                                </div>
                                <div class=" pt-2 gap-2">
                                    <a href="{{route('detail', ['slug'=>$item->slug])}}">
                                        <button 
                                            class="w-full flex justify-center py-1 sm:py-2 border rounded-md text-white bg-[#ff7100] border-[#ff7100] hover:text-white hover:bg-[#b95300] hover:border-[#b95300] hover:font-black duration-300 relative text-sm">
                                            <div class="w-4 sm:w-5 aspect-square absolute left-2 top-1/2 -translate-y-1/2">
                                                <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M16 7C9.934 7 4.798 10.776 3 16c1.798 5.224 6.934 9 13 9s11.202-3.776 13-9c-1.798-5.224-6.934-9-13-9z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" class="stroke-000000"></path><circle cx="16" cy="16" fill="none" r="5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" class="stroke-000000"></circle></svg>
                                            </div>
                                            Lihat Detail
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class=" w-full bg-[#4b5d70]">
        <div class=" w-full min-h-10 h-10">
            <svg id="visual" viewBox="0 0 420 40"  class=" w-full h-full sm:hidden" preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
                <path
                    d="M0 0L32 0L32 0L65 0L65 6L97 6L97 11L129 11L129 5L162 5L162 3L194 3L194 12L226 12L226 0L258 0L258 2L291 2L291 10L323 10L323 13L355 13L355 0L388 0L388 4L420 4L420 4L420 0L420 0L388 0L388 0L355 0L355 0L323 0L323 0L291 0L291 0L258 0L258 0L226 0L226 0L194 0L194 0L162 0L162 0L129 0L129 0L97 0L97 0L65 0L65 0L32 0L32 0L0 0Z"
                    fill="#d9eafd" opacity="1"></path>
                <path
                    d="M0 16L32 16L32 11L65 11L65 16L97 16L97 26L129 26L129 9L162 9L162 11L194 11L194 28L226 28L226 21L258 21L258 17L291 17L291 23L323 23L323 15L355 15L355 29L388 29L388 9L420 9L420 29L420 2L420 2L388 2L388 0L355 0L355 11L323 11L323 8L291 8L291 0L258 0L258 0L226 0L226 10L194 10L194 1L162 1L162 3L129 3L129 9L97 9L97 4L65 4L65 0L32 0L32 0L0 0Z"
                    fill="#d9eafd" opacity="0.66"></path>
                <path
                    d="M0 27L32 27L32 40L65 40L65 30L97 30L97 34L129 34L129 25L162 25L162 34L194 34L194 28L226 28L226 35L258 35L258 27L291 27L291 36L323 36L323 34L355 34L355 33L388 33L388 23L420 23L420 33L420 27L420 7L388 7L388 27L355 27L355 13L323 13L323 21L291 21L291 15L258 15L258 19L226 19L226 26L194 26L194 9L162 9L162 7L129 7L129 24L97 24L97 14L65 14L65 9L32 9L32 14L0 14Z"
                    fill="#d9eafd" opacity="0.33"></path>
                <path
                    d="M0 41L32 41L32 41L65 41L65 41L97 41L97 41L129 41L129 41L162 41L162 41L194 41L194 41L226 41L226 41L258 41L258 41L291 41L291 41L323 41L323 41L355 41L355 41L388 41L388 41L420 41L420 41L420 31L420 21L388 21L388 31L355 31L355 32L323 32L323 34L291 34L291 25L258 25L258 33L226 33L226 26L194 26L194 32L162 32L162 23L129 23L129 32L97 32L97 28L65 28L65 38L32 38L32 25L0 25Z"
                    fill="#d9eafd" opacity="0"></path>
            </svg>
            <svg id="visual" viewBox="0 0 1720 80" class=" hidden sm:block w-full h-full"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                preserveAspectRatio="none">
                <path
                    d="M0 28L75 28L75 14L150 14L150 2L224 2L224 23L299 23L299 10L374 10L374 30L449 30L449 29L523 29L523 31L598 31L598 4L673 4L673 25L748 25L748 6L823 6L823 15L897 15L897 16L972 16L972 24L1047 24L1047 18L1122 18L1122 30L1197 30L1197 13L1271 13L1271 31L1346 31L1346 6L1421 6L1421 32L1496 32L1496 27L1570 27L1570 17L1645 17L1645 27L1720 27L1720 15L1720 0L1720 0L1645 0L1645 0L1570 0L1570 0L1496 0L1496 0L1421 0L1421 0L1346 0L1346 0L1271 0L1271 0L1197 0L1197 0L1122 0L1122 0L1047 0L1047 0L972 0L972 0L897 0L897 0L823 0L823 0L748 0L748 0L673 0L673 0L598 0L598 0L523 0L523 0L449 0L449 0L374 0L374 0L299 0L299 0L224 0L224 0L150 0L150 0L75 0L75 0L0 0Z"
                    fill="#d9eafd" opacity="1"></path>
                <path
                    d="M0 35L75 35L75 50L150 50L150 66L224 66L224 66L299 66L299 35L374 35L374 35L449 35L449 31L523 31L523 64L598 64L598 23L673 23L673 35L748 35L748 49L823 49L823 18L897 18L897 54L972 54L972 54L1047 54L1047 58L1122 58L1122 57L1197 57L1197 59L1271 59L1271 48L1346 48L1346 43L1421 43L1421 33L1496 33L1496 47L1570 47L1570 23L1645 23L1645 39L1720 39L1720 38L1720 13L1720 25L1645 25L1645 15L1570 15L1570 25L1496 25L1496 30L1421 30L1421 4L1346 4L1346 29L1271 29L1271 11L1197 11L1197 28L1122 28L1122 16L1047 16L1047 22L972 22L972 14L897 14L897 13L823 13L823 4L748 4L748 23L673 23L673 2L598 2L598 29L523 29L523 27L449 27L449 28L374 28L374 8L299 8L299 21L224 21L224 0L150 0L150 12L75 12L75 26L0 26Z"
                    fill="#d9eafd" opacity="0.66"></path>
                <path
                    d="M0 57L75 57L75 70L150 70L150 69L224 69L224 67L299 67L299 57L374 57L374 40L449 40L449 43L523 43L523 75L598 75L598 49L673 49L673 37L748 37L748 67L823 67L823 33L897 33L897 76L972 76L972 60L1047 60L1047 63L1122 63L1122 71L1197 71L1197 63L1271 63L1271 57L1346 57L1346 52L1421 52L1421 47L1496 47L1496 54L1570 54L1570 37L1645 37L1645 58L1720 58L1720 51L1720 36L1720 37L1645 37L1645 21L1570 21L1570 45L1496 45L1496 31L1421 31L1421 41L1346 41L1346 46L1271 46L1271 57L1197 57L1197 55L1122 55L1122 56L1047 56L1047 52L972 52L972 52L897 52L897 16L823 16L823 47L748 47L748 33L673 33L673 21L598 21L598 62L523 62L523 29L449 29L449 33L374 33L374 33L299 33L299 64L224 64L224 64L150 64L150 48L75 48L75 33L0 33Z"
                    fill="#d9eafd" opacity="0.33"></path>
                <path
                    d="M0 81L75 81L75 81L150 81L150 81L224 81L224 81L299 81L299 81L374 81L374 81L449 81L449 81L523 81L523 81L598 81L598 81L673 81L673 81L748 81L748 81L823 81L823 81L897 81L897 81L972 81L972 81L1047 81L1047 81L1122 81L1122 81L1197 81L1197 81L1271 81L1271 81L1346 81L1346 81L1421 81L1421 81L1496 81L1496 81L1570 81L1570 81L1645 81L1645 81L1720 81L1720 81L1720 49L1720 56L1645 56L1645 35L1570 35L1570 52L1496 52L1496 45L1421 45L1421 50L1346 50L1346 55L1271 55L1271 61L1197 61L1197 69L1122 69L1122 61L1047 61L1047 58L972 58L972 74L897 74L897 31L823 31L823 65L748 65L748 35L673 35L673 47L598 47L598 73L523 73L523 41L449 41L449 38L374 38L374 55L299 55L299 65L224 65L224 67L150 67L150 68L75 68L75 55L0 55Z"
                    fill="#d9eafd" opacity="0"></path>
            </svg>
        </div>
        <div class=" w-full px-4 py-20">
            <div class=" w-full max-w-[1080px] mx-auto">
                <div class=" grid grid-cols-2 gap-4 py-8">
                    <div class=" w-full space-y-4">
                        <div class=" flex gap-2 items-center text-white">
                            <div class=" w-12 h-12">
                                <img src="{{asset('assets/images/logo.png')}}" class=" w-full h-full object-contain" alt="">
                            </div>
                            <p class=" text-4xl font-black">Byoo.link</p>
                        </div>
                        <p class=" text-neutral-200">Jadilah bagian dari era digital dan wujudkan visi bisnis Anda bersama kami. Hubungi kami sekarang untuk solusi terbaik!</p>
                    </div>
                    <div class=" w-full grid grid-cols-2 gap-2">
                        <div class=" space-y-4">
                            <p class=" text-xl font-semibold text-white">Kontak Kami</p>
                            <div class=" space-y-2 text-neutral-200">
                                <div class=" flex flex-row gap-2 items-center">
                                    <div class=" w-4 h-4">
                                        <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h48v48H0z" fill="none"></path><path d="M13.25 21.59a30.12 30.12 0 0 0 13.18 13.17l4.4-4.41c.55-.55 1.34-.71 2.03-.49C35.1 30.6 37.51 31 40 31c1.11 0 2 .89 2 2v7c0 1.11-.89 2-2 2C21.22 42 6 26.78 6 8a2 2 0 0 1 2-2h7c1.11 0 2 .89 2 2 0 2.49.4 4.9 1.14 7.14.22.69.06 1.48-.49 2.03l-4.4 4.42z" fill="currentColor" class="fill-000000"></path></svg>
                                    </div>
                                    <p>+62 856-2420-3799</p>
                                </div>
                                <div class=" flex flex-row gap-2 items-center">
                                    <div class=" w-4 h-4">
                                        <svg viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"><path d="M20 3H4C1.8 3 0 4.8 0 7v10c0 2.2 1.8 4 4 4h16c2.2 0 4-1.8 4-4V7c0-2.2-1.8-4-4-4zm1.6 5.8-7.9 5.3c-.5.3-1.1.5-1.7.5s-1.2-.2-1.7-.5L2.4 8.8c-.4-.3-.5-.9-.2-1.4.3-.4.9-.5 1.4-.2l7.9 5.3c.3.2.8.2 1.1 0l7.9-5.3c.5-.3 1.1-.2 1.4.3.2.4.1 1-.3 1.3z" fill="currentColor" class="fill-000000"></path></svg>
                                    </div>
                                    <p>info@pages.id</p>
                                </div>
                                <div class=" flex flex-row gap-2 items-center">
                                    <div class=" w-4 h-4">
                                        <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h256v256H0z"></path><path d="M128 16a88.1 88.1 0 0 0-88 88c0 75.3 80 132.2 83.4 134.6a8.3 8.3 0 0 0 9.2 0C136 236.2 216 179.3 216 104a88.1 88.1 0 0 0-88-88Zm0 56a32 32 0 1 1-32 32 32 32 0 0 1 32-32Z" fill="currentColor" class="fill-000000"></path></svg>
                                    </div>
                                    <p>Kota Bandung, Jawa Barat</p>
                                </div>
                            </div>
                        </div>
                        <div class=" space-y-4">
                            <p class=" text-xl font-semibold text-white">Navigasi</p>
                            <div class=" flex flex-row gap-2">
                                <div class=" w-12 h-12 flex items-center justify-center bg-[#d9eafd] rounded-full p-3 text-[#4b5d70]">
                                    <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M501.303 132.765c-5.887-22.03-23.235-39.377-45.265-45.265C416.106 76.8 256 76.8 256 76.8s-160.107 0-200.039 10.7c-22.026 5.888-39.377 23.235-45.264 45.265C0 172.693 0 256.003 0 256.003s0 83.308 10.697 123.232c5.887 22.03 23.238 39.382 45.264 45.269C95.893 435.2 256 435.2 256 435.2s160.106 0 200.038-10.696c22.03-5.887 39.378-23.239 45.265-45.269 10.696-39.924 10.696-123.232 10.696-123.232s0-83.31-10.696-123.238ZM204.797 332.804V179.201l133.019 76.802-133.019 76.801Z" fill-rule="nonzero" fill="currentColor" class="fill-000000"></path></svg>
                                </div>
                                <div class=" w-12 h-12 flex items-center justify-center bg-[#d9eafd] rounded-full p-3 text-[#4b5d70]">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-.25a1.25 1.25 0 0 0-2.5 0 1.25 1.25 0 0 0 2.5 0zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z" fill="currentColor" class="fill-000000"></path></svg>
                                </div>
                                <div class=" w-12 h-12 flex items-center justify-center bg-[#d9eafd] rounded-full p-3 text-[#4b5d70]">
                                    <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h256v256H0z"></path><path d="M232 84v40a8 8 0 0 1-8 8 103.2 103.2 0 0 1-48-11.7V156a76 76 0 1 1-89.4-74.8 8 8 0 0 1 6.5 1.7 7.8 7.8 0 0 1 2.9 6.2v41.6a7.9 7.9 0 0 1-4.6 7.2A20 20 0 1 0 120 156V28a8 8 0 0 1 8-8h40a8 8 0 0 1 8 8 48 48 0 0 0 48 48 8 8 0 0 1 8 8Z" fill="currentColor" class="fill-000000"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" w-full min-h-10 h-10">
            <svg id="visual" viewBox="0 0 420 40"  class=" w-full h-full sm:hidden" preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
                <path
                    d="M0 0L32 0L32 0L65 0L65 6L97 6L97 11L129 11L129 5L162 5L162 3L194 3L194 12L226 12L226 0L258 0L258 2L291 2L291 10L323 10L323 13L355 13L355 0L388 0L388 4L420 4L420 4L420 0L420 0L388 0L388 0L355 0L355 0L323 0L323 0L291 0L291 0L258 0L258 0L226 0L226 0L194 0L194 0L162 0L162 0L129 0L129 0L97 0L97 0L65 0L65 0L32 0L32 0L0 0Z"
                    fill="#d9eafd" opacity="0"></path>
                <path
                    d="M0 16L32 16L32 11L65 11L65 16L97 16L97 26L129 26L129 9L162 9L162 11L194 11L194 28L226 28L226 21L258 21L258 17L291 17L291 23L323 23L323 15L355 15L355 29L388 29L388 9L420 9L420 29L420 2L420 2L388 2L388 0L355 0L355 11L323 11L323 8L291 8L291 0L258 0L258 0L226 0L226 10L194 10L194 1L162 1L162 3L129 3L129 9L97 9L97 4L65 4L65 0L32 0L32 0L0 0Z"
                    fill="#d9eafd" opacity="0.33"></path>
                <path
                    d="M0 27L32 27L32 40L65 40L65 30L97 30L97 34L129 34L129 25L162 25L162 34L194 34L194 28L226 28L226 35L258 35L258 27L291 27L291 36L323 36L323 34L355 34L355 33L388 33L388 23L420 23L420 33L420 27L420 7L388 7L388 27L355 27L355 13L323 13L323 21L291 21L291 15L258 15L258 19L226 19L226 26L194 26L194 9L162 9L162 7L129 7L129 24L97 24L97 14L65 14L65 9L32 9L32 14L0 14Z"
                    fill="#d9eafd" opacity="0.66"></path>
                <path
                    d="M0 41L32 41L32 41L65 41L65 41L97 41L97 41L129 41L129 41L162 41L162 41L194 41L194 41L226 41L226 41L258 41L258 41L291 41L291 41L323 41L323 41L355 41L355 41L388 41L388 41L420 41L420 41L420 31L420 21L388 21L388 31L355 31L355 32L323 32L323 34L291 34L291 25L258 25L258 33L226 33L226 26L194 26L194 32L162 32L162 23L129 23L129 32L97 32L97 28L65 28L65 38L32 38L32 25L0 25Z"
                    fill="#d9eafd"></path>
            </svg>
            <svg id="visual" viewBox="0 0 1720 80" class=" hidden sm:block w-full h-full"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                preserveAspectRatio="none">
                <path
                    d="M0 28L75 28L75 14L150 14L150 2L224 2L224 23L299 23L299 10L374 10L374 30L449 30L449 29L523 29L523 31L598 31L598 4L673 4L673 25L748 25L748 6L823 6L823 15L897 15L897 16L972 16L972 24L1047 24L1047 18L1122 18L1122 30L1197 30L1197 13L1271 13L1271 31L1346 31L1346 6L1421 6L1421 32L1496 32L1496 27L1570 27L1570 17L1645 17L1645 27L1720 27L1720 15L1720 0L1720 0L1645 0L1645 0L1570 0L1570 0L1496 0L1496 0L1421 0L1421 0L1346 0L1346 0L1271 0L1271 0L1197 0L1197 0L1122 0L1122 0L1047 0L1047 0L972 0L972 0L897 0L897 0L823 0L823 0L748 0L748 0L673 0L673 0L598 0L598 0L523 0L523 0L449 0L449 0L374 0L374 0L299 0L299 0L224 0L224 0L150 0L150 0L75 0L75 0L0 0Z"
                    fill="#d9eafd" opacity="0"></path>
                <path
                    d="M0 35L75 35L75 50L150 50L150 66L224 66L224 66L299 66L299 35L374 35L374 35L449 35L449 31L523 31L523 64L598 64L598 23L673 23L673 35L748 35L748 49L823 49L823 18L897 18L897 54L972 54L972 54L1047 54L1047 58L1122 58L1122 57L1197 57L1197 59L1271 59L1271 48L1346 48L1346 43L1421 43L1421 33L1496 33L1496 47L1570 47L1570 23L1645 23L1645 39L1720 39L1720 38L1720 13L1720 25L1645 25L1645 15L1570 15L1570 25L1496 25L1496 30L1421 30L1421 4L1346 4L1346 29L1271 29L1271 11L1197 11L1197 28L1122 28L1122 16L1047 16L1047 22L972 22L972 14L897 14L897 13L823 13L823 4L748 4L748 23L673 23L673 2L598 2L598 29L523 29L523 27L449 27L449 28L374 28L374 8L299 8L299 21L224 21L224 0L150 0L150 12L75 12L75 26L0 26Z"
                    fill="#d9eafd" opacity="0.33"></path>
                <path
                    d="M0 57L75 57L75 70L150 70L150 69L224 69L224 67L299 67L299 57L374 57L374 40L449 40L449 43L523 43L523 75L598 75L598 49L673 49L673 37L748 37L748 67L823 67L823 33L897 33L897 76L972 76L972 60L1047 60L1047 63L1122 63L1122 71L1197 71L1197 63L1271 63L1271 57L1346 57L1346 52L1421 52L1421 47L1496 47L1496 54L1570 54L1570 37L1645 37L1645 58L1720 58L1720 51L1720 36L1720 37L1645 37L1645 21L1570 21L1570 45L1496 45L1496 31L1421 31L1421 41L1346 41L1346 46L1271 46L1271 57L1197 57L1197 55L1122 55L1122 56L1047 56L1047 52L972 52L972 52L897 52L897 16L823 16L823 47L748 47L748 33L673 33L673 21L598 21L598 62L523 62L523 29L449 29L449 33L374 33L374 33L299 33L299 64L224 64L224 64L150 64L150 48L75 48L75 33L0 33Z"
                    fill="#d9eafd" opacity="0.66"></path>
                <path
                    d="M0 81L75 81L75 81L150 81L150 81L224 81L224 81L299 81L299 81L374 81L374 81L449 81L449 81L523 81L523 81L598 81L598 81L673 81L673 81L748 81L748 81L823 81L823 81L897 81L897 81L972 81L972 81L1047 81L1047 81L1122 81L1122 81L1197 81L1197 81L1271 81L1271 81L1346 81L1346 81L1421 81L1421 81L1496 81L1496 81L1570 81L1570 81L1645 81L1645 81L1720 81L1720 81L1720 49L1720 56L1645 56L1645 35L1570 35L1570 52L1496 52L1496 45L1421 45L1421 50L1346 50L1346 55L1271 55L1271 61L1197 61L1197 69L1122 69L1122 61L1047 61L1047 58L972 58L972 74L897 74L897 31L823 31L823 65L748 65L748 35L673 35L673 47L598 47L598 73L523 73L523 41L449 41L449 38L374 38L374 55L299 55L299 65L224 65L224 67L150 67L150 68L75 68L75 55L0 55Z"
                    fill="#d9eafd"></path>
            </svg>
        </div>
    </div>
    <div class=" w-full h-24"></div>
    @include('components.admin.mobile-navbar')
</x-layout.guest>