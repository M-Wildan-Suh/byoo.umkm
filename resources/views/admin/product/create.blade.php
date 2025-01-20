<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-4 px-4">
        <div class="max-w-[1080px] mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-4 md:p-6 text-gray-900">
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class=" w-full space-y-6">
                            <div class=" grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class=" flex flex-col gap-2">
                                    <div class=" w-full h-full max-h-[268.8px] relative">
                                        <img id="thumbnail" class=" object-cover w-full h-full rounded-md" 
                                            src="{{ asset('assets/images/placeholder.webp')}}" 
                                            alt="Logo">
                                        <div class="w-full text-transparent rounded-md h-full absolute top-0 left-0 flex justify-center items-center hover:bg-black/60 hover:text-white/50 duration-300">
                                            <label for="thumbnail-input" class="relative">
                                                <div class="w-full h-full p-[35%]">
                                                    <svg fill="none" class=" w-full h-full" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z" fill="currentColor" class="fill-212121"></path></svg>
                                                </div>
                                                <input accept="image/*" type="file" name="thumbnail" class="absolute bottom-0 left-0 z-0 w-40 opacity-0" id="thumbnail-input" required/>
                                            </label>
                                        </div>
                                        <script>
                                            const logoinput = document.getElementById('thumbnail-input');
                                            const logo = document.getElementById('thumbnail');
                    
                                            logoinput.onchange = evt => {
                                                const [file] = logoinput.files;
                                                if (file) {
                                                    logo.src = URL.createObjectURL(file);
                                                }
                                            };
                    
                                            window.addEventListener('paste', e => {
                                                const [file] = e.clipboardData.files;
                                                if (file) {
                                                    logo.src = URL.createObjectURL(file);
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class=" w-full md:col-span-2 space-y-6">
                                    <div class=" space-y-2">
                                        <label for="name">Nama Usaha</label>
                                        <input class=" w-full border-gray-300 focus:border-[#ff7100] focus:ring-[#ff7100] rounded-md shadow-sm" type="text" name="name" id="name">
                                    </div>
                                    <div class=" space-y-2">
                                        <label for="price">Harga</label>
                                        <input class=" w-full border-gray-300 focus:border-[#ff7100] focus:ring-[#ff7100] rounded-md shadow-sm" type="number" min="0" name="price" id="price">
                                    </div>
                                    <div class=" space-y-2">
                                        <label for="link">Link Youtube</label>
                                        <input class=" w-full border-gray-300 focus:border-[#ff7100] focus:ring-[#ff7100] rounded-md shadow-sm" type="text" name="link" id="link">
                                    </div>
                                </div>
                            </div>
                            <div class=" space-y-2">
                                <label for="subtitle">Sub Judul</label>
                                <textarea class="w-full border-gray-300 focus:border-[#ff7100] focus:ring-[#ff7100] rounded-md shadow-sm" name="subtitle" id="subtitle" rows="2" maxlength="64"></textarea>
                            </div>
                            <div class=" space-y-2">
                                <label for="no_tlp">No. Telephone</label>
                                <input class=" w-full border-gray-300 focus:border-[#ff7100] focus:ring-[#ff7100] rounded-md shadow-sm" type="text" name="no_tlp" id="no_tlp">
                            </div>
                            <div class=" space-y-2">
                                <label for="desc">Deskripsi</label>
                                <textarea class="w-full border-gray-300 focus:border-[#ff7100] focus:ring-[#ff7100] rounded-md shadow-sm" name="description" id="desc" rows="5"></textarea>
                            </div>
                            <div class=" space-y-2">
                                <label for="address">Alamat</label>
                                <textarea class="w-full border-gray-300 focus:border-[#ff7100] focus:ring-[#ff7100] rounded-md shadow-sm" name="address" id="address" rows="5"></textarea>
                            </div>
                            <x-admin.component.taginput title="Tag" :value="null" :tag="$tag" name="tag[]"></x-admin.component.taginput>
                            <div class=" space-y-2">
                                <label for="home_button">Tombol Home</label>
                                <div class=" w-full grid grid-cols-2 gap-4">
                                    <div class=" w-full flex items-center gap-2">
                                        <input type="radio" class=" focus:bg-[#ff7100] focus:ring-[#ff7100] checked:focus:ring-[#ff7100] checked:ring-[#ff7100] checked:text-[#ff7100]" name="home_button" value="on" id="on" checked>
                                        <label for="on">On</label>
                                    </div>
                                    <div class=" w-full flex items-center gap-2">
                                        <input type="radio" class=" focus:bg-[#ff7100] focus:ring-[#ff7100] checked:focus:ring-[#ff7100] checked:ring-[#ff7100] checked:text-[#ff7100]" name="home_button" value="off" id="off">
                                        <label for="off">Off</label>
                                    </div>
                                </div>
                            </div>
                            <div class=" space-y-2">
                                <label for="template">Template</label>
                                <div x-data="{ selected: '{{$product->template ?? ''}}' }" class=" w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="two" value="two" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'two') 
                                               @change="selected = 'two'">
                                        <label for="two" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'two' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-black flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/two.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="three" value="three" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'three') 
                                               @change="selected = 'three'">
                                        <label for="three" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'three' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-black flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/three.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        
                                        <input type="radio" name="template" id="four" value="four" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'four') 
                                               @change="selected = 'four'">
                                        <label for="four" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'four' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-black flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/four.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="five" value="five" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'five') 
                                               @change="selected = 'five'">
                                        <label for="five" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'five' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/five.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="six" value="six" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'six') 
                                               @change="selected = 'six'">
                                        <label for="six" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'six' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/six.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="seven" value="seven" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'seven') 
                                               @change="selected = 'seven'">
                                        <label for="seven" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'seven' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/seven.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="eight" value="eight" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'eight') 
                                               @change="selected = 'eight'">
                                        <label for="eight" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'eight' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/eight.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="nine" value="nine" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'nine') 
                                               @change="selected = 'nine'">
                                        <label for="nine" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'nine' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/nine.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="ten" value="ten" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'ten') 
                                               @change="selected = 'ten'">
                                        <label for="ten" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'ten' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/ten.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="eleven" value="eleven" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'eleven') 
                                               @change="selected = 'eleven'">
                                        <label for="eleven" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'eleven' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/eleven.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="twelve" value="twelve" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'twelve') 
                                               @change="selected = 'twelve'">
                                        <label for="twelve" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'twelve' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/twelve.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                        <input type="radio" name="template" id="thirteen" value="thirteen" class="hidden" 
                                               @checked(isset($product->template) && $product->template === 'thirteen') 
                                               @change="selected = 'thirteen'">
                                        <label for="thirteen" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'thirteen' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                        <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                            <img src="{{asset('/assets/images/template/thirteen.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <button class=" font-bold w-full py-2 bg-[#ff7100] hover:bg-[#b95300] duration-300 text-white rounded-md text-center">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
