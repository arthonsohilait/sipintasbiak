<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Sipintas Biak - DPMPTSP Biak Numfor' }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon -->
    @if(isset($site_settings['site_logo']) && $site_settings['site_logo'])
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $site_settings['site_logo']) }}">
    @else
        <link rel="icon" type="image/png" href="https://ui-avatars.com/api/?name=S&color=FFFFFF&background=2563eb&bold=true">
    @endif
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50 flex flex-col min-h-screen">

    <!-- Top Bar -->
    <div class="bg-komdigi-blue-dark text-white text-xs py-2">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex gap-4">
                <span>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
                <span class="hidden md:inline">DPMPTSP Kabupaten Biak Numfor</span>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-slate-200 shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 group">
                    <!-- Dynamic Logo -->
                    <div class="w-10 h-10 flex-shrink-0 flex items-center justify-center overflow-hidden">
                        @if(isset($site_settings['site_logo']) && $site_settings['site_logo'])
                            <img src="{{ asset('storage/' . $site_settings['site_logo']) }}" alt="Logo" class="w-full h-full object-contain">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-komdigi-blue to-komdigi-teal rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-md group-hover:shadow-lg transition">S</div>
                        @endif
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-slate-800 leading-none group-hover:text-komdigi-blue transition-colors uppercase tracking-tight">SIPINTAS BIAK</span>
                        <span class="text-[10px] text-slate-500 tracking-widest font-bold mt-0.5">DPMPTSP KAB. BIAK NUMFOR</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="/" class="font-medium {{ request()->is('/') ? 'text-komdigi-blue border-b-2 border-komdigi-blue' : 'text-slate-600 hover:text-komdigi-blue' }} py-2 transition-all">Beranda</a>
                    <a href="/profile" class="font-medium {{ request()->is('profile*') ? 'text-komdigi-blue border-b-2 border-komdigi-blue' : 'text-slate-600 hover:text-komdigi-blue' }} py-2 transition-all">Profil</a>
                    <a href="/pemetaan" class="font-medium {{ request()->is('pemetaan*') ? 'text-komdigi-blue border-b-2 border-komdigi-blue' : 'text-slate-600 hover:text-komdigi-blue' }} py-2 transition-all">Pemetaan</a>
                    <a href="/sektor" class="font-medium {{ request()->is('sektor*') ? 'text-komdigi-blue border-b-2 border-komdigi-blue' : 'text-slate-600 hover:text-komdigi-blue' }} py-2 transition-all">Sektor</a>
                    <a href="/kawasan" class="font-medium {{ request()->is('kawasan*') ? 'text-komdigi-blue border-b-2 border-komdigi-blue' : 'text-slate-600 hover:text-komdigi-blue' }} py-2 transition-all">Kawasan</a>
                    @auth
                        <div class="flex items-center gap-3">
                            <a href="{{ route('dashboard') }}" class="px-6 py-2.5 bg-komdigi-teal text-white rounded-full hover:bg-teal-700 transition font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                Dashboard
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="px-6 py-2.5 bg-rose-500 text-white rounded-full hover:bg-rose-600 transition font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="/masuk" class="px-6 py-2.5 bg-komdigi-blue text-white rounded-full hover:bg-blue-700 transition font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            Masuk
                        </a>
                    @endauth
                </nav>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-slate-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 border-t border-slate-800 mt-auto">
        <div class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                         <div class="w-10 h-10 bg-gradient-to-br from-komdigi-blue to-komdigi-teal rounded-lg flex items-center justify-center text-white font-bold text-xl">S</div>
                        <span class="text-xl font-bold text-white">SIPINTAS BIAK</span>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-400">
                        Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kabupaten Biak Numfor.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-komdigi-blue transition text-white">FB</a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-komdigi-blue transition text-white">IG</a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-komdigi-blue transition text-white">TW</a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-komdigi-blue transition text-white">YT</a>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-6">Tautan Cepat</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="/" class="hover:text-komdigi-teal transition">Beranda</a></li>
                        <li><a href="/profile" class="hover:text-komdigi-teal transition">Profil Dinas</a></li>
                        <li><a href="/pemetaan" class="hover:text-komdigi-teal transition">Pemetaan Potensi</a></li>
                        <li><a href="/sektor" class="hover:text-komdigi-teal transition">Sektor Unggulan</a></li>
                        <li><a href="/kawasan" class="hover:text-komdigi-teal transition">Kawasan Industri</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-6">Layanan</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-komdigi-teal transition">Izin Usaha (OSS)</a></li>
                        <li><a href="#" class="hover:text-komdigi-teal transition">Izin Mendirikan Bangunan</a></li>
                        <li><a href="#" class="hover:text-komdigi-teal transition">Izin Lingkungan</a></li>
                        <li><a href="#" class="hover:text-komdigi-teal transition">Izin Trayek</a></li>
                        <li><a href="#" class="hover:text-komdigi-teal transition">Izin Reklame</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-6">Kontak Kami</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-komdigi-teal flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Jl. Majapahit No. 1, Biak Kota, Kabupaten Biak Numfor, Papua</span>
                        </li>
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-komdigi-teal flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>(0981) 123456</span>
                        </li>
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-komdigi-teal flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>dpmptsp@biaknumforge.go.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-500">
                <p>&copy; 2026 Sipintas Biak - DPMPTSP Kabupaten Biak Numfor. Hak Cipta Dilindungi.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-slate-300">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-slate-300">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
