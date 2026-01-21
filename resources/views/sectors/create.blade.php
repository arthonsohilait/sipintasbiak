<x-dashboard-layout>
    <div class="max-w-4xl mx-auto pb-12">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Tambah Sektor Baru</h1>
                <p class="text-slate-500 text-sm mt-1">Definisikan sektor unggulan investasi baru untuk wilayah Biak Numfor.</p>
            </div>
            <a href="{{ route('sectors.index') }}" class="text-slate-500 hover:text-slate-800 font-medium flex items-center gap-2 group transition-colors">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="bg-blue-50/50 rounded-[2rem] shadow-xl shadow-slate-200/50 border border-blue-100 overflow-hidden relative" x-data="{ isLoading: false }">
            
            <!-- Loading Overlay -->
            <div x-show="isLoading" class="absolute inset-0 z-50 bg-white/80 backdrop-blur-sm flex items-center justify-center rounded-xl" style="display: none;">
                <div class="text-center">
                    <div class="relative w-20 h-20 mx-auto mb-4">
                        <div class="absolute inset-0 rounded-full border-4 border-slate-100 italic"></div>
                        <div class="absolute inset-0 rounded-full border-4 border-t-komdigi-blue animate-spin"></div>
                    </div>
                    <p class="text-slate-800 font-bold">Menyimpan Sektor...</p>
                </div>
            </div>

            <form action="{{ route('sectors.store') }}" method="POST" enctype="multipart/form-data" class="divide-y divide-blue-100" @submit="isLoading = true">
                @csrf
                
                <div class="p-8 md:p-10 space-y-8">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Sektor <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3.5 px-4" placeholder="Contoh: Pariwisata Bahari" required>
                        @error('name') <p class="text-rose-500 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Gambar Sampul Sektor <span class="text-rose-500">*</span></label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-2xl group hover:border-komdigi-blue transition-colors bg-slate-50/50">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-400 group-hover:text-komdigi-blue transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-slate-600">
                                    <label for="image-upload" class="relative cursor-pointer bg-transparent rounded-md font-bold text-komdigi-blue hover:text-blue-700">
                                        <span>Klik untuk unggah gambar</span>
                                        <input id="image-upload" name="image" type="file" class="sr-only" required>
                                    </label>
                                </div>
                                <p class="text-xs text-slate-500">PNG, JPG hingga 2MB</p>
                            </div>
                        </div>
                        @error('image') <p class="text-rose-500 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Uraian / Deskripsi Sektor <span class="text-rose-500">*</span></label>
                        <textarea name="description" rows="6" class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3.5 px-4" placeholder="Jelaskan potensi dan keunggulan sektor ini..." required>{{ old('description') }}</textarea>
                        @error('description') <p class="text-rose-500 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="p-8 bg-slate-50 flex items-center justify-between">
                    <p class="text-slate-500 text-sm italic font-medium">Pastikan informasi sektor sudah akurat sebelum disimpan.</p>
                    <div class="flex gap-4">
                        <a href="{{ route('sectors.index') }}" class="px-8 py-3 bg-white border border-slate-200 rounded-xl text-slate-700 font-bold hover:bg-slate-50 transition shadow-sm">Batal</a>
                        <button type="submit" class="px-10 py-3 bg-komdigi-blue text-white rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/30 font-bold">Simpan Sektor</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
