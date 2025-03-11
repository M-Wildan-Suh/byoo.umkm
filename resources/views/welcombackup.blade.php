<x-layout.guest>
    @include('components.guest.header')
    <div class=" w-full h-96 pt-[72px] px-4 sm:px-6 bg-[#0B192C]">
        <div class=" w-full h-full max-w-xl mx-auto text-white">
            <div class=" w-full h-full grid pb-16 grid-cols-2">
                <div class=" w-full h-full flex flex-col justify-center gap-4">
                    <p class=" text-2xl sm:text-3xl font-semibold">Byoo.link</p>
                    <p class=" text-sm sm:text-base font-semibold">Bangun Citra Bisnis Anda dengan Website Profesional</p>
                    <a href="{{ route('allproduct') }}">
                        <button
                            class=" text-sm sm:text-base px-3 sm:px-4 flex items-center justify-center gap-1 py-2 border rounded-full text-white bg-[#ff7100] border-[#ff7100] hover:text-white hover:bg-[#b95300] hover:border-[#b95300] font-black duration-300 relative capitalize">
                            <p>Bisnis Terdaftar</p>
                            <div class=" w-4 h-4">
                                <svg viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg"><path d="M69.844 43.388 33.842 13.386a6.003 6.003 0 0 0-7.688 9.223L56.624 48l-30.47 25.39a6.003 6.003 0 0 0 7.688 9.223l36.002-30.001a6.01 6.01 0 0 0 0-9.223Z" fill="currentColor" class="fill-000000"></path></svg>
                            </div>
                        </button>
                    </a>
                </div>
                <div class=" w-full h-full flex justify-end items-center overflow-hidden">
                    <img src="{{ asset('assets/images/banner.webp') }}" class=" w-full h-full object-contain" alt="">
                </div>
            </div>
        </div>
        <div class=" w-full -mt-14">
            <div class=" w-full space-y-6">
                <div class=" w-full max-w-xl bg-white p-4 sm:p-6 rounded-xl mx-auto shadow-md shadow-black/20 space-y-6">
                    <div class=" w-full flex justify-between">
                        <p class="flex items-center font-semibold gap-1 text-xl">Kenapa Byoo.link ?</p>
                    </div>
                    <div class=" grid grid-cols-2 sm:grid-cols-3 gap-4">
                        <div class=" w-full rounded-xl flex flex-col items-center gap-2">
                            <div class=" w-14 p-2 rounded-full aspect-square bg-[#ff7100] text-white">
                                <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="none" d="M0 0h256v256H0z"></path>
                                    <path
                                        d="M221.6 149.4a96.2 96.2 0 0 0 2.4-22.2c-.4-52.9-44.2-95.7-97-95.2a96 96 0 0 0-31 186.5 23.9 23.9 0 0 0 32-22.6V192a23.9 23.9 0 0 1 24-24h46.2a24 24 0 0 0 23.4-18.6Z"
                                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="24" class="stroke-000000"></path>
                                    <circle cx="128" cy="76" r="16" fill="currentColor" class="fill-000000">
                                    </circle>
                                    <circle cx="83" cy="102" r="16" fill="currentColor" class="fill-000000">
                                    </circle>
                                    <circle cx="83" cy="154" r="16" fill="currentColor" class="fill-000000">
                                    </circle>
                                    <circle cx="173" cy="102" r="16" fill="currentColor" class="fill-000000">
                                    </circle>
                                </svg>
                            </div>
                            <p class=" text-center font-semibold">
                                Desain Modern dan Elegan
                            </p>
                        </div>
                        <div class=" w-full rounded-xl flex flex-col items-center gap-2">
                            <div class=" w-14 p-2 rounded-full aspect-square bg-[#ff7100] text-white">
                                <svg viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 16 16">
                                    <path
                                        d="M5 16h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM4 2h8v12H4V2z"
                                        fill="currentColor" class="fill-000000"></path>
                                </svg>
                            </div>
                            <p class=" text-center font-semibold">
                                Responsif di Semua Perangkat
                            </p>
                        </div>
                        <div class=" col-span-2 sm:col-span-1 w-full rounded-xl flex flex-col items-center gap-2">
                            <div class=" w-14 p-2 rounded-full aspect-square bg-[#ff7100] text-white">
                                <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="none" d="M0 0h256v256H0z"></path>
                                    <circle cx="128" cy="128" fill="none" r="48" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16"
                                        class="stroke-000000"></circle>
                                    <path
                                        d="M183.7 65.1q3.8 3.5 7.2 7.2l27.3 3.9a103.2 103.2 0 0 1 10.2 24.6l-16.6 22.1s.3 6.8 0 10.2l16.6 22.1a102.2 102.2 0 0 1-10.2 24.6l-27.3 3.9s-4.7 4.9-7.2 7.2l-3.9 27.3a103.2 103.2 0 0 1-24.6 10.2l-22.1-16.6a57.9 57.9 0 0 1-10.2 0l-22.1 16.6a102.2 102.2 0 0 1-24.6-10.2l-3.9-27.3q-3.7-3.5-7.2-7.2l-27.3-3.9a103.2 103.2 0 0 1-10.2-24.6l16.6-22.1s-.3-6.8 0-10.2l-16.6-22.1a102.2 102.2 0 0 1 10.2-24.6l27.3-3.9q3.5-3.7 7.2-7.2l3.9-27.3a103.2 103.2 0 0 1 24.6-10.2l22.1 16.6a57.9 57.9 0 0 1 10.2 0l22.1-16.6a102.2 102.2 0 0 1 24.6 10.2Z"
                                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="16" class="stroke-000000"></path>
                                </svg>
                            </div>
                            <p class=" text-center font-semibold">
                                Mudah Diakses dan Dikelola
                            </p>
                        </div>
                    </div>
                </div>
                <div class=" w-full max-w-xl rounded-xl mx-auto space-y-6">
                    <div class=" w-full flex justify-between items-center">
                        <p class="flex items-center font-semibold gap-1 text-xl">Kenapa Byoo.link ?</p>
                        <a href="" class=" text-sm text-[#ff7100] hover:text-black duration-300">
                            <p>View All</p>
                            <div class=" w-4 aspect-square">

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('components.guest.footer') --}}
    @include('components.admin.mobile-navbar')
</x-layout.guest>