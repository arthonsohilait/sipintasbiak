<x-dashboard-layout>
    <div class="pb-12 animate-fadeIn">
        <!-- Header Greeting -->
        <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Halo, {{ auth()->user()->name }}! 👋</h1>
                <p class="text-slate-500 mt-2 text-lg font-medium tracking-tight">Selamat bekerja. Berikut adalah ringkasan performa portal Sipintas Biak hari ini.</p>
            </div>
            <div class="flex items-center gap-3 bg-white px-5 py-3 rounded-2xl shadow-sm border border-slate-100">
                <div class="w-10 h-10 bg-emerald-50 rounded-full flex items-center justify-center text-emerald-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Waktu Sekarang</p>
                    <p class="text-sm font-bold text-slate-700">{{ now()->translatedFormat('d F Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Stat Card: News -->
            <div class="relative group">
                <div class="absolute inset-0 bg-blue-600 rounded-[2rem] blur-xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                <div class="relative bg-white border border-slate-100 p-8 rounded-[2rem] shadow-sm hover:shadow-xl hover:border-blue-100 transition-all duration-300">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        </div>
                        <span class="text-sm font-bold text-blue-500 bg-blue-50 px-3 py-1 rounded-full">+ {{ $stats['news_count'] }} Berita</span>
                    </div>
                    <div>
                        <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">Total Publikasi</p>
                        <h3 class="text-4xl font-black text-slate-900 mt-1">{{ $stats['news_count'] }}</h3>
                        <p class="text-slate-500 text-sm mt-3 flex items-center gap-1 font-medium">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            Informasi Publik Aktif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Stat Card: Mapping -->
            <div class="relative group">
                <div class="absolute inset-0 bg-emerald-600 rounded-[2rem] blur-xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                <div class="relative bg-white border border-slate-100 p-8 rounded-[2rem] shadow-sm hover:shadow-xl hover:border-emerald-100 transition-all duration-300">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="text-sm font-bold text-emerald-500 bg-emerald-50 px-3 py-1 rounded-full">{{ $stats['map_count'] }} Titik</span>
                    </div>
                    <div>
                        <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">Potensi Wilayah</p>
                        <h3 class="text-4xl font-black text-slate-900 mt-1">{{ $stats['map_count'] }}</h3>
                        <p class="text-slate-500 text-sm mt-3 flex items-center gap-1 font-medium">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            Lokasi Terpetakan
                        </p>
                    </div>
                </div>
            </div>

            <!-- Stat Card: Sectors -->
            <div class="relative group">
                <div class="absolute inset-0 bg-orange-600 rounded-[2rem] blur-xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                <div class="relative bg-white border border-slate-100 p-8 rounded-[2rem] shadow-sm hover:shadow-xl hover:border-orange-100 transition-all duration-300">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <span class="text-sm font-bold text-orange-500 bg-orange-50 px-3 py-1 rounded-full">{{ $stats['sector_count'] }} Kelas</span>
                    </div>
                    <div>
                        <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">Sektor Unggulan</p>
                        <h3 class="text-4xl font-black text-slate-900 mt-1">{{ $stats['sector_count'] }}</h3>
                        <p class="text-slate-500 text-sm mt-3 flex items-center gap-1 font-medium">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            Kategori Investasi
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Info -->
        <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-100">
                <h3 class="text-xl font-black text-slate-900 mb-6 flex items-center gap-3">
                    <span class="w-2 h-8 bg-blue-600 rounded-full"></span>
                    Aksi Cepat Manajemen
                </h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('news.create') }}" class="flex flex-col items-center gap-4 p-6 rounded-3xl bg-slate-50 hover:bg-blue-50 hover:text-blue-600 transition group border border-transparent hover:border-blue-100">
                        <div class="p-3 bg-white rounded-2xl shadow-sm group-hover:shadow-md transition-shadow">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <span class="font-bold text-sm">Berita Baru</span>
                    </a>
                    <a href="{{ route('map-projects.create') }}" class="flex flex-col items-center gap-4 p-6 rounded-3xl bg-slate-50 hover:bg-emerald-50 hover:text-emerald-600 transition group border border-transparent hover:border-emerald-100">
                        <div class="p-3 bg-white rounded-2xl shadow-sm group-hover:shadow-md transition-shadow">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        </div>
                        <span class="font-bold text-sm">Titik Baru</span>
                    </a>
                </div>
            </div>

            <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-[2.5rem] p-10 text-white relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 -mr-20 -mt-20 rounded-full blur-3xl transition-transform group-hover:scale-125 duration-700"></div>
                <div class="relative">
                    <h3 class="text-xl font-black mb-4">Informasi Sistem</h3>
                    <p class="text-slate-400 mb-8 leading-relaxed">Versi Portal Sipintas Biak v1.0.0. Seluruh data yang Anda ubah akan langsung tersinkronisasi dengan portal public.</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/10">
                            <span class="text-sm font-medium">Status Konektifitas</span>
                            <span class="flex items-center gap-2 text-emerald-400 text-xs font-bold uppercase tracking-widest">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                Online
                            </span>
                        </div>
                    </div>
                    
                    <button class="mt-8 w-full py-4 bg-white text-slate-900 rounded-2xl font-black text-sm hover:bg-slate-100 transition shadow-lg">
                        Buka Panduan Admin
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
