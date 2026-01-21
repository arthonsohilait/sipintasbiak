<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Dashboard - Sipintas Biak' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="{{ asset('js/alpine-crud-modal.js') }}"></script>
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50 flex min-h-screen" x-data="{ sidebarOpen: window.innerWidth > 1024 }">
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 bg-slate-900 w-64 flex flex-col transition-all duration-300 transform z-50 shadow-2xl"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64 lg:translate-x-0 lg:w-20 lg:hover:w-64'"
           @click.away="if(window.innerWidth < 1024) sidebarOpen = false">

        <!-- Sidebar Header -->
        <div class="h-16 flex items-center justify-center border-b border-slate-800">
            <div class="flex items-center gap-3 px-4" :class="sidebarOpen ? '' : 'lg:justify-center'">
                 <div class="w-8 h-8 flex-shrink-0 flex items-center justify-center overflow-hidden">
                    @if(isset($site_settings['site_logo']) && $site_settings['site_logo'])
                        <img src="{{ asset('storage/' . $site_settings['site_logo']) }}" class="w-full h-full object-contain">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-komdigi-blue to-komdigi-teal rounded-lg flex items-center justify-center text-white font-bold text-lg">S</div>
                    @endif
                 </div>
                 <span class="text-white font-bold text-lg whitespace-nowrap transition-opacity duration-300"
                       :class="sidebarOpen ? 'opacity-100' : 'lg:opacity-0 lg:hidden group-hover:block'">
                       SIPINTAS
                 </span>
            </div>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            <!-- Dashboard Link -->
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition group {{ request()->routeIs('dashboard') ? 'bg-komdigi-blue text-white' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span :class="sidebarOpen ? '' : 'lg:hidden'" class="whitespace-nowrap">Dashboard</span>
            </a>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider" :class="sidebarOpen ? '' : 'lg:hidden'">Manajemen Konten</p>
            </div>

            <!-- Content Management Links -->
            <a href="{{ route('news.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition group {{ request()->routeIs('news.*') ? 'bg-komdigi-blue text-white' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                <span :class="sidebarOpen ? '' : 'lg:hidden'" class="whitespace-nowrap">Berita & Artikel</span>
            </a>

             <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition group">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span :class="sidebarOpen ? '' : 'lg:hidden'" class="whitespace-nowrap">Data Pegawai</span>
            </a>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider" :class="sidebarOpen ? '' : 'lg:hidden'">Pengaturan Halaman</p>
            </div>

            <a href="{{ route('admin.home.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition group {{ request()->routeIs('admin.home.index') ? 'bg-komdigi-blue text-white' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span :class="sidebarOpen ? '' : 'lg:hidden'" class="whitespace-nowrap">Beranda Front-End</span>
            </a>
             <a href="{{ route('map-projects.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition group {{ request()->routeIs('map-projects.*') ? 'bg-komdigi-blue text-white' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                <span :class="sidebarOpen ? '' : 'lg:hidden'" class="whitespace-nowrap">Pemetaan</span>
            </a>
            <a href="{{ route('sectors.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition group {{ request()->routeIs('sectors.*') ? 'bg-komdigi-blue text-white' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <span :class="sidebarOpen ? '' : 'lg:hidden'" class="whitespace-nowrap">Sektor</span>
            </a>
        </nav>

        <!-- Use Profile Bottom -->
         <div class="border-t border-slate-800 p-4">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-slate-700 flex items-center justify-center text-xs text-white uppercase font-bold">
                    {{ substr(auth()->user()->name, 0, 2) }}
                </div>
                 <div class="flex-1 min-w-0" :class="sidebarOpen ? '' : 'lg:hidden'">
                     <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                     <p class="text-xs text-slate-500 truncate">{{ auth()->user()->email }}</p>
                 </div>
                 <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-slate-400 hover:text-white transition" title="Keluar">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                 </form>
            </div>
         </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col min-w-0 transition-all duration-300" :class="sidebarOpen ? 'lg:pl-64' : 'lg:pl-20'">
        <!-- Top Header -->
        <header class="bg-white border-b border-slate-200 h-16 sticky top-0 z-30 flex items-center justify-between px-6">
            <button @click="sidebarOpen = !sidebarOpen" class="text-slate-500 hover:text-slate-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            <div class="flex items-center gap-4">
                 <button class="relative p-2 text-slate-400 hover:text-slate-600 transition">
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                 </button>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 p-6 md:p-10">
             {{ $slot }}
        </main>
    </div>

</body>

</html>
