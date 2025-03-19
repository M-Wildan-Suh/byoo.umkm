<x-layout.guest>
    <div class=" w-full max-w-[600px] mx-auto bg-white p-6 rounded-lg h-screen flex flex-col justify-center items-center">
        <h1 class="text-2xl font-bold text-center mb-4 uppercase">Invoice</h1>

        <hr class="my-2">

        <pre class="bg-gray-100 text-center p-4 rounded w-full">{{ $invoice->invoice_text }}</pre>

        <a href="{{ route('detail', ['slug' => $data->slug]) }}" class=" text-sm sm:text-base w-full block text-center mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Kembali ke {{$data->name}}
        </a>
    </div>
</x-layout.guest>