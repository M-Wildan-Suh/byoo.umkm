<x-layout.guest>
    <div class=" w-full max-w-[600px] mx-auto bg-white p-6 rounded-lg min-h-screen flex flex-col justify-center items-center">
        <h1 class=" text-xl sm:text-2xl font-bold text-center mb-4 uppercase">Rekap Orderan {{$data->name}}</h1>

        <hr class="my-2">

        <div class=" bg-gray-100 p-4 rounded w-full space-y-4 relative">
            <pre class=" w-full text-center">===== Rekap orderan =====</pre>
            <pre class=" w-full text-sm sm:text-base">{!! $invoice->invoice_text !!}</pre>
            <pre class=" w-full text-center">===================</pre>
            <button 
                x-data="{ copied: false }" 
                @click="navigator.clipboard.writeText('{{ route('invoice.show', ['code' => $invoice->invoice_code]) }}').then(() => { copied = true; setTimeout(() => copied = false, 2000); })" 
                class="!mt-0 absolute top-4 right-4 text-sm bg-blue-500 py-1 px-3 rounded-full text-white hover:bg-blue-600 duration-300">
                Copy link
                <span x-show="copied" class="absolute top-full right-0 mt-1 bg-gray-700 text-white text-xs py-1 px-2 rounded">Copied!</span>
            </button>
        </div>

        <a href="{{ route('detail', ['slug' => $data->slug]) }}" class=" text-sm sm:text-base text-center w-full block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Kembali ke {{$data->name}}
        </a>
    </div>
</x-layout.guest>