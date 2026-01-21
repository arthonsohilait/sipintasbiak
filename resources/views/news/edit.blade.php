<x-dashboard-layout>
    <div class="max-w-5xl mx-auto pb-12">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Edit Berita</h1>
                <p class="text-slate-500 text-sm mt-1">Perbarui konten atau pengaturan publikasi berita.</p>
            </div>
            <a href="{{ route('news.index') }}" class="text-slate-500 hover:text-slate-800 font-medium flex items-center gap-2 group transition-colors">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
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
                    <p class="text-slate-800 font-bold text-lg">Menyimpan Perubahan...</p>
                </div>
            </div>

            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="divide-y divide-blue-100" @submit="isLoading = true">
                @csrf
                @method('PUT')
                
                <div class="p-8 md:p-12 space-y-8">
                    <!-- Basic Information Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Konten Utama</h3>
                            <p class="text-slate-500 text-sm mt-1 leading-relaxed">Uraikan isi berita yang ingin diubah.</p>
                        </div>
                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Judul Artikel <span class="text-rose-500">*</span></label>
                                <input type="text" name="title" value="{{ old('title', $news->title) }}" class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4" required>
                                @error('title') <p class="text-rose-500 text-xs mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Isi Konten Berita <span class="text-rose-500">*</span></label>
                                <textarea name="content" rows="12" class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4" required>{{ old('content', $news->content) }}</textarea>
                                @error('content') <p class="text-rose-500 text-xs mt-2">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100">

                    <!-- Settings Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pt-4">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Media & Klasifikasi</h3>
                            <p class="text-slate-500 text-sm mt-1 leading-relaxed">Atur ulang media dan visibilitas berita.</p>
                        </div>
                        <div class="lg:col-span-2 space-y-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Kategori Berita</label>
                                    <select name="category" class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4">
                                        <option value="Berita" {{ old('category', $news->category) == 'Berita' ? 'selected' : '' }}>Berita Utama</option>
                                        <option value="Layanan" {{ old('category', $news->category) == 'Layanan' ? 'selected' : '' }}>Informasi Layanan</option>
                                        <option value="Investasi" {{ old('category', $news->category) == 'Investasi' ? 'selected' : '' }}>Info Investasi</option>
                                        <option value="Umum" {{ old('category', $news->category) == 'Umum' ? 'selected' : '' }}>Pengumuman Umum</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Status Publikasi</label>
                                    <select name="is_published" class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4">
                                        <option value="1" {{ old('is_published', $news->is_published) == '1' ? 'selected' : '' }}>Terbitkan</option>
                                        <option value="0" {{ old('is_published', $news->is_published) == '0' ? 'selected' : '' }}>Draft (Sembunyikan)</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Gambar Saat Ini</label>
                                @if($news->image)
                                    <div class="mb-4">
                                        <img src="{{ asset('storage/' . $news->image) }}" class="h-40 w-auto rounded-2xl object-cover shadow-md border border-slate-100">
                                    </div>
                                @endif
                                <label class="block text-sm font-bold text-slate-700 mb-2">Ganti Gambar (Opsional)</label>
                                <input type="file" name="image" class="w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-komdigi-blue hover:file:bg-blue-100 transition shadow-sm">
                                <p class="text-xs text-slate-500 mt-2 italic">Abaikan jika tidak ingin mengganti gambar.</p>
                                @error('image') <p class="text-rose-500 text-xs mt-2">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8 md:p-12 bg-slate-50 flex items-center justify-between">
                    <p class="text-slate-500 text-sm italic font-medium">Klik simpan untuk menerapkan perubahan secara instan.</p>
                    <div class="flex gap-4">
                        <a href="{{ route('news.index') }}" class="px-8 py-3 bg-white border border-slate-200 rounded-xl text-slate-700 font-bold hover:bg-slate-50 transition shadow-sm">Batal</a>
                        <button type="submit" class="px-10 py-3 bg-komdigi-blue text-white rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/30 font-bold">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
