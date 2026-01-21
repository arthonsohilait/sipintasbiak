<x-dashboard-layout>
    <div
        x-data="crudModal({
            id: null,
            name: '',
            sector: '',
            address: '',
            description: '',
            condition: '',
            investment_opportunity: '',
            latitude: '',
            longitude: '',
        })"
    >
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Manajemen Pemetaan</h1>
                <p class="text-slate-500 text-sm mt-1">Kelola data potensi lokasi dan proyek strategis di Biak Numfor.</p>
            </div>

            <button
                @click="openCreate"
                class="inline-flex items-center gap-2 bg-komdigi-blue text-white px-5 py-2.5 rounded-xl hover:bg-blue-700 transition shadow-lg font-semibold"
            >
                Tambah Data
            </button>

            {{-- <a href="{{ route('map-projects.create') }}" class="inline-flex items-center gap-2 bg-komdigi-blue text-white px-5 py-2.5 rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/20 font-semibold group">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Data
            </a> --}}
        </div>

        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl relative mb-6 flex items-center gap-3 animate-fade-in" role="alert">
            <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <span class="block sm:inline font-medium">{{ session('success') }}</span>
        </div>
        @endif

        <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Informasi Lokasi</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Sektor</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Koordinat</th>
                            <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-widest">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-50">
                        @forelse($projects as $item)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="relative h-14 w-20 flex-shrink-0 group-hover:scale-105 transition-transform duration-300">
                                        @if($item->image)
                                        <img class="h-full w-full rounded-xl object-cover shadow-sm bg-slate-100 border border-slate-200" src="{{ asset('storage/' . $item->image) }}" alt="">
                                        @else
                                        <div class="h-full w-full rounded-xl bg-slate-100 flex items-center justify-center text-slate-400 border border-slate-200">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-slate-900 group-hover:text-komdigi-blue transition-colors">{{ Str::limit($item->name, 40) }}</div>
                                        <div class="flex items-center gap-1 text-xs text-slate-500 mt-1">
                                            <svg class="w-3 h-3 text-komdigi-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                            {{ Str::limit($item->address, 30) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-komdigi-blue"></span>
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-blue-50 text-komdigi-blue border border-blue-100">
                                        {{ $item->sector }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-xs text-slate-500 font-mono bg-slate-50 px-2 py-1 rounded inline-block">
                                    {{ number_format($item->latitude, 5) }}, {{ number_format($item->longitude, 5) }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-1">
                                    <a href="{{ route('map-projects.show', $item->id) }}" class="p-2 text-komdigi-teal hover:bg-teal-50 rounded-lg transition" title="Preview Lokasi">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    <button
                                    @click="openEdit(@js($item))"
                                        class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition"
                                        title="Edit Data"
                                    >
                                        ✎
                                    </button>
                                    {{-- <a href="{{ route('map-projects.edit', $item->id) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition" title="Edit Data">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a> --}}
                                    <form action="{{ route('map-projects.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-300 mb-4">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                    </div>
                                    <p class="text-slate-500 font-medium">Belum ada data pemetaan wilayah.</p>
                                    <a href="{{ route('map-projects.create') }}" class="mt-4 text-komdigi-blue font-bold hover:underline">Mulai input data &rarr;</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- CREATE & EDIT MODAL -->
                <div
                    x-show="showModal"
                    x-transition
                    class="fixed inset-0 z-50 bg-black/50 overflow-y-auto px-4 py-8"
                    style="display: none"
                >
                <div class="bg-white rounded-2xl w-full max-w-2xl mx-auto shadow-xl
                max-h-[90vh] overflow-y-auto">

                    <!-- Header -->
                    <div class="px-6 py-4 border-b flex justify-between items-center">
                        <h3 class="font-bold text-lg"
                            x-text="mode === 'create' ? 'Tambah Data Pemetaan' : 'Edit Data Pemetaan'">
                        </h3>
                        <button @click="closeModal" class="text-slate-400 hover:text-slate-600">✕</button>
                    </div>

                    <!-- FORM -->
                    <form
                    :action="mode === 'create'
                        ? '{{ route('map-projects.store') }}'
                        : `/map-projects/${form.id}`"
                    method="POST"
                    enctype="multipart/form-data"
                    class="p-6 space-y-4"
                >
                    @csrf

                    <!-- PUT hanya saat edit -->
                    <template x-if="mode === 'edit'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <!-- NAME -->
                    <div>
                        <label class="font-bold text-sm">Nama Proyek <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" x-model="form.name"
                            class="w-full rounded-xl border px-4 py-3" required>
                    </div>

                    <!-- SECTOR -->
                    <div>
                        <label class="font-bold text-sm">Sektor <span class="text-rose-500">*</span></label>
                        <select name="sector" x-model="form.sector" required
                            class="w-full rounded-xl border px-4 py-3">
                            <option value="">-- Pilih Sektor --</option>
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->name }}">{{ $sector->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- ADDRESS -->
                    <div>
                        <label class="font-bold text-sm">Alamat <span class="text-rose-500">*</span></label>
                        <textarea name="address" x-model="form.address"
                            class="w-full rounded-xl border px-4 py-3" required></textarea>
                    </div>

                    <!-- DESCRIPTION -->
                    <div>
                        <label class="font-bold text-sm">Deskripsi <span class="text-rose-500">*</span></label>
                        <textarea name="description" x-model="form.description"
                            class="w-full rounded-xl border px-4 py-3" required></textarea>
                    </div>

                    <!-- CONDITION -->
                    <div>
                        <label class="font-bold text-sm">Kondisi</label>
                        <textarea name="condition" x-model="form.condition"
                            class="w-full rounded-xl border px-4 py-3"></textarea>
                    </div>

                    <!-- INVESTMENT -->
                    <div>
                        <label class="font-bold text-sm">Peluang Investasi</label>
                        <textarea name="investment_opportunity"
                            x-model="form.investment_opportunity"
                            class="w-full rounded-xl border px-4 py-3"></textarea>
                    </div>

                    <!-- COORDINATE -->
                    <label class="font-bold text-sm">Koordinat <span class="text-rose-500">*</span></label>
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="latitude" x-model="form.latitude"
                            placeholder="Latitude" required
                            class="rounded-xl border px-4 py-3">
                        <input type="text" name="longitude" x-model="form.longitude"
                            placeholder="Longitude" required
                            class="rounded-xl border px-4 py-3">
                    </div>

                    <!-- IMAGE -->
                    <input type="file" name="image" accept="image/*">

                    <!-- ACTION -->
                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" @click="closeModal"
                            class="px-6 py-2 border rounded-xl">Batal</button>

                        <button type="submit"
                            class="px-8 py-2 bg-komdigi-blue text-white rounded-xl font-bold">
                            <span x-text="mode === 'create' ? 'Simpan' : 'Update'"></span>
                        </button>
                    </div>
                </form>

                </div>
                </div>


            </div>
        </div>
    </div>


</x-dashboard-layout>
