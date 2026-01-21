<x-layout>
    <x-slot:title>
        Beranda - Sipintas Biak
    </x-slot>

    <!-- Hero Section -->
    <section class="relative bg-white overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-50 to-white z-0"></div>
        <!-- Decorative blobs -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-komdigi-blue/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[500px] h-[500px] bg-komdigi-teal/5 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-4 py-20 md:py-32 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="w-full md:w-1/2 space-y-8">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-komdigi-blue/10 text-komdigi-blue rounded-full text-sm font-semibold border border-komdigi-blue/20">
                        <span class="w-2 h-2 rounded-full bg-komdigi-blue animate-pulse"></span>
                        {{ $settings['hero_badge'] ?? 'Portal Pelayanan Terpadu Satu Pintu' }}
                    </div>
                    <h1 class="text-4xl md:text-6xl font-bold text-slate-900 leading-tight">
                        {{ $settings['hero_title'] ?? 'Pemetaan Potensi di Biak Numfor' }}
                    </h1>
                    <p class="text-lg text-slate-600 leading-relaxed max-w-xl">
                        {{ $settings['hero_description'] ?? 'Sistem Informasi Pelayanan Perizinan Terpadu Antar Satuan Kerja (SIPINTAS) Kabupaten Biak Numfor.' }}
                    </p>
                    
                </div>
                
                <div class="w-full md:w-1/2 relative">
                    <div class="relative z-10 bg-white p-2 rounded-3xl shadow-2xl">
                         <div class="w-full h-[400px] bg-gradient-to-br from-slate-100 to-slate-200 rounded-2xl flex items-center justify-center overflow-hidden relative">
                            @if(isset($settings['hero_image']) && $settings['hero_image'])
                                <img src="{{ asset('storage/' . $settings['hero_image']) }}" class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1080&q=80')] bg-cover bg-center opacity-90"></div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                    </div>
                    <!-- Background Elements -->
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-komdigi-orange/20 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-komdigi-blue/20 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profil Singkat -->
    <section class="py-16 bg-white border-b border-slate-100">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-12 items-center">
                <div class="w-full md:w-1/2">
                    <span class="text-komdigi-teal font-bold tracking-wider text-sm uppercase mb-2 block">{{ $settings['about_badge'] ?? 'Tentang Kami' }}</span>
                     <h2 class="text-3xl font-bold text-slate-900 mb-6">{{ $settings['about_title'] ?? 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu' }}</h2>
                     <p class="text-slate-600 leading-relaxed mb-6">
                        {{ $settings['about_description'] ?? '-' }}
                     </p>
                     <a href="/profile" class="text-komdigi-blue font-bold hover:underline inline-flex items-center gap-2">
                        Lihat Profil Lengkap 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                     </a>
                </div>
                <div class="w-full md:w-1/2 grid grid-cols-2 gap-4">
                    <div class="bg-komdigi-blue/5 p-6 rounded-2xl">
                        <h4 class="text-4xl font-bold text-komdigi-blue mb-2">{{ $settings['stat_1_value'] ?? '98%' }}</h4>
                        <p class="text-sm text-slate-600">{{ $settings['stat_1_label'] ?? 'Indeks Kepuasan Masyarakat' }}</p>
                    </div>
                    <div class="bg-komdigi-teal/5 p-6 rounded-2xl">
                        <h4 class="text-4xl font-bold text-komdigi-teal mb-2">{{ $settings['stat_2_value'] ?? '50+' }}</h4>
                        <p class="text-sm text-slate-600">{{ $settings['stat_2_label'] ?? 'Jenis Layanan Perizinan' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pemetaan Potensi Preview -->
    <section class="py-20 bg-slate-50 relative overflow-hidden">
         <div class="absolute inset-0 bg-slate-100/50"></div>
         <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-900">Peta Potensi Daerah</h2>
                <p class="text-slate-600 mt-2">Sebaran lokasi strategis untuk investasi dan pengembangan.</p>
            </div>
            
            <div class="bg-white p-2 rounded-3xl shadow-xl">
                 <div class="bg-slate-200 w-full h-[400px] rounded-2xl flex items-center justify-center relative overflow-hidden group">
                    <div class="absolute inset-0 bg-[url('https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Biak_Numfor_Regency_in_Papua_Province.png/1200px-Biak_Numfor_Regency_in_Papua_Province.png')] bg-cover bg-center grayscale group-hover:grayscale-0 transition-all duration-700 opacity-50 group-hover:opacity-100"></div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
                        <span class="bg-white/90 backdrop-blur px-6 py-3 rounded-full text-slate-800 font-bold shadow-lg mb-4">Peta Interaktif</span>
                        <a href="/pemetaan" class="bg-komdigi-blue text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition shadow-lg transform hover:scale-105">Buka Peta Lengkap</a>
                    </div>
                </div>
            </div>
         </div>
    </section>

    <!-- Sektor Unggulan Preview -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-end mb-12">
                <div>
                     <span class="text-komdigi-orange font-bold tracking-wider text-sm uppercase mb-2 block">Peluang Investasi</span>
                    <h2 class="text-3xl font-bold text-slate-900">Sektor Unggulan</h2>
                </div>
                <a href="/sektor" class="hidden md:inline-flex items-center gap-2 text-slate-500 hover:text-komdigi-blue transition font-medium">
                    Lihat Semua Sektor <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Card 1: Pariwisata -->
                <a href="/sektor" class="group bg-slate-50 rounded-2xl p-6 hover:bg-white hover:shadow-xl transition border border-slate-100 hover:border-komdigi-teal/20 text-center">
                    <div class="w-16 h-16 mx-auto bg-teal-100 text-teal-600 rounded-full flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition-transform">🏝️</div>
                    <h3 class="font-bold text-lg text-slate-800 group-hover:text-komdigi-teal transition">Pariwisata</h3>
                </a>
                <!-- Card 2: Perikanan -->
                <a href="/sektor" class="group bg-slate-50 rounded-2xl p-6 hover:bg-white hover:shadow-xl transition border border-slate-100 hover:border-komdigi-blue/20 text-center">
                    <div class="w-16 h-16 mx-auto bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition-transform">🐟</div>
                    <h3 class="font-bold text-lg text-slate-800 group-hover:text-komdigi-blue transition">Perikanan</h3>
                </a>
                <!-- Card 3: Pertanian -->
                <a href="/sektor" class="group bg-slate-50 rounded-2xl p-6 hover:bg-white hover:shadow-xl transition border border-slate-100 hover:border-komdigi-orange/20 text-center">
                    <div class="w-16 h-16 mx-auto bg-orange-100 text-orange-600 rounded-full flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition-transform">🌱</div>
                    <h3 class="font-bold text-lg text-slate-800 group-hover:text-komdigi-orange transition">Pertanian</h3>
                </a>
                <!-- Card 4: Peternakan -->
                <a href="/sektor" class="group bg-slate-50 rounded-2xl p-6 hover:bg-white hover:shadow-xl transition border border-slate-100 hover:border-green-500/20 text-center">
                    <div class="w-16 h-16 mx-auto bg-green-100 text-green-600 rounded-full flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition-transform">🐄</div>
                    <h3 class="font-bold text-lg text-slate-800 group-hover:text-green-600 transition">Peternakan</h3>
                </a>
            </div>
        </div>
    </section>

    <!-- Kawasan Preview -->
    <section class="py-20 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center opacity-10"></div>
        <div class="container mx-auto px-4 relative z-10 flex flex-col md:flex-row items-center gap-12">
            <div class="w-full md:w-1/2">
                <span class="text-komdigi-teal font-bold tracking-wider text-sm uppercase mb-2 block">{{ $settings['kawasan_badge'] ?? 'Kawasan Strategis' }}</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">{{ $settings['kawasan_title'] ?? 'Kawasan Ekonomi Khusus (KEK) Biak' }}</h2>
                <p class="text-slate-400 text-lg mb-8 leading-relaxed">
                    {{ $settings['kawasan_description'] ?? '-' }}
                </p>
                <a href="/kawasan" class="bg-komdigi-teal text-white px-8 py-3 rounded-xl font-bold hover:bg-teal-600 transition inline-block">Pelajari Kawasan</a>
            </div>
             <div class="w-full md:w-1/2">
                <div class="grid grid-cols-2 gap-4">
                     <div class="bg-white/5 backdrop-blur border border-white/10 p-6 rounded-2xl">
                        <div class="text-3xl font-bold text-komdigi-blue mb-1">{{ $settings['kawasan_stat_1_value'] ?? '400 Ha' }}</div>
                        <div class="text-sm text-slate-400">{{ $settings['kawasan_stat_1_label'] ?? 'Total Luas Lahan' }}</div>
                     </div>
                     <div class="bg-white/5 backdrop-blur border border-white/10 p-6 rounded-2xl">
                        <div class="text-3xl font-bold text-komdigi-teal mb-1">{{ $settings['kawasan_stat_2_value'] ?? 'Rp 5T' }}</div>
                        <div class="text-sm text-slate-400">{{ $settings['kawasan_stat_2_label'] ?? 'Potensi Investasi' }}</div>
                     </div>
                </div>
             </div>
        </div>
    </section>



    <!-- News & Updates -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div>
                    <span class="text-komdigi-teal font-semibold tracking-wide uppercase text-sm">Informasi Terkini</span>
                    <h2 class="text-3xl font-bold text-slate-900 mt-2">Berita & Pengumuman</h2>
                </div>
                <a href="#" class="text-komdigi-blue font-semibold hover:text-blue-700 flex items-center gap-2 group">
                    Lihat Semua Berita 
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestNews as $item)
                <!-- Article {{ $loop->iteration }} -->
                <article class="flex flex-col group h-full">
                    <div class="rounded-2xl overflow-hidden aspect-video bg-slate-200 mb-4 relative">
                        @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                        <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        @endif
                        <div class="absolute top-4 left-4 bg-komdigi-blue text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">{{ $item->category }}</div>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-slate-500 mb-3">
                        <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ $item->created_at->format('d M Y') }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 leading-snug group-hover:text-komdigi-blue transition line-clamp-2">{{ $item->title }}</h3>
                    <p class="text-slate-600 text-sm line-clamp-3 mb-4 flex-1">{{ Str::limit(strip_tags($item->content), 100) }}</p>
                    <a href="{{ url('/berita/' . $item->slug) }}" class="text-komdigi-teal font-semibold text-sm hover:underline mt-auto inline-flex items-center gap-1">
                        Baca Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-br from-komdigi-blue-dark to-[#1e293b] text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-komdigi-blue/20 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-komdigi-teal/10 rounded-full blur-3xl -ml-20 -mb-20"></div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-6">{{ $settings['cta_title'] ?? 'Siap Mengurus Perizinan Anda?' }}</h2>
            <p class="text-slate-300 text-lg mb-10 max-w-2xl mx-auto">{{ $settings['cta_description'] ?? 'Daftarkan usaha Anda sekarang juga melalui sistem online kami yang terintegrasi.' }}</p>
            <!-- <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="px-8 py-4 bg-komdigi-teal text-white rounded-xl font-bold hover:bg-teal-600 transition shadow-lg hover:shadow-teal-500/30">Daftar Sekarang</a>
                <a href="#" class="px-8 py-4 bg-white/10 backdrop-blur-md text-white border border-white/20 rounded-xl font-bold hover:bg-white/20 transition">Panduan Lengkap</a>
            </div> -->
        </div>
    </section>
</x-layout>
