<x-layout.guest>
    <div class=" w-full max-w-[600px] mx-auto bg-white p-6 rounded-lg h-screen flex flex-col justify-center items-center">
        <h1 class="text-2xl font-bold text-center mb-4 uppercase">Rekap Orderan</h1>

        <hr class="my-2">

        <div class=" bg-gray-100 p-4 rounded w-full space-y-4">
            <pre class=" w-full text-center">===== Rekap orderan =====</pre>
            <pre class=" w-full">{!! $invoice->invoice_text !!}</pre>
            <pre class=" w-full text-center">===================</pre>
        </div>

        <a href="{{ route('detail', ['slug' => $data->slug]) }}" class=" text-sm sm:text-base text-center w-full block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Kembali ke {{$data->name}}
        </a>
    </div>
</x-layout.guest>