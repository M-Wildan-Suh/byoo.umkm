<x-layout.guest>
    @include('components.guest.header')
    <div class=" pt-16 w-full">
        <div
            class=" w-full bg-[#4b5d70] sm:h-[720px] text-white px-4 pt-0 pb-14 sm:pt-8 sm:pb-8 overflow-hidden relative">
            <div class=" absolute top-0 left-0 w-full h-full overflow-hidden">
                <img src="{{ asset('assets/images/bannerbg.png') }}" class=" w-full h-full object-cover" alt="">
                <div class=" absolute w-full bottom-0 left-0 min-h-10 h-10">
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
            <div class=" w-full max-w-[1080px] h-full mx-auto relative">
                <div class=" w-full h-full grid grid-cols-1 grid-cols-reverse sm:grid-cols-2 ">
                    <div class=" flex items-center order-2 sm:order-1">
                        <div class=" space-y-3 text-center sm:text-left">
                            <p class=" text-2xl sm:text-5xl font-bold">Bangun Citra Bisnis Anda dengan Website
                                Profesional</p>
                            <p class=" text-neutral-200">Tampil modern dan terpercaya dengan website responsif yang
                                mudah diakses di berbagai perangkat.</p>
                            <div class="flex justify-center sm:justify-start">
                                <a href="{{ route('allproduct') }}">
                                    <button
                                        class=" px-4 flex justify-center py-2 border rounded-md text-white bg-[#ff7100] border-[#ff7100] hover:text-white hover:bg-[#b95300] hover:border-[#b95300] font-black duration-300 relative">Komunitas</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center order-1 sm:order-2">
                        <div class=" w-full aspect-square justify-end overflow-hidden">
                            <img src="{{ asset('assets/images/banner.png') }}" class=" w-full object-contain"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-24 px-4 space-y-16">
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" w-full space-y-12">
                <div class=" w-full flex flex-col items-center justify-center text-[#4b5d70]">
                    <p class=" text-3xl font-black">Manfaat Byoo.link</p>
                    <p>~~~~~~</p>
                </div>
                <div class=" w-full grid grid-cols-1 sm:grid-cols-3 gap-12 sm:gap-4 py-8">
                    <div class=" w-full bg-[#F8FAFC] rounded-md shadow-md shadow-[#4b5d70]/20 relative">
                        <div class=" w-16 h-16 p-3 bg-[#4b5d70] text-white rounded-md absolute left-1/2 -translate-x-1/2 top-0 -translate-y-1/2">
                            <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h256v256H0z"></path><path d="M221.6 149.4a96.2 96.2 0 0 0 2.4-22.2c-.4-52.9-44.2-95.7-97-95.2a96 96 0 0 0-31 186.5 23.9 23.9 0 0 0 32-22.6V192a23.9 23.9 0 0 1 24-24h46.2a24 24 0 0 0 23.4-18.6Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" class="stroke-000000"></path><circle cx="128" cy="76" r="16" fill="currentColor" class="fill-000000"></circle><circle cx="83" cy="102" r="16" fill="currentColor" class="fill-000000"></circle><circle cx="83" cy="154" r="16" fill="currentColor" class="fill-000000"></circle><circle cx="173" cy="102" r="16" fill="currentColor" class="fill-000000"></circle></svg>
                        </div>
                        <div class=" w-full px-4 pt-10 pb-4 text-center space-y-2">
                            <p class=" text-xl text-[#4b5d70] font-semibold">Desain Modern dan Elegan</p>
                            <p class=" text-[#4b5d70]">Tampilkan citra bisnis terpercaya dengan desain elegan, modern, menarik, dan berkelas.</p>
                        </div>
                    </div>
                    <div class=" w-full bg-[#F8FAFC] rounded-md shadow-md shadow-[#4b5d70]/20 relative">
                        <div class=" w-16 h-16 p-3 bg-[#4b5d70] text-white rounded-md absolute left-1/2 -translate-x-1/2 top-0 -translate-y-1/2">
                            <svg viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 16 16"><path d="M5 16h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM4 2h8v12H4V2z" fill="currentColor" class="fill-000000"></path></svg>
                        </div>
                        <div class=" w-full px-4 pt-10 pb-4 text-center space-y-2">
                            <p class=" text-xl text-[#4b5d70] font-semibold">Responsif di Semua Perangkat</p>
                            <p class=" text-[#4b5d70]">Website mudah diakses dengan tampilan sempurna di smartphone, tablet, dan komputer.</p>
                        </div>
                    </div>
                    <div class=" w-full bg-[#F8FAFC] rounded-md shadow-md shadow-[#4b5d70]/20 relative">
                        <div class=" w-16 h-16 p-3 bg-[#4b5d70] text-white rounded-md absolute left-1/2 -translate-x-1/2 top-0 -translate-y-1/2">
                            <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h256v256H0z"></path><circle cx="128" cy="128" fill="none" r="48" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" class="stroke-000000"></circle><path d="M183.7 65.1q3.8 3.5 7.2 7.2l27.3 3.9a103.2 103.2 0 0 1 10.2 24.6l-16.6 22.1s.3 6.8 0 10.2l16.6 22.1a102.2 102.2 0 0 1-10.2 24.6l-27.3 3.9s-4.7 4.9-7.2 7.2l-3.9 27.3a103.2 103.2 0 0 1-24.6 10.2l-22.1-16.6a57.9 57.9 0 0 1-10.2 0l-22.1 16.6a102.2 102.2 0 0 1-24.6-10.2l-3.9-27.3q-3.7-3.5-7.2-7.2l-27.3-3.9a103.2 103.2 0 0 1-10.2-24.6l16.6-22.1s-.3-6.8 0-10.2l-16.6-22.1a102.2 102.2 0 0 1 10.2-24.6l27.3-3.9q3.5-3.7 7.2-7.2l3.9-27.3a103.2 103.2 0 0 1 24.6-10.2l22.1 16.6a57.9 57.9 0 0 1 10.2 0l22.1-16.6a102.2 102.2 0 0 1 24.6 10.2Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" class="stroke-000000"></path></svg>
                        </div>
                        <div class=" w-full px-4 pt-10 pb-4 text-center space-y-2">
                            <p class=" text-xl text-[#4b5d70] font-semibold">Mudah Diakses dan Dikelola</p>
                            <p class=" text-[#4b5d70]">Navigasi intuitif dengan pengelolaan konten yang praktis dan sangat sederhana.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" w-full grid sm:grid-cols-2 gap-6 sm:gap-0">
                <div class=" w-full px-10 sm:pl-8 sm:pr-16 grid grid-cols-2 gap-4">
                    <div class=" w-full rounded-3xl aspect-[3/5] border-4 border-[#F8FAFC] overflow-hidden">
                        <img src="{{ asset('assets/images/template/six.png') }}" class=" w-full object-cover"
                            alt="">
                    </div>
                    <div class=" w-full rounded-3xl aspect-[3/5] border-4 border-[#F8FAFC] overflow-hidden mt-10">
                        <img src="{{ asset('assets/images/template/ten.png') }}" class=" w-full object-cover"
                            alt="">
                    </div>
                </div>
                <div class=" flex items-center">
                    <div class=" space-y-3 text-center sm:text-left sm:pl-4 sm:pr-8">
                        <p class=" text-2xl font-black">Buat Usaha Anda Jadi Memiliki Website Profesional</p>
                        <p class=" text-[#4b5d70]">Tingkatkan citra usaha Anda dengan website profesional yang modern,
                            responsif, dan mudah diakses. Jadikan bisnis Anda lebih terpercaya dan menarik di era
                            digital!</p>
                        <div class="flex justify-center sm:justify-start">
                            <a href="https://wa.me/{{ $no_tlp ?? '' }}">
                                <button
                                    class=" px-4 flex justify-center py-2 border rounded-md text-white bg-[#ff7100] border-[#ff7100] hover:text-white hover:bg-[#b95300] hover:border-[#b95300] font-black duration-300 relative text-sm">Hubungi
                                    Kami</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[1080px] mx-auto">
            <div class=" w-full space-y-8 pb-24">
                <div class=" w-full flex flex-col items-center justify-center text-[#4b5d70]">
                    <p class=" text-3xl font-black">Komunitas</p>
                    <p>~~~~~~</p>
                </div>
                <div class="grid grid-cols-2 gap-3 lg:gap-8">
                    @foreach ($data->take(4) as $item)
                        <div
                            class=" w-full bg-[#F8FAFC] shadow-md shadow-black/20 rounded-md grid grid-cols-1 md:grid-cols-7 md:p-4 gap-2 md:gap-4">
                            <div
                                class=" md:col-span-3 flex items-center w-full aspect-[5/4] md:max-h-[157.6px] md:aspect-auto rounded-t-md md:rounded overflow-hidden">
                                <img class=" w-full h-full object-cover"
                                    src="{{ asset('storage/images/product/' . $item->image) }}" alt="">
                            </div>
                            <div
                                class=" md:col-span-4 flex flex-col justify-between md:pt-1 gap-1 p-2 pt-0 md:p-0 md:gap-2 text-sm md:text-base">
                                <a href="{{ route('detail', ['slug' => $item->slug]) }}">
                                    <p class=" text-lg font-semibold line-clamp-1">{{ $item->name }}</p>
                                </a>
                                <div class="">
                                    {{-- <p class="">Mulai dari Rp. {{ str_replace(',', '.', number_format($item->price))}}</p> --}}
                                    <p class=" text-neutral-600 text-sm line-clamp-2">{{ $item->subtitle }}</p>
                                </div>
                                <div class=" pt-2 gap-2">
                                    <a href="{{ route('detail', ['slug' => $item->slug]) }}">
                                        <button
                                            class="w-full flex justify-center py-1 sm:py-2 border rounded-md text-white bg-[#ff7100] border-[#ff7100] hover:text-white hover:bg-[#b95300] hover:border-[#b95300] hover:font-black duration-300 relative text-sm">
                                            <div
                                                class="w-4 sm:w-5 aspect-square absolute left-2 top-1/2 -translate-y-1/2">
                                                <svg viewBox="0 0 32 32" xml:space="preserve"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16 7C9.934 7 4.798 10.776 3 16c1.798 5.224 6.934 9 13 9s11.202-3.776 13-9c-1.798-5.224-6.934-9-13-9z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"
                                                        class="stroke-000000"></path>
                                                    <circle cx="16" cy="16" fill="none" r="5"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"
                                                        class="stroke-000000"></circle>
                                                </svg>
                                            </div>
                                            Lihat Detail
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class=" w-full flex justify-center">
                    <a href="{{ route('allproduct') }}" class=" text-sm">
                        <button class="w-full flex justify-center py-2 px-4 border rounded-md text-white bg-[#ff7100] border-[#ff7100] hover:text-white hover:bg-[#b95300] hover:border-[#b95300] font-black duration-300 relative">View More</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('components.guest.footer')
    @include('components.admin.mobile-navbar')
</x-layout.guest>
