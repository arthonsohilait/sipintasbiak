<x-dashboard-layout>
    <div class="max-w-5xl mx-auto pb-12">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Tambah Berita Baru</h1>
                <p class="text-slate-500 text-sm mt-1">Buat artikel informasi publik baru untuk dipublikasikan.</p>
            </div>
            <a href="{{ route('news.index') }}" class="text-slate-500 hover:text-slate-800 font-medium flex items-center gap-2 group transition-colors">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
        </div>

        <div class="bg-blue-50/50 rounded-[2rem] shadow-xl shadow-slate-200/50 border border-blue-100 overflow-hidden relative" x-data="{ isLoading: false }">
            
            <!-- Loading Overlay -->
            <div x-show="isLoading" class="absolute inset-0 z-50 bg-white/80 backdrop-blur-sm flex items-center justify-center" style="display: none;">
                <div class="text-center">
                    <div class="relative w-24 h-24 mx-auto mb-4">
                        <div class="absolute inset-0 rounded-full border-4 border-slate-100 italic"></div>
                        <div class="absolute inset-0 rounded-full border-4 border-t-komdigi-blue animate-spin"></div>
                    </div>
                    <p class="text-slate-800 font-bold text-lg">Memproses Berita...</p>
                    <p class="text-slate-500 text-sm mt-1">Sedang mengunggah konten dan gambar.</p>
                </div>
            </div>

            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="divide-y divide-blue-100" @submit="isLoading = true">
                @csrf
                
                <div class="p-8 md:p-12 space-y-8">
                    <!-- Basic Information Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Konten Utama</h3>
                            <p class="text-slate-500 text-sm mt-1 leading-relaxed">Masukkan judul dan isi berita secara lengkap dan jelas.</p>
                        </div>
                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Judul Artikel <span class="text-rose-500">*</span></label>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Kunjungan Kerja Kepala Dinas ke Distrik Biak Kota..." class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4" required>
                                @error('title') <p class="text-rose-500 text-xs mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Isi Konten Berita <span class="text-rose-500">*</span></label>
                                <textarea name="content" rows="12" placeholder="Tuliskan berita anda di sini..." class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4" required>{{ old('content') }}</textarea>
                                @error('content') <p class="text-rose-500 text-xs mt-2">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100">

                    <!-- Settings Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pt-4">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Media & Klasifikasi</h3>
                            <p class="text-slate-500 text-sm mt-1 leading-relaxed">Atur kategori, gambar unggul, dan status visibilitas artikel.</p>
                        </div>
                        <div class="lg:col-span-2 space-y-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Kategori Berita</label>
                                    <select name="category" class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4">
                                        <option value="Berita" {{ old('category') == 'Berita' ? 'selected' : '' }}>Berita Utama</option>
                                        <option value="Layanan" {{ old('category') == 'Layanan' ? 'selected' : '' }}>Informasi Layanan</option>
                                        <option value="Investasi" {{ old('category') == 'Investasi' ? 'selected' : '' }}>Info Investasi</option>
                                        <option value="Umum" {{ old('category') == 'Umum' ? 'selected' : '' }}>Pengumuman Umum</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Status Publikasi</label>
                                    <select name="is_published" class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4">
                                        <option value="1" {{ old('is_published', '1') == '1' ? 'selected' : '' }}>Segera Terbitkan</option>
                                        <option value="0" {{ old('is_published') == '0' ? 'selected' : '' }}>Draft (Sembunyikan)</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Gambar Sampul Berita</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-2xl group hover:border-komdigi-blue transition-colors">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-slate-400 group-hover:text-komdigi-blue transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-slate-600">
                                            <label for="image-upload" class="relative cursor-pointer bg-white rounded-md font-bold text-komdigi-blue hover:text-blue-700">
                                                <span>Klik untuk unggah</span>
                                                <input id="image-upload" name="image" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">atau tarik gambar ke sini</p>
                                        </div>
                                        <p class="text-xs text-slate-500">PNG, JPG, GIF hingga 2MB</p>
                                    </div>
                                </div>
                                @error('image') <p class="text-rose-500 text-xs mt-2">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8 md:p-12 bg-slate-50 flex items-center justify-between">
                    <p class="text-slate-500 text-sm italic font-medium">Pastikan semua kolom bertanda <span class="text-rose-500">*</span> terisi dengan benar.</p>
                    <div class="flex gap-4">
                        <a href="{{ route('news.index') }}" class="px-8 py-3 bg-white border border-slate-200 rounded-xl text-slate-700 font-bold hover:bg-slate-50 transition shadow-sm">Batal</a>
                        <button type="submit" class="px-10 py-3 bg-komdigi-blue text-white rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/30 font-bold">Simpan Berita</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
