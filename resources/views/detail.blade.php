<x-layout.guest>
    <div class=" mx-auto rounded-md bg-white min-h-screen relative">
        <div class=" space-y-6">
            <div class=" background min-h-screen pt-6 relative space-y-4 bg-gradient-to-b">
                @include('components.guest.banner.'.$template->head_type)
    
                @include('components.guest.gallery.'.$template->gallery_type)
    
                @include('components.guest.youtube')

                {{-- <x-guest.description color="#81BFDA" :data="$data" /> --}}
                @include('components.guest.description')
    
                @include('components.guest.product.'.$template->product_type)

                @include('components.guest.tags')
    
                @include('components.guest.contact')
            </div>
        </div>
    </div>
    <style>
        .background {
            @if ($template->bg_type === 'normal')
                background-color: {{ $template->bg_main_color }};
            @elseif ($template->bg_type === 'gradient')
                background: linear-gradient(to bottom, {{ $template->bg_main_color }}, {{ $template->bg_second_color }});
            @elseif ($template->bg_type === 'image')
                background-image: url('{{ asset('storage/images/template/background/'.$template->bg_image) }}');
                background-size: cover;
                background-position: center;
            @endif
        };
    </style>
    
</x-layout.guest>