@props(['color' => null, 'data', 'text' => null])
<div class=" w-full max-w-[640px] mx-auto px-4 sm:px-0 relative">
    <!-- Accordion Item 1 -->
    <div  x-data="{ open: null }" style="background-color: {{$color ?? 'white'}}" class="p-4 space-y-4 rounded-md {{ $text ?? 'text-white' }}">
        <p class="w-full font-bold tracking-wide text-lg">Tentang Kami</p>
        <div x-data="{ open: false }"  class="">
            <button @click="open = true" class=" hover:text-blue-500 duration-300">
              Syarat dan Ketentuan
            </button> 
          
            <div 
              x-show="open" 
              class="fixed inset-0 z-40 px-4 bg-black bg-opacity-50 flex items-center justify-center">
              <div class="bg-white p-6 rounded shadow-lg w-full max-w-[640px]">
                <h2 class="text-lg font-semibold mb-4 text-black">Syarat dan Ketentuan</h2>
                <p class="text-gray-700 mb-4">Isi syarat dan ketentuan akan ditampilkan di sini.</p>
                <button @click="open = false" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                  Tutup
                </button>
              </div>
            </div>
          </div>
          
        <div
            class=" text-sm rounded-md">
            <p class="">{!! nl2br(e($data->description == '' ? 'Description' : $data->description)) !!}</p>
        </div>
    </div>
</div>