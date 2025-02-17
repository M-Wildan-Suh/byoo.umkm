<div x-data="highlightManager({{ json_encode($product->productHighlight) }}, '{{ Auth::user()->role }}')" class="w-full grid lg:grid-cols-2 gap-4">
    <template x-for="item in highlights" :key="item.id">
        <div class="w-full rounded-xl flex justify-between gap-4" x-data="highlightEditForm(item)">

            <!-- Form Update -->
            <form @submit.prevent="submitForm" class="flex-grow" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="rounded-xl flex flex-col sm:flex-row items-center justify-between gap-4 bg-white">
                    <!-- Upload Image -->
                    <div class=" w-24 min-w-24 h-24 aspect-square rounded-md border-2 overflow-hidden">
                        <div class="w-full h-full flex flex-col text-sm font-medium gap-2 justify-center items-center">
                            <div class="w-full h-full relative flex justify-center overflow-hidden">
                                <img :src="previewImage" class="object-cover w-full" alt="Logo">
                                <div class="w-full h-full absolute z-10 top-0 opacity-0 hover:opacity-100 duration-300">
                                    <label :for="'highlightimage' + item.id + '-input'" class="relative">
                                        <div
                                            class="w-full h-full bg-black opacity-60 flex justify-center items-center text-neutral-400">
                                            <div class="w-7 aspect-square">
                                                <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z"
                                                        fill="currentColor" fill-rule="evenodd" class="fill-000000">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <input accept="image/*" type="file" @change="previewFile"
                                            class="absolute bottom-0 left-0 z-0 w-40 opacity-0"
                                            :id="'highlightimage' + item.id + '-input'">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" w-full sm:h-24 flex gap-2">
                        <!-- Input Fields -->
                        <div class=" w-full sm:w-auto flex flex-col flex-grow justify-between gap-2">
                            <input type="text" x-model="form.title"
                                class=" text-sm sm:text-base min-w-0 p-0 w-full border-t-0 border-l-0 border-r-0 ring-0 focus:ring-0"
                                placeholder="Nama Product" maxlength="27">
                            <textarea x-model="form.description"
                                class="min-w-0 w-full p-0 border-t-0 border-l-0 border-r-0 ring-0 focus:ring-0 text-xs sm:text-sm" placeholder="Deskripsi"
                                maxlength="64"></textarea>
                        </div>
                        <!-- Tombol Aksi -->
                        <div class="min-w-[50px] grid grid-cols-1 grid-rows-2 gap-1">
                            <button @click="submitForm" :disabled="loading"
                                class="min-w-[50px] bg-[#ff7100] hover:bg-[#b95300] duration-300 text-white rounded-md text-center text-sm">
                                <span x-show="!loading">Edit</span>
                                <span x-show="loading">...</span>
                            </button>

                            <button @click="$dispatch('delete-highlight', item.id)"
                                class="min-w-[50px] h-full bg-red-500 hover:bg-red-700 duration-300 text-white rounded-md text-center text-sm">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </template>

    <template x-if="canAddHighlight">
        <form x-data="highlightCreateForm()" @submit.prevent="submitForm">
            @csrf

            <div class="w-full max-w-full rounded-xl flex flex-col sm:flex-row items-center justify-between gap-4 bg-white">
                <!-- Image Upload -->
                <div class=" w-24 min-w-24 h-24 aspect-square rounded-md overflow-hidden relative">
                    <img :src="previewImage || '{{ asset('assets/images/placeholder.webp') }}'"
                        class="object-cover w-full h-full" alt="Preview Image">
                    <div class="w-full h-full absolute top-0 opacity-0 hover:opacity-100 duration-300">
                        <label for="highlightimage-input" class="relative">
                            <div
                                class="w-full h-full bg-black opacity-60 flex justify-center items-center text-neutral-400">
                                <div class="w-7 aspect-square">
                                    <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z"
                                            fill="currentColor" fill-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <input type="file" accept="image/*" @change="previewFile" id="highlightimage-input"
                                class="absolute bottom-0 left-0 w-40 opacity-0">
                        </label>
                    </div>
                </div>
    
                <div class=" w-full sm:h-2/4 flex gap-2">
                    <!-- Input Fields -->
                    <div class="flex flex-col flex-grow justify-between gap-2">
                        <input type="text" x-model="form.title"
                            class="min-w-0 p-0 w-full border-t-0 border-l-0 border-r-0 ring-0 focus:ring-0 text-sm sm:text-base"
                            placeholder="Nama Product" maxlength="27" required>
                        <textarea x-model="form.description"
                            class="min-w-0 w-full p-0 border-t-0 border-l-0 border-r-0 ring-0 focus:ring-0 text-xs sm:text-sm" placeholder="Deskripsi"
                            maxlength="64" required></textarea>
                    </div>
        
                    <!-- Submit Button -->
                    <button type="submit" class=" min-w-[50px] bg-[#ff7100] text-white rounded-md py-2 text-sm font-semibold"
                        :disabled="loading">
                        <span x-show="!loading">Save</span>
                        <span x-show="loading">...</span>
                    </button>
                </div>
            </div>

        </form>
    </template>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('highlightManager', (initialData, userRole) => ({
                highlights: Array.isArray(initialData) ? initialData : [],
                userRole: userRole,
                get canAddHighlight() {
                    return ['admin', 'premium'].includes(this.userRole) || this.highlights.length <
                        3;
                },
                init() {
                    this.$root.addEventListener('delete-highlight', (event) => {
                        this.deleteHighlight(event.detail);
                    });

                    document.addEventListener('new-highlight', (event) => {
                        console.log("Event new-highlight diterima:", event.detail);
                        console.log("Data sebelum update:", this.highlights);

                        if (event.detail && event.detail.id) {
                            this.highlights.push(event.detail);
                            console.log("Data setelah update:", this.highlights);
                        } else {
                            console.error("Data highlight baru tidak valid!", event.detail);
                        }
                    });
                },

                deleteHighlight(id) {
                    fetch(`{{ route('highlight.destroy', '') }}/${id}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]')
                                    .value,
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify({
                                _method: 'DELETE'
                            })
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Gagal menghapus item');
                            this.highlights = this.highlights.filter(item => item.id !== id);
                        })
                        .catch(error => alert(error.message));
                }
            }));
            Alpine.data('highlightEditForm', (item) => ({
                previewImage: item.image ?
                    `{{ asset('storage/images/product/highlight/') }}/${item.image}` :
                    `{{ asset('assets/images/placeholder.webp') }}`,
                loading: false,
                form: {
                    title: item.title,
                    description: item.description,
                    highlightimage: null
                },
                previewFile(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.form.highlightimage = file;
                        this.previewImage = URL.createObjectURL(file);
                    }
                },
                async submitForm() {
                    this.loading = true;
                    const formData = new FormData();
                    formData.append('_token', document.querySelector('input[name="_token"]').value);
                    formData.append('_method', 'PUT');
                    formData.append('title', this.form.title);
                    formData.append('description', this.form.description);
                    if (this.form.highlightimage) {
                        formData.append('highlightimage', this.form.highlightimage);
                    }
                    try {
                        const response = await fetch(
                            `{{ route('highlight.update', '') }}/${item.id}`, {
                                method: "POST",
                                body: formData
                            });
                        if (!response.ok) throw new Error("Gagal memperbarui data");
                    } catch (error) {
                        console.log("Terjadi kesalahan: " + error.message);
                    } finally {
                        this.loading = false;
                    }
                }
            }));
            Alpine.data('highlightCreateForm', () => ({
                form: {
                    product_id: "{{ $product->id }}",
                    title: '',
                    description: '',
                    highlightimage: null
                },
                previewImage: null,
                loading: false,

                // Fungsi untuk menangani preview gambar
                previewFile(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.form.highlightimage = file;
                        this.previewImage = URL.createObjectURL(file);
                    }
                },

                // Fungsi untuk submit form menggunakan fetch
                async submitForm() {
                    this.loading = true;
                    const formData = new FormData();
                    formData.append('_token', document.querySelector('input[name="_token"]').value);
                    formData.append('product_id', this.form.product_id);
                    formData.append('title', this.form.title);
                    formData.append('description', this.form.description);
                    if (this.form.highlightimage) {
                        formData.append('highlightimage', this.form.highlightimage);
                    }

                    try {
                        const response = await fetch("{{ route('highlight.store') }}", {
                            method: "POST",
                            body: formData
                        });

                        if (!response.ok) throw new Error("Gagal menyimpan data");

                        const result = await response.json();

                        // Debug apakah data valid sebelum mengirim event

                        console.log("Mengirim event new-highlight:", result);

                        document.dispatchEvent(new CustomEvent('new-highlight', {
                            detail: result
                        }));

                        // Reset form
                        this.form.title = '';
                        this.form.description = '';
                        this.form.highlightimage = null;
                        this.previewImage = '';
                        document.getElementById('highlightimage-input').value = null;

                    } catch (error) {
                        console.log("Terjadi kesalahan: " + error.message);
                    } finally {
                        this.loading = false;
                    }
                }


            }));

        });
    </script>
</div>
