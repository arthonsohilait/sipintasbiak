<x-layout>
    <x-slot:title>
        {{ $news->title }} - Sipintas Biak
    </x-slot>

    <!-- Post Header -->
    <header class="pt-32 pb-16 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-slate-50 opacity-50"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-6 flex items-center justify-center gap-4">
                    <span class="bg-blue-100 text-komdigi-blue px-3 py-1 rounded-full text-sm font-bold uppercase tracking-wider">{{ $news->category }}</span>
                    <span class="text-slate-500 text-sm flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $news->created_at->translatedFormat('l, d F Y') }}
                    </span>
                </div>
                <h1 class="text-3xl md:text-5xl font-bold text-slate-900 leading-tight mb-8">{{ $news->title }}</h1>
            </div>

        </div>
    </header>

    <!-- Post Content with Sidebar -->
    <article class="py-16 bg-white min-h-screen">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    @if($news->image)
                    <div class="rounded-2xl overflow-hidden shadow-lg mb-8">
                         <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-auto object-cover">
                    </div>
                    @endif

                    <div class="prose prose-lg prose-slate prose-blue max-w-none">
                        {!! nl2br(e($news->content)) !!}
                    </div>

                    <!-- Share & Interaction -->
                    <div class="mt-12 pt-8 border-t border-slate-100 flex justify-between items-center">
                        <div>
                            <span class="text-slate-500 text-sm font-medium">Bagikan artikel ini:</span>
                            <div class="flex gap-2 mt-2">
                                 <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-komdigi-blue hover:text-white transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                                 <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-komdigi-blue hover:text-white transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg></a>
                            </div>
                        </div>
                         <a href="/" class="inline-flex items-center gap-2 text-komdigi-blue font-bold hover:underline">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Kembali ke Beranda
                         </a>
                    </div>
                </div>

                <!-- Sidebar (Right) -->
                <aside class="lg:w-1/3">
                    <div class="sticky top-24 space-y-8">
                        
                        <!-- Related News Widget -->
                        <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                            <h3 class="font-bold text-slate-900 mb-6 text-lg border-b border-slate-200 pb-2">Berita Lainnya</h3>
                            <div class="space-y-6">
                                @forelse($relatedNews as $related)
                                <a href="{{ url('/berita/' . $related->slug) }}" class="flex gap-4 group">
                                    <div class="w-20 h-20 flex-shrink-0 bg-slate-200 rounded-lg overflow-hidden">
                                        @if($related->image)
                                        <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition">
                                        @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="text-xs text-komdigi-blue font-semibold uppercase">{{ $related->category }}</span>
                                        <h4 class="text-sm font-bold text-slate-800 leading-snug group-hover:text-komdigi-blue transition line-clamp-2 mt-1">{{ $related->title }}</h4>
                                        <span class="text-xs text-slate-400 mt-1 block">{{ $related->created_at->format('d M Y') }}</span>
                                    </div>
                                </a>
                                @empty
                                <p class="text-slate-500 text-sm">Belum ada berita lainnya.</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Kategori Widget (Optional) -->
                        <div class="bg-white rounded-xl p-6 border border-slate-100 shadow-sm">
                            <h3 class="font-bold text-slate-900 mb-4 text-lg">Kategori</h3>
                            <ul class="space-y-2">
                                <li><a href="#" class="block px-4 py-2 rounded-lg hover:bg-slate-50 text-slate-600 hover:text-komdigi-blue transition">Berita Dinas</a></li>
                                <li><a href="#" class="block px-4 py-2 rounded-lg hover:bg-slate-50 text-slate-600 hover:text-komdigi-blue transition">Layanan Publik</a></li>
                                <li><a href="#" class="block px-4 py-2 rounded-lg hover:bg-slate-50 text-slate-600 hover:text-komdigi-blue transition">Investasi & Potensi</a></li>
                                <li><a href="#" class="block px-4 py-2 rounded-lg hover:bg-slate-50 text-slate-600 hover:text-komdigi-blue transition">Pengumuman</a></li>
                            </ul>
                        </div>

                    </div>
                </aside>

            </div>
        </div>
    </article>
</x-layout>
