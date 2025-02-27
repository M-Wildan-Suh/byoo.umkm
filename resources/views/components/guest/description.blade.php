{{-- @props(['color' => null, 'data', 'text' => null]) --}}
<div class=" w-full max-w-[600px] mx-auto px-4 sm:px-0 relative">
    <!-- Accordion Item 1 -->
    <div  x-data="{ open: null }" style="background-color: {{$template->desc_main_color ?? 'white'}}; color: {{$template->desc_text_color ?? 'black'}}" class="p-4 space-y-2 rounded-md">
        <p class="w-full font-bold tracking-wide text-lg sm:text-xl">Tentang Kami</p>
        
        @include('components.guest.termandcondition')

        <div
            class=" text-sm sm:text-base rounded-md">
            <p class="">{!! nl2br(e($data->description == '' ? 'Description' : $data->description)) !!}</p>
        </div>
    </div>
</div>