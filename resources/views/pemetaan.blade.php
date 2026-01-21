<x-layout>
    <x-slot:title>
        Pemetaan Potensi - Sipintas Biak
    </x-slot>

    <div class="bg-komdigi-blue/5 py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-slate-900">Pemetaan Potensi Daerah</h1>
            <p class="text-slate-600 mt-2">Peta persebaran potensi investasi dan sumber daya alam Kabupaten Biak Numfor.</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12">
        <!-- Leaflet CSS & JS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <div id="map" class="w-full h-[600px] rounded-2xl shadow-lg z-10"></div>

        <!-- Modal -->
        {{-- <div id="projectModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl w-full max-w-lg mx-4 shadow-xl relative">

                <!-- Close Button -->
                <button onclick="closeModal()" class="absolute top-3 right-3 text-slate-400 hover:text-slate-600">
                    ✕
                </button>

                <!-- Image -->
                <img id="modalImage" src="" class="w-full h-56 object-cover rounded-t-2xl">

                <div class="p-6">
                    <span id="modalSector" class="text-xs font-bold uppercase tracking-wider text-komdigi-blue block mb-1"></span>
                    <h3 id="modalName" class="text-xl font-bold text-slate-900 mb-2"></h3>
                    <small id="modalAddress" class="text-sm text-slate-600"></small>
                    <p id="modalDescription" class="text-sm text-black font-medium mt-2"></p>

                </div>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function () {

                var map = L.map('map').setView([-1.1744, 136.0847], 10);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; OpenStreetMap'
                }).addTo(map);

                var projects = @json($projects);

                projects.forEach(function (project) {
                    if (project.latitude && project.longitude) {

                        var marker = L.marker([project.latitude, project.longitude]).addTo(map);

                        marker.on('click', function () {
                            openModal(project);
                        });
                    }
                });
            });

            /* ===== MODAL FUNCTIONS ===== */
            function openModal(project) {
                document.getElementById('projectModal').classList.remove('hidden');
                document.getElementById('projectModal').classList.add('flex');

                document.getElementById('modalImage').src = project.image
                    ? `/storage/${project.image}`
                    : 'https://via.placeholder.com/600x400?text=No+Image';

                document.getElementById('modalName').innerText = project.name;
                document.getElementById('modalAddress').innerText = project.address;
                document.getElementById('modalSector').innerText = project.sector;
                document.getElementById('modalDescription').innerText = project.description;

            }

            function closeModal() {
                document.getElementById('projectModal').classList.add('hidden');
                document.getElementById('projectModal').classList.remove('flex');
            }
            </script> --}}


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize map centered on Biak Numfor (approximate coordinates)
                var map = L.map('map').setView([-1.1744, 136.0847], 10);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // Projects Data from Controller
                var projects = @json($projects);

                projects.forEach(function(project) {
                    if(project.latitude && project.longitude) {
                        var marker = L.marker([project.latitude, project.longitude]).addTo(map);

                        var popupContent = `
                            <div class="p-1 min-w-[200px]">
                                ${project.image ? `<img src="/storage/${project.image}" class="w-full h-32 object-cover rounded-lg mb-2">` : ''}
                                <span class="text-xs font-bold text-komdigi-blue uppercase tracking-wider block mb-1">${project.sector}</span>
                                <h3 class="font-bold text-slate-900 text-sm mb-1">${project.name}</h3>
                                <small class="text-xs text-slate-600 line-clamp-2 ">${project.address}</small>
                                <p class="text-xs text-black line-clamp-2 mt-2 mb-2">${project.description}</p>
                            </div>
                        `;

                        marker.bindPopup(popupContent);
                    }
                });
            });
        </script>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <div class="p-6 border border-slate-100 rounded-xl bg-white shadow-sm hover:shadow-md transition">
                <h3 class="font-bold text-lg mb-2 text-komdigi-blue">Potensi Perikanan</h3>
                <p class="text-sm text-slate-500">Titik lokasi budidaya dan tangkap ikan tuna dan kakap merah.</p>
            </div>
             <div class="p-6 border border-slate-100 rounded-xl bg-white shadow-sm hover:shadow-md transition">
                <h3 class="font-bold text-lg mb-2 text-komdigi-teal">Potensi Pariwisata</h3>
                <p class="text-sm text-slate-500">Destinasi wisata bahari dan sejarah Perang Dunia II.</p>
            </div>
             <div class="p-6 border border-slate-100 rounded-xl bg-white shadow-sm hover:shadow-md transition">
                <h3 class="font-bold text-lg mb-2 text-komdigi-orange">Potensi Pertanian</h3>
                <p class="text-sm text-slate-500">Lahan pengembangan kelapa dalam dan tanaman pangan.</p>
            </div>
        </div>
    </div>
</x-layout>
