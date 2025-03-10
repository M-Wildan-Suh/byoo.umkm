<x-layout.guest>
    @include('components.guest.header')
    <div class="pt-28 px-4 sm:px-6 space-y-16">  
        <div class="w-full max-w-[1080px] mx-auto">
            <div class=" w-full space-y-8 pb-24">
                <div class=" w-full space-y-6">
                    <div class=" w-full flex flex-col items-center justify-center gap-4 md:gap-6">
                        <p class=" text-3xl font-black capitalize text-center">Bisnis Terdaftar</p>
                        <div class=" rounded-xl bg-black h-1 w-20"></div>
                    </div>
                    <form action="{{ route('allproduct') }}" class="flex justify-end" method="GET">
                        <div class="w-full flex items-center justify-end gap-4">
                            <!-- Search Input -->
                            <input type="text" name="search" placeholder="Cari..." class="w-full sm:w-auto py-1 rounded-md focus:border-[#ff7100] focus:ring-[#ff7100]" value="{{ request('search') }}" @input="document.querySelector('form').submit()">
                    
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
                                                aria-label="Filter"
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
                                                    aria-label="Filter"
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
                        <div x-data="{ show: false }" 
                            x-intersect.once="show = true" 
                            x-bind:class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-1/4'" 
                            class=" w-full bg-[#F8FAFC] shadow-md shadow-black/20 rounded-xl grid grid-cols-1 md:grid-cols-8 gap-4 md:gap-0transition-all duration-1000 ease-out">
                            <div
                                class=" md:col-span-3 flex items-center w-full aspect-square rounded-t-md md:rounded-xl md:rounded-r-none overflow-hidden">
                                <img class=" w-full h-full object-cover"
                                    src="{{ asset('storage/images/product/' . $item->image) }}" alt="">
                            </div>
                            <div
                                class=" md:col-span-5 flex flex-col justify-between gap-1 p-2 pt-0 md:pt-8 md:p-4 md:gap-2 text-sm md:text-base">
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
                                            class="w-full flex items-center justify-center py-1 sm:py-2 border rounded-xl text-white bg-[#ff7100] border-[#ff7100] hover:text-white hover:bg-[#b95300] hover:border-[#b95300] font-black duration-300 relative text-sm gap-1 sm:gap-2">
                                            <div
                                                class="w-4 h-4 aspect-square">
                                                <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M29.946 15.675C27.954 9.888 22.35 6 16 6S4.046 9.888 2.054 15.675c-.072.21-.072.44 0 .65C4.046 22.112 9.65 26 16 26s11.954-3.888 13.946-9.675c.072-.21.072-.44 0-.65zM16 22c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z" fill="currentColor" class="fill-000000"></path></svg>
                                            </div>
                                            <p>Lihat Detail</p>
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
    @include('components.guest.footer')
    @include('components.admin.mobile-navbar')
</x-layout.guest>