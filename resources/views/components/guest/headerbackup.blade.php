<div class=" fixed w-full top-0 left-0 p-4 sm:px-6 backdrop-blur-md z-50">
    <div class=" max-w-xl mx-auto flex justify-between gap-2 sm:gap-6">
        <div class=" min-w-10 w-10 aspect-square">
            <img src="{{asset('assets/images/logo.webp')}}" alt="">
        </div>
        <div class=" flex-grow">
            <div class=" flex items-center justify-between h-10 rounded-full bg-white overflow-hidden">
                <input type="text" class=" min-w-0 sm:flex-grow text-sm px-4 sm:px-6 bg-transparent border-none ring-0 focus:border-none focus:ring-0" placeholder="Cari Bisnis...">
                <button class=" px-4 sm:px-6 hover:bg-[#ff7100] hover:text-white duration-300 h-full">
                    <div class=" w-6 h-6">
                        <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m27.414 24.586-5.077-5.077A9.932 9.932 0 0 0 24 14c0-5.514-4.486-10-10-10S4 8.486 4 14s4.486 10 10 10a9.932 9.932 0 0 0 5.509-1.663l5.077 5.077a2 2 0 1 0 2.828-2.828zM7 14c0-3.86 3.14-7 7-7s7 3.14 7 7-3.14 7-7 7-7-3.14-7-7z" fill="currentColor" class="fill-000000"></path></svg>
                    </div>
                </button>
            </div>
        </div>
        <button class=" min-w-7 w-7 h-10 aspect-square py-1.5 text-white">
            <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h256v256H0z"></path><circle cx="128" cy="120" r="44" fill="currentColor" class="fill-000000"></circle><path d="M128 24a104 104 0 1 0 104 104A104.2 104.2 0 0 0 128 24Zm65.8 162.4a81.3 81.3 0 0 0-24.5-23 59.7 59.7 0 0 1-82.6 0 81.3 81.3 0 0 0-24.5 23 88 88 0 1 1 131.6 0Z" fill="currentColor" class="fill-000000"></path></svg>
        </button>
    </div>
    @if (Route::has('login'))
        {{-- @auth
            <a href="{{ route('dashboard') }}" class=" absolute top-1/2 -translate-y-1/2 right-4 sm:right-10 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class=" absolute top-1/2 -translate-y-1/2 right-4 sm:right-10 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Register</a>
            @endif
        @endauth --}}
    @endif
</div>