<x-dashboard-layout>
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Manajemen Sektor</h1>
            <p class="text-slate-500 text-sm mt-1">Kelola daftar sektor unggulan investasi di Biak Numfor.</p>
        </div>
        <a href="{{ route('sectors.create') }}" class="inline-flex items-center gap-2 bg-komdigi-blue text-white px-5 py-2.5 rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/20 font-semibold group">
            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Sektor
        </a>
    </div>

    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl relative mb-6 flex items-center gap-3 animate-fade-in" role="alert">
        <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        <span class="block sm:inline font-medium">{{ session('success') }}</span>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($sectors as $sector)
        <div class="group bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300 transform hover:-translate-y-1">
            <div class="h-48 relative overflow-hidden bg-slate-100">
                @if($sector->image)
                <img src="{{ asset('storage/' . $sector->image) }}" alt="{{ $sector->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                @else
                <div class="w-full h-full flex items-center justify-center text-slate-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                
                <div class="absolute top-4 right-4 flex gap-2 translate-y-[-50px] group-hover:translate-y-0 transition-transform duration-300">
                    <a href="{{ route('sectors.edit', $sector->id) }}" class="p-2 bg-white/90 backdrop-blur rounded-lg text-indigo-600 hover:bg-indigo-600 hover:text-white transition shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </a>
                    <form action="{{ route('sectors.destroy', $sector->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 bg-white/90 backdrop-blur rounded-lg text-rose-600 hover:bg-rose-600 hover:text-white transition shadow-lg" onclick="return confirm('Hapus sektor ini?')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="p-6">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-2 h-6 bg-komdigi-blue rounded-full"></div>
                    <h3 class="text-xl font-bold text-slate-800">{{ $sector->name }}</h3>
                </div>
                <p class="text-slate-500 text-sm leading-relaxed line-clamp-3">
                    {{ $sector->description }}
                </p>
                
                <div class="mt-6 pt-6 border-t border-slate-50 flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Sektor Unggulan</span>
                    <a href="{{ route('sectors.edit', $sector->id) }}" class="text-komdigi-blue text-sm font-bold hover:underline flex items-center gap-1">
                        Edit Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 bg-white rounded-[2rem] border border-slate-100 border-dashed text-center">
            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center text-slate-300 mx-auto mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <p class="text-slate-500 font-medium">Belum ada data sektor yang diinputkan.</p>
            <a href="{{ route('sectors.create') }}" class="mt-4 inline-block text-komdigi-blue font-bold hover:underline">Tambah Sektor Sekarang &rarr;</a>
        </div>
        @endforelse
    </div>
</x-dashboard-layout>
