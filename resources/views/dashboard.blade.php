<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-4 px-4">
        <div class="max-w-[1080px] mx-auto">
            <a href="{{route('premium.index')}}">
                <button class=" font-bold text-lg w-full py-3 bg-[#ff7100] hover:bg-[#b95300] duration-300 text-white rounded-md text-center">Dapatkan Akun Premium</button>
            </a>
        </div>
    </div>
    {{-- <div class="py-4 px-4">
        <div class="max-w-[1080px] mx-auto">
            <div class=" w-full p-4 sm:p-8 bg-[#F8FAFC] rounded-md shadow-md shadow-black/20 flex flex-col gap-6">
                <p class=" font-black text-lg">Keuntungan akun Premium</p>

            </div>
        </div>
    </div> --}}
</x-app-layout>
