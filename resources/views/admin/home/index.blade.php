<x-dashboard-layout>
    <x-slot:title>Pengaturan Beranda - Sipintas Biak</x-slot>

    <div class="max-w-6xl mx-auto pb-12">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Pengaturan Beranda Front-End</h1>
                <p class="text-slate-500 text-sm mt-1">Kelola konten yang tampil pada halaman utama website Sipintas Biak.</p>
            </div>
            <a href="/" target="_blank" class="px-6 py-2 bg-white border border-slate-200 rounded-xl text-slate-700 font-bold hover:bg-slate-50 transition shadow-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                Lihat Website
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <span class="font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8" x-data="{ isLoading: false }" @submit="isLoading = true">
            @csrf
            @method('PUT')

            <!-- Branding Section -->
            <div class="bg-white rounded-[2.5rem] border border-slate-200 overflow-hidden shadow-sm">
                <div class="p-8 md:p-10 border-b border-slate-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Identitas Website</h2>
                        <p class="text-slate-500 text-sm">Kelola logo dan identitas visual utama portal.</p>
                    </div>
                </div>
                <div class="p-8 md:p-10">
                    <label class="block text-sm font-bold text-slate-700 mb-4">Logo Website</label>
                    <div class="flex flex-col md:flex-row gap-6 items-center">
                        <div class="w-24 h-24 rounded-2xl border border-slate-200 flex items-center justify-center bg-slate-50 overflow-hidden group relative">
                            @if(isset($settings['site_logo']) && $settings['site_logo'])
                                <img src="{{ asset('storage/' . $settings['site_logo']) }}" class="w-full h-full object-contain p-2">
                            @else
                                <div class="w-10 h-10 bg-komdigi-blue text-white rounded-lg flex items-center justify-center font-bold text-xl">S</div>
                            @endif
                        </div>
                        <div class="flex-1 w-full">
                            <input type="file" name="site_logo" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2.5 file:px-6
                                file:rounded-xl file:border-0
                                file:text-sm file:font-bold
                                file:bg-slate-900 file:text-white
                                hover:file:bg-slate-800 transition-colors
                                cursor-pointer
                            ">
                            <p class="text-xs text-slate-400 mt-2">Format: PNG, Transparent (Rekomendasi). Maks. 1MB. Tampil di Navbar dan Favicon.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Loading Overlay -->
            <div x-show="isLoading" class="fixed inset-0 z-[100] bg-white/80 backdrop-blur-sm flex items-center justify-center" style="display: none;">
                <div class="text-center">
                    <div class="relative w-20 h-20 mx-auto mb-4">
                        <div class="absolute inset-0 rounded-full border-4 border-slate-100"></div>
                        <div class="absolute inset-0 rounded-full border-4 border-t-komdigi-blue animate-spin"></div>
                    </div>
                    <p class="text-slate-800 font-bold text-lg">Menyimpan Perubahan...</p>
                </div>
            </div>

            <!-- Hero Section Management -->
            <div class="bg-blue-50/50 rounded-[2.5rem] border border-blue-100 overflow-hidden shadow-sm">
                <div class="p-8 md:p-10 border-b border-blue-100 flex items-center gap-4 bg-white/50">
                    <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Hero Section</h2>
                        <p class="text-slate-500 text-sm">Bagian paling atas yang pertama kali dilihat pengunjung.</p>
                    </div>
                </div>
                <div class="p-8 md:p-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Badge Teks</label>
                        <input type="text" name="hero_badge" value="{{ $settings['hero_badge'] ?? '' }}" class="w-full rounded-xl bg-white border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4 shadow-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Judul Utama (Hero Title)</label>
                        <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" class="w-full rounded-xl bg-white border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4 shadow-sm font-bold text-lg">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Singkat</label>
                        <textarea name="hero_description" rows="3" class="w-full rounded-xl bg-white border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4 shadow-sm leading-relaxed">{{ $settings['hero_description'] ?? '' }}</textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-4">Gambar Header (Hero Image)</label>
                        <div class="flex flex-col md:flex-row gap-6 items-start">
                            @if(isset($settings['hero_image']) && $settings['hero_image'])
                                <div class="w-full md:w-1/3 aspect-video rounded-2xl overflow-hidden border border-slate-200 shadow-sm">
                                    <img src="{{ asset('storage/' . $settings['hero_image']) }}" class="w-full h-full object-cover">
                                </div>
                            @endif
                            <div class="flex-1 w-full">
                                <div class="relative group">
                                    <input type="file" name="hero_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                    <div class="p-6 border-2 border-dashed border-slate-300 rounded-2xl bg-white group-hover:border-komdigi-blue transition-colors text-center">
                                        <svg class="w-8 h-8 mx-auto text-slate-400 mb-2 group-hover:text-komdigi-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <p class="text-sm font-bold text-slate-600">Klik atau seret gambar untuk mengganti</p>
                                        <p class="text-xs text-slate-400 mt-1">PNG, JPG atau WEBP (Maks. 2MB, Rekomendasi 16:9)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Section Management -->
            <div class="bg-emerald-50/50 rounded-[2.5rem] border border-emerald-100 overflow-hidden shadow-sm">
                <div class="p-8 md:p-10 border-b border-emerald-100 flex items-center gap-4 bg-white/50">
                    <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-emerald-500/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Tentang Dinas</h2>
                        <p class="text-slate-500 text-sm">Ringkasan profil yang tampil di bawah Hero.</p>
                    </div>
                </div>
                <div class="p-8 md:p-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Badge Teks</label>
                        <input type="text" name="about_badge" value="{{ $settings['about_badge'] ?? '' }}" class="w-full rounded-xl bg-white border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Judul Sekunder</label>
                        <input type="text" name="about_title" value="{{ $settings['about_title'] ?? '' }}" class="w-full rounded-xl bg-white border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4 shadow-sm font-bold">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Isi Deskripsi Tentang Kami</label>
                        <textarea name="about_description" rows="4" class="w-full rounded-xl bg-white border-slate-300 focus:ring-4 focus:ring-komdigi-blue/10 focus:border-komdigi-blue transition-all py-3 px-4 shadow-sm leading-relaxed">{{ $settings['about_description'] ?? '' }}</textarea>
                    </div>
                    <div class="md:col-span-2 grid grid-cols-2 gap-6">
                        <div class="p-6 bg-white rounded-3xl border border-emerald-100">
                             <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Statistik 1</label>
                             <div class="space-y-4">
                                <div>
                                    <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block mb-1">Label</label>
                                    <input type="text" name="stat_1_label" value="{{ $settings['stat_1_label'] ?? '' }}" class="w-full text-sm rounded-lg border-slate-200">
                                </div>
                                <div>
                                    <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block mb-1">Nilai</label>
                                    <input type="text" name="stat_1_value" value="{{ $settings['stat_1_value'] ?? '' }}" class="w-full text-lg font-black text-emerald-600 rounded-lg border-slate-200">
                                </div>
                             </div>
                        </div>
                        <div class="p-6 bg-white rounded-3xl border border-emerald-100">
                             <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Statistik 2</label>
                             <div class="space-y-4">
                                <div>
                                    <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block mb-1">Label</label>
                                    <input type="text" name="stat_2_label" value="{{ $settings['stat_2_label'] ?? '' }}" class="w-full text-sm rounded-lg border-slate-200">
                                </div>
                                <div>
                                    <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block mb-1">Nilai</label>
                                    <input type="text" name="stat_2_value" value="{{ $settings['stat_2_value'] ?? '' }}" class="w-full text-lg font-black text-emerald-600 rounded-lg border-slate-200">
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kawasan Section Management -->
            <div class="bg-slate-900 rounded-[2.5rem] border border-slate-800 overflow-hidden shadow-xl">
                <div class="p-8 md:p-10 border-b border-slate-800 flex items-center gap-4 bg-white/5">
                    <div class="w-12 h-12 bg-slate-700 rounded-2xl flex items-center justify-center text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Review Kawasan Strategis</h2>
                        <p class="text-slate-400 text-sm">Bagian bertema gelap tentang KEK atau Kawasan Industri.</p>
                    </div>
                </div>
                <div class="p-8 md:p-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                     <div>
                        <label class="block text-sm font-bold text-slate-400 mb-2">Badge Teks</label>
                        <input type="text" name="kawasan_badge" value="{{ $settings['kawasan_badge'] ?? '' }}" class="w-full rounded-xl bg-slate-800 border-slate-700 text-white focus:ring-4 focus:ring-komdigi-teal/20 focus:border-komdigi-teal transition-all py-3 px-4 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-400 mb-2">Judul Kawasan</label>
                        <input type="text" name="kawasan_title" value="{{ $settings['kawasan_title'] ?? '' }}" class="w-full rounded-xl bg-slate-800 border-slate-700 text-white focus:ring-4 focus:ring-komdigi-teal/20 focus:border-komdigi-teal transition-all py-3 px-4 shadow-sm font-bold">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-400 mb-2">Deskripsi Kawasan</label>
                        <textarea name="kawasan_description" rows="3" class="w-full rounded-xl bg-slate-800 border-slate-700 text-slate-300 focus:ring-4 focus:ring-komdigi-teal/20 focus:border-komdigi-teal transition-all py-3 px-4 shadow-sm leading-relaxed">{{ $settings['kawasan_description'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-rose-50/50 rounded-[2.5rem] border border-rose-100 overflow-hidden shadow-sm">
                <div class="p-8 md:p-10 border-b border-rose-100 flex items-center gap-4 bg-white/50">
                    <div class="w-12 h-12 bg-rose-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-rose-500/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Call to Action (CTA)</h2>
                        <p class="text-slate-500 text-sm">Bagian ajakan pendaftaran di bagian bawah halaman.</p>
                    </div>
                </div>
                <div class="p-8 md:p-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Judul Ajakan</label>
                        <input type="text" name="cta_title" value="{{ $settings['cta_title'] ?? '' }}" class="w-full rounded-xl bg-white border-slate-300 focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500 transition-all py-3 px-4 shadow-sm font-black">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Ajakan</label>
                        <textarea name="cta_description" rows="3" class="w-full rounded-xl bg-white border-slate-300 focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500 transition-all py-3 px-4 shadow-sm leading-relaxed">{{ $settings['cta_description'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="p-8 md:p-12 bg-white rounded-[2.5rem] border border-slate-200 shadow-xl flex items-center justify-between sticky bottom-6 z-40">
                <div class="hidden md:block">
                    <p class="text-slate-900 font-bold">Simpan Pengaturan?</p>
                    <p class="text-slate-500 text-xs">Seluruh perubahan akan langsung tampil di halaman depan.</p>
                </div>
                <div class="flex gap-4 w-full md:w-auto">
                    <button type="reset" class="flex-1 md:flex-none px-8 py-4 bg-slate-100 rounded-2xl text-slate-600 font-bold hover:bg-slate-200 transition">Atur Ulang</button>
                    <button type="submit" class="flex-1 md:flex-none px-12 py-4 bg-komdigi-blue text-white rounded-2xl font-black hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</x-dashboard-layout>
