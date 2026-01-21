<x-dashboard-layout>
    <div class="max-w-6xl mx-auto pb-12">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Detail Lokasi Strategis</h1>
                <p class="text-slate-500 mt-1 font-medium italic">ID Lokasi: #{{ str_pad($mapProject->id, 4, '0', STR_PAD_LEFT) }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('map-projects.index') }}" class="px-5 py-2.5 bg-white border border-slate-200 text-slate-700 rounded-xl hover:bg-slate-50 transition font-bold shadow-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Daftar Lokasi
                </a>
                <a href="{{ route('map-projects.edit', $mapProject->id) }}" class="px-5 py-2.5 bg-komdigi-blue text-white rounded-xl hover:bg-blue-700 transition font-bold shadow-lg shadow-blue-500/20 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Data
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content Column -->
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                    <!-- Hero Image Area -->
                    <div class="h-80 w-full relative group">
                        @if($mapProject->image)
                        <img src="{{ asset('storage/' . $mapProject->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                            <svg class="w-20 h-20 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        @endif
                        <div class="absolute top-6 left-6">
                            <span class="inline-flex items-center gap-1.5 bg-white/90 backdrop-blur-md text-komdigi-blue text-xs font-black px-4 py-2 rounded-full uppercase tracking-widest shadow-lg border border-white/20">
                                <span class="w-2 h-2 rounded-full bg-komdigi-blue"></span>
                                {{ $mapProject->sector }}
                            </span>
                        </div>
                    </div>

                    <div class="p-10 md:p-12">
                        <h2 class="text-4xl font-black text-slate-900 mb-4 tracking-tight leading-[1.1]">{{ $mapProject->name }}</h2>
                        <div class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-100 mb-10">
                            <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-komdigi-teal flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            </div>
                            <p class="text-slate-600 font-bold leading-relaxed">{{ $mapProject->address }}</p>
                        </div>

                        <div class="space-y-12">
                            <div>
                                <h3 class="flex items-center gap-3 text-lg font-black text-slate-900 mb-4">
                                    <span class="w-1.5 h-6 bg-komdigi-blue rounded-full"></span>
                                    Uraian Proyek & Potensi
                                </h3>
                                <div class="prose prose-slate max-w-none text-slate-600 leading-loose text-lg font-medium">
                                    {!! nl2br(e($mapProject->description)) !!}
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                @if($mapProject->condition)
                                <div class="bg-blue-50/50 p-8 rounded-[2rem] border border-blue-50">
                                    <h4 class="text-blue-900 font-black text-sm uppercase tracking-widest mb-3">Kondisi Terkini</h4>
                                    <p class="text-blue-800 leading-relaxed font-bold">{{ $mapProject->condition }}</p>
                                </div>
                                @endif

                                @if($mapProject->investment_opportunity)
                                <div class="bg-emerald-50/50 p-8 rounded-[2rem] border border-emerald-50">
                                    <h4 class="text-emerald-900 font-black text-sm uppercase tracking-widest mb-3">Peluang Investasi</h4>
                                    <p class="text-emerald-800 leading-relaxed font-bold">{{ $mapProject->investment_opportunity }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="space-y-8">
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100 sticky top-8">
                    <h3 class="text-sm font-black text-slate-400 uppercase tracking-[0.2em] mb-6">Lokasi Geografis</h3>
                    
                    <!-- Leaflet Mini Map -->
                    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
                    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
                    
                    <div id="mini-map" class="w-full h-64 rounded-3xl bg-slate-100 mb-6 z-0 border border-slate-100 shadow-inner"></div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                             <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Latitude</p>
                                <p class="font-mono font-bold text-slate-800">{{ $mapProject->latitude }}</p>
                             </div>
                             <div class="p-2 bg-white rounded-lg text-komdigi-blue">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                             </div>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                             <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Longitude</p>
                                <p class="font-mono font-bold text-slate-800">{{ $mapProject->longitude }}</p>
                             </div>
                             <div class="p-2 bg-white rounded-lg text-komdigi-blue">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                             </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t border-slate-100">
                         <p class="text-xs text-slate-400 font-medium leading-relaxed">Terakhir kali diperbarui:<br>
                         <span class="text-slate-600 font-bold">{{ $mapProject->updated_at->translatedFormat('d F Y, H:i') }} WIB</span></p>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var lat = {{ $mapProject->latitude }};
                            var lng = {{ $mapProject->longitude }};
                            
                            var map = L.map('mini-map', {
                                center: [lat, lng],
                                zoom: 14,
                                zoomControl: false,
                                dragging: true,
                                scrollWheelZoom: false
                            });

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: ''
                            }).addTo(map);

                            // Custom Icon for better look
                            var icon = L.divIcon({
                                className: 'custom-div-icon',
                                html: "<div style='background-color:#003366; width:12px; height:12px; border:3px solid white; border-radius:50%; box-shadow:0 0 10px rgba(0,0,0,0.3)'></div>",
                                iconSize: [12, 12],
                                iconAnchor: [6, 6]
                            });

                            L.marker([lat, lng], {icon: icon}).addTo(map);
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
