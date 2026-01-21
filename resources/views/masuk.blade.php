<x-layout>
    <x-slot:title>
        Masuk - Sipintas Biak
    </x-slot>

    <!-- Full Screen Split Layout -->
    <div class="min-h-[calc(100vh-80px)] flex relative">
        
        <!-- Left Side: Image & Welcome (Hidden on mobile) -->
        <div class="hidden lg:flex w-1/2 relative bg-slate-900 overflow-hidden">
            <!-- Background Image with Zoom Animation -->
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1596395818606-97b77c7460bd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center opacity-60 animate-slow-zoom"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-komdigi-blue-dark/90 to-transparent"></div>
            
            <div class="relative z-10 m-auto px-12 text-center text-white">
                <div class="mb-6 inline-flex p-4 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 shadow-2xl">
                    <div class="w-16 h-16 bg-gradient-to-br from-komdigi-blue to-komdigi-teal rounded-xl flex items-center justify-center text-3xl font-bold shadow-lg">S</div>
                </div>
                <h1 class="text-4xl font-bold mb-4 leading-tight">Selamat Datang di <br>SIPINTAS BIAK</h1>
                <p class="text-blue-100 text-lg max-w-md mx-auto leading-relaxed">Sistem Informasi Pelayanan Perizinan Terpadu Antar Satuan Kerja Kabupaten Biak Numfor.</p>
                
                <div class="mt-12 grid grid-cols-3 gap-6 text-center">
                    <div>
                        <div class="font-bold text-2xl text-komdigi-teal">Fast</div>
                        <div class="text-xs text-slate-300 uppercase tracking-wider mt-1">Cepat</div>
                    </div>
                    <div>
                        <div class="font-bold text-2xl text-komdigi-teal">Easy</div>
                        <div class="text-xs text-slate-300 uppercase tracking-wider mt-1">Mudah</div>
                    </div>
                    <div>
                        <div class="font-bold text-2xl text-komdigi-teal">Trust</div>
                        <div class="text-xs text-slate-300 uppercase tracking-wider mt-1">Transparan</div>
                    </div>
                </div>
            </div>

            <!-- Wave Decoration at bottom -->
            <svg class="absolute bottom-0 left-0 w-full text-white" viewBox="0 0 1440 320" fill="currentColor" preserveAspectRatio="none">
                <path fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-1/2 bg-white flex items-center justify-center p-8 relative" x-data="{ isLoading: false }">
            <!-- Loading Overlay -->
            <div x-show="isLoading" 
                 x-transition.opacity
                 class="fixed lg:absolute inset-0 z-[100] bg-white/80 backdrop-blur-sm flex items-center justify-center" 
                 style="display: none;"
                 :class="isLoading ? 'pointer-events-auto' : 'pointer-events-none'">
                <div class="text-center">
                    <div class="relative w-20 h-20 mx-auto mb-4">
                        <div class="absolute inset-0 rounded-full border-4 border-slate-100"></div>
                        <div class="absolute inset-0 rounded-full border-4 border-t-komdigi-blue animate-spin"></div>
                    </div>
                    <p class="text-slate-800 font-bold text-lg">Memverifikasi Akun...</p>
                    <p class="text-slate-500 text-sm mt-1">Mohon tunggu sebentar.</p>
                </div>
            </div>

            <div class="max-w-md w-full bg-white relative z-10">
                <div class="mb-10 text-center lg:text-left">
                    <h2 class="text-3xl font-extrabold text-slate-900">Masuk Akun</h2>
                    <p class="mt-2 text-slate-500">Silakan masuk untuk mengakses layanan perizinan.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST" class="space-y-6" @submit="isLoading = true">
                    @csrf
                    <!-- Email Input with Floating Label -->
                    <div class="relative group">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                            class="peer block w-full px-4 py-4 text-slate-900 bg-transparent bg-blue-50/30 border-2 border-slate-300 rounded-xl appearance-none focus:outline-none focus:ring-0 focus:border-komdigi-blue peer-focus:border-komdigi-blue transition-colors" 
                            placeholder=" " />
                        <label for="email" 
                            class="absolute text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-komdigi-blue peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">
                            Alamat Email
                        </label>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-komdigi-blue transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                    </div>

                    <!-- Password Input with Toggle -->
                    <div class="relative group" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" id="password" name="password" required 
                            class="peer block w-full px-4 py-4 text-slate-900 bg-transparent bg-blue-50/30 border-2 border-slate-300 rounded-xl appearance-none focus:outline-none focus:ring-0 focus:border-komdigi-blue peer-focus:border-komdigi-blue transition-colors pr-12" 
                            placeholder=" " />
                        <label for="password" 
                            class="absolute text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-komdigi-blue peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">
                            Kata Sandi
                        </label>
                        <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-komdigi-blue transition-colors focus:outline-none">
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg x-show="show" style="display: none;" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                        </button>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center space-x-2 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 rounded border-slate-300 text-komdigi-blue focus:ring-komdigi-blue transition">
                            <span class="text-slate-600 group-hover:text-slate-900 transition-colors">Ingat saya</span>
                        </label>
                        <a href="#" class="font-medium text-komdigi-blue hover:text-blue-700 transition-colors">Lupa Password?</a>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-komdigi-blue to-blue-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transition-all duration-300 transform">
                        Masuk Sekarang
                    </button>
                </form>

                <div class="mt-8 relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-slate-400">Atau masuk dengan</span>
                    </div>
                </div>

                <div class="mt-8 grid grid-cols-2 gap-4">
                    <a href="#" class="flex items-center justify-center px-4 py-3 border-2 border-slate-100 rounded-xl hover:bg-slate-50 transition-colors group">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="Google" class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform">
                        <span class="font-medium text-slate-600 group-hover:text-slate-900">Google</span>
                    </a>
                    <a href="#" class="flex items-center justify-center px-4 py-3 border-2 border-slate-100 rounded-xl hover:bg-slate-50 transition-colors group">
                        <span class="font-bold text-slate-800 tracking-wider mr-2 group-hover:scale-110 transition-transform">OSS</span>
                        <span class="font-medium text-slate-600 group-hover:text-slate-900">RBA</span>
                    </a>
                </div>


            </div>
            
            <!-- Mobile Decoration -->
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-komdigi-teal/10 rounded-full blur-3xl -mr-16 -mb-16 pointer-events-none"></div>
        </div>
    </div>

    <!-- Alpine.js for interactivity (Loaded inline to ensure it works instantly) -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        .animate-slow-zoom {
            animation: slowZoom 20s infinite alternate;
        }
        @keyframes slowZoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
    </style>
</x-layout>
