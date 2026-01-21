<x-layout>
    <x-slot:title>
        Sektor Unggulan - Sipintas Biak
    </x-slot>

    <div class="bg-gradient-to-r from-komdigi-blue to-blue-600 py-24 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm text-xs font-bold tracking-wider mb-4 border border-white/30">PELUANG INVESTASI</span>
            <h1 class="text-5xl font-bold mb-6 tracking-tight">Sektor Unggulan Investasi</h1>
            <p class="text-blue-100 text-xl max-w-2xl mx-auto leading-relaxed font-light">Jelajahi potensi strategis dan peluang bisnis yang menjanjikan di Kabupaten Biak Numfor.</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-20 -mt-16 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($sectors as $sector)
            <!-- Card: {{ $sector->name }} -->
            <div class="group relative bg-white rounded-[2rem] shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <!-- Image Header Wrapper -->
                <div class="h-56 relative flex items-center justify-center overflow-hidden bg-slate-100">
                    @if($sector->image)
                    <img src="{{ asset('storage/' . $sector->image) }}" alt="{{ $sector->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                    @endif
                    
                    <!-- Decorative Circles (Keep for aesthetic) -->
                    <div class="absolute top-[-20%] left-[-20%] w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all duration-700"></div>
                    
                    <!-- Floating Badge -->
                    <div class="absolute top-4 right-4 z-20">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-bold text-white shadow-lg border border-white/30 flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                            Unggulan
                        </span>
                    </div>

                    <!-- Sector Name Overlay (Optional, but looks premium) -->
                     <h3 class="absolute bottom-4 left-6 text-2xl font-bold text-white z-10 drop-shadow-lg">{{ $sector->name }}</h3>
                </div>

                <!-- Content -->
                <div class="p-8 relative">
                    <div class="w-12 h-1 bg-komdigi-blue rounded-full mb-4"></div>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-4">
                        {{ $sector->description }}
                    </p>
                    
                    <div class="flex items-center gap-4 text-xs text-slate-400 font-medium border-t border-slate-100 pt-4">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            Potensi Tinggi
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center">
                <p class="text-slate-500 italic">Belum ada data sektor yang diinputkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>
