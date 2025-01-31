<x-app-layout title="Admin - Profile">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-8 px-4 space-y-6">
        <div class="max-w-[1080px] mx-auto">
            @if (Auth::user()->role === 'admin')
                <div class="font-bold text-lg w-full py-3 bg-[#ff7100] text-white rounded-md text-center">Anda adalah Admin</div>
            @elseif (Auth::user()->role === 'premium')
                <div class="font-bold text-lg w-full py-3 bg-[#ff7100] text-white rounded-md flex justify-center text-center gap-2">
                    <p>Premium Aktif</p>
                    <p>Expired :</p>
                    <p>{{Auth::user()->expired ?? '-'}}</p>
                </div>
            @else
                <a href="{{route('premium.index')}}">
                    <button class=" font-bold text-lg w-full py-3 bg-[#ff7100] hover:bg-[#b95300] duration-300 text-white rounded-md text-center">Dapatkan Akun Premium</button>
                </a>
            @endif
        </div>
        <div class="max-w-[1080px] mx-auto space-y-6">
            <div class="p-4 sm:p-8 bg-[#F8FAFC] shadow rounded-md">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#F8FAFC] shadow rounded-md">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#F8FAFC] shadow rounded-md">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
