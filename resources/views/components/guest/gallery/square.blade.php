<div class=" w-full max-w-[600px] mx-auto px-4 md:px-0 relative rounded-md overflow-hidden">
    <div class="swiper h-full max-h-full">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            @foreach ($data->productGallery as $item)
                <div x-data="{ loading: true }" x-intersect="$el.querySelector('img').src = '{{ $item->image }}'"
                    class="swiper-slide w-full aspect-square rounded-md overflow-hidden relative bg-gray-200 flex items-center justify-center">
                    <!-- Gambar -->
                    <img class="w-full h-full object-cover object-center absolute inset-0 opacity-0 transition-opacity duration-500"
                        alt="Raja Ampat" @load="loading = false; $el.classList.add('opacity-100')">

                    <!-- Overlay -->
                    <div class="w-full absolute inset-0 bg-black/20"></div>

                    <!-- Loading Spinner -->
                    <div x-show="loading" class="absolute inset-0 flex items-center justify-center">
                        <svg class="animate-spin h-10 w-10 text-white opacity-50" fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 24c0 11.046 8.954 20 20 20s20-8.954 20-20S35.046 4 24 4" stroke="#ffffff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="4" class="stroke-000000">
                            </path>
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
        <div
            class="prev absolute top-1/2 -translate-y-1/2 flex items-center px-2 left-0 z-10 py-3 bg-black/50 rounded-r-md">
            <div class=" text-white w-6 h-6">
                <svg viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m39.376 48.002 30.47-25.39a6.003 6.003 0 0 0-7.688-9.223L26.156 43.391a6.01 6.01 0 0 0 0 9.223l36.002 30.001a6.003 6.003 0 0 0 7.688-9.223Z"
                        fill="currentColor" class="fill-000000"></path>
                </svg>
            </div>
        </div>
        <div
            class="next absolute top-1/2 -translate-y-1/2 flex items-center px-2 right-0 z-10 py-3 bg-black/50 rounded-l-md">
            <div class=" text-white w-6 h-6">
                <svg viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M69.844 43.388 33.842 13.386a6.003 6.003 0 0 0-7.688 9.223L56.624 48l-30.47 25.39a6.003 6.003 0 0 0 7.688 9.223l36.002-30.001a6.01 6.01 0 0 0 0-9.223Z"
                        fill="currentColor" class="fill-000000"></path>
                </svg>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function() {
            const swiper = new Swiper('.swiper', {
                direction: 'horizontal',
                slidesPerView: 2,
                spaceBetween: 16,
                loop: true,
                speed: 500,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 3,
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
