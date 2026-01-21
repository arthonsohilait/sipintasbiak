<x-dashboard-layout>
    <div class="max-w-5xl mx-auto pb-12">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Tambah Data Pemetaan</h1>
                <p class="text-slate-500 text-sm mt-1">Input lokasi potensi atau proyek strategis baru ke dalam peta.</p>
            </div>
            <a href="{{ route('map-projects.index') }}" class="text-slate-500 hover:text-slate-800 font-medium flex items-center gap-2 group transition-colors">
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
                    <p class="text-slate-800 font-bold">Menyimpan Data...</p>
                </div>
            </div>

            <form action="{{ route('map-projects.store') }}" method="POST" enctype="multipart/form-data" class="divide-y divide-blue-100" @submit="isLoading = true">
                @csrf
                
                <div class="p-8 md:p-12 space-y-12">
                    <!-- General Information -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Informasi Dasar</h3>
                            <p class="text-slate-500 text-sm mt-1 leading-relaxed">Nama proyek dan klasifikasi sektor investasi.</p>
                        </div>
                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Proyek / Potensi <span class="text-rose-500">*</span></label>
                                <input type="text" name="name" placeholder="Contoh: Kawasan Industri Perikanan..." class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4" required>
                                @error('name') <p class="text-rose-500 text-xs mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Sektor Terkait <span class="text-rose-500">*</span></label>
                                <select name="sector" class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4" required>
                                    <option value="">-- Pilih Sektor --</option>
                                    @foreach($sectors as $sector)
                                        <option value="{{ $sector->name }}">{{ $sector->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100">

                    <!-- Location Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Lokasi & Koordinat</h3>
                            <p class="text-slate-500 text-sm mt-1 leading-relaxed">Detail alamat dan titik koordinat geografis untuk peta.</p>
                        </div>
                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Lengkap <span class="text-rose-500">*</span></label>
                                <textarea name="address" rows="2" placeholder="Contoh: Jl. Raya Frans Kaisiepo, Biak Kota..." class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4" required></textarea>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Latitude <span class="text-rose-500">*</span></label>
                                    <input type="text" name="latitude" placeholder="-1.17..." class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4 font-mono" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Longitude <span class="text-rose-500">*</span></label>
                                    <input type="text" name="longitude" placeholder="136.08..." class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4 font-mono" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100">

                    <!-- Content & Media Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Detail & Media</h3>
                            <p class="text-slate-500 text-sm mt-1 leading-relaxed">Uraian kondisi, peluang, dan dokumentasi visual.</p>
                        </div>
                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Uraian Proyek</label>
                                <textarea name="description" rows="4" placeholder="Jelaskan detail proyek atau potensi wilayah ini..." class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4" required></textarea>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Kondisi Saat Ini</label>
                                    <textarea name="condition" rows="3" placeholder="Contoh: Lahan sudah dibebaskan..." class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4"></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Peluang Investasi</label>
                                    <textarea name="investment_opportunity" rows="3" placeholder="Contoh: Pembangunan cold storage..." class="w-full rounded-xl bg-blue-50/30 border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4"></textarea>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Gambar Dokumentasi</label>
                                <input type="file" name="image" class="w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-komdigi-blue hover:file:bg-blue-100 transition shadow-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8 md:p-12 bg-slate-50 flex items-center justify-between">
                    <p class="text-slate-500 text-sm italic font-medium">Beri tanda <span class="text-rose-500">*</span> pada kolom yang wajib diisi.</p>
                    <div class="flex gap-4">
                        <a href="{{ route('map-projects.index') }}" class="px-8 py-3 bg-white border border-slate-200 rounded-xl text-slate-700 font-bold hover:bg-slate-50 transition shadow-sm">Batal</a>
                        <button type="submit" class="px-10 py-3 bg-komdigi-blue text-white rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/30 font-bold">Simpan Lokasi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
