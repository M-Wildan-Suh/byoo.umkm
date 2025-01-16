@props(['color' => null, 'data', 'text' => null])
<div class=" w-full max-w-[640px] mx-auto px-4 sm:px-0 relative">
    <!-- Accordion Item 1 -->
    <div  x-data="{ open: null }" style="background-color: {{$color ?? 'white'}}" class="p-4 space-y-4 rounded-md ">
        <button
            @click="open = open === 1 ? null : 1"
            class="w-full flex justify-between items-center rounded-md focus:outline-none {{ $text ?? 'text-white' }}">
            <span class="font-medium tracking-wide text-lg">Tentang Kami</span>
            <svg
                :class="{ 'rotate-180': open === 1 }"
                class="w-5 h-5 transform transition-transform"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div
            x-show="open === 1"
            x-transition
            class=" {{ $text ?? 'text-white' }} text-sm rounded-md">
            <p class="">{!! nl2br(e($data->description == '' ? 'Description' : $data->description)) !!}</p>
        </div>
    </div>
</div>