<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajahi Toko UMKM - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col pb-6">
        
        <header class="bg-white border-b border-gray-100 px-5 py-4 flex justify-between items-center sticky top-0 z-50">
            <div class="flex items-center gap-2">
                <div class="bg-[#9333EA] p-1.5 rounded-lg text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h1 class="text-xl font-[900] text-[#9333EA] tracking-tighter">HubUMKM</h1>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('orders.history') }}" class="p-2 bg-gray-50 hover:bg-purple-50 text-gray-400 hover:text-[#9333EA] rounded-xl border border-gray-100 transition flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </a>
                
                <button class="p-2 bg-gray-50 hover:bg-purple-50 text-gray-400 hover:text-[#9333EA] rounded-xl border border-gray-100 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                
                <a href="{{ route('cart.index') }}" class="p-2 bg-[#9333EA] text-white rounded-xl shadow-md shadow-purple-100 relative hover:bg-[#8227ec] transition flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    {{-- FIX SINKRONISASI: Tag angka statis dinonaktifkan sepenuhnya agar selaras dengan keranjang baru yang kosong --}}
                    @auth
                        {{-- <span class="absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[9px] font-black w-5 h-5 rounded-full flex items-center justify-center border-2 border-white">0</span> --}}
                    @endauth
                </a>
            </div>
        </header>

        <main class="p-5 space-y-6 flex-grow overflow-y-auto no-scrollbar">
            
            <div class="space-y-1">
                <h2 class="text-3xl font-[900] text-[#9333EA] tracking-tight leading-none">Jelajahi Toko UMKM</h2>
                <p class="text-xs font-bold text-gray-400 leading-tight">Dukung UMKM Indonesia dengan berbelanja langsung dari pemilik usaha</p>
            </div>

            @if(session('warning'))
                <div class="p-4 mb-4 text-sm text-amber-800 rounded-2xl bg-amber-50 border border-amber-100 font-medium animate-pulse">
                    {{ session('warning') }}
                </div>
            @endif

            <div class="space-y-6">

                <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm overflow-hidden p-4 space-y-4">
                    <div class="w-full h-44 rounded-2xl overflow-hidden bg-gray-100 relative">
                        <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover" alt="Rumah Anyaman">
                        <div class="absolute bottom-3 left-3 w-14 h-14 bg-white rounded-xl p-1 shadow-md border border-gray-50 flex items-center justify-center">
                            <div class="w-full h-full bg-[#F59E0B]/10 rounded-lg flex items-center justify-center text-[#F59E0B] font-bold text-xs text-center p-1 leading-none border border-[#F59E0B]/20">
                                RMH ANYM
                            </div>
                        </div>
                    </div>

                    <div class="px-1 space-y-2">
                        <h3 class="text-xl font-[900] text-gray-800 tracking-tight">Rumah Anyaman</h3>
                        <p class="text-xs font-medium text-gray-400 leading-relaxed">Rumah Anyaman menyediakan berbagai kerajinan anyaman berkualitas dengan desain tradisional and modern. Tersedia koleksi dekorasi rumah, tas, souvenir, and perlengkapan handmade dengan harga terjangkau.</p>
                        
                        <div class="flex items-center gap-4 text-xs pt-1">
                            <div class="flex items-center gap-1 text-gray-700 font-bold">
                                <span class="text-yellow-400 font-bold text-sm">★</span> 4.8
                            </div>
                            <div class="flex items-center gap-1 text-gray-400 font-bold">
                                <svg class="w-4 h-4 text-[#9333EA]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                                10 Produk
                            </div>
                        </div>

                        <div class="flex items-center gap-1 text-[11px] font-bold text-gray-400 pt-1">
                            <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            Bogor
                        </div>
                    </div>

                    <a href="{{ route('toko.detail') }}" class="block w-full py-3.5 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-sm rounded-2xl shadow-lg shadow-purple-100 hover:scale-[1.01] active:scale-95 transition-all uppercase tracking-wide text-center">
                        Kunjungi Toko
                    </a>
                </div>

                <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm overflow-hidden p-4 space-y-4">
                    <div class="w-full h-44 rounded-2xl overflow-hidden bg-gray-100 relative">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover" alt="Santapan Mantap">
                        <div class="absolute bottom-3 left-3 w-14 h-14 bg-white rounded-xl p-1 shadow-md border border-gray-50 flex items-center justify-center">
                            <div class="w-full h-full bg-orange-500 rounded-lg flex items-center justify-center text-white font-bold text-[10px] text-center p-1 leading-tight">
                                SNTPN MTP
                            </div>
                        </div>
                    </div>

                    <div class="px-1 space-y-2">
                        <h3 class="text-xl font-[900] text-gray-800 tracking-tight">Santapan Mantap</h3>
                        <p class="text-xs font-medium text-gray-400 leading-relaxed">Santapan Mantap menyajikan berbagai pilihan makanan lezat dengan cita rasa khas and harga terjangkau. Tersedia menu makanan rumahan, camilan, hingga hidangan kekinian yang cocok dinikmati bersama keluarga and teman.</p>
                        
                        <div class="flex items-center gap-4 text-xs pt-1">
                            <div class="flex items-center gap-1 text-gray-700 font-bold">
                                <span class="text-yellow-400 font-bold text-sm">★</span> 4.9
                            </div>
                            <div class="flex items-center gap-1 text-gray-400 font-bold">
                                <svg class="w-4 h-4 text-[#9333EA]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                                20 Produk
                            </div>
                        </div>

                        <div class="flex items-center gap-1 text-[11px] font-bold text-gray-400 pt-1">
                            <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            Surabaya
                        </div>
                    </div>

                    <a href="{{ route('toko.detail') }}" class="block w-full py-3.5 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-sm rounded-2xl shadow-lg shadow-purple-100 hover:scale-[1.01] active:scale-95 transition-all uppercase tracking-wide text-center">
                        Kunjungi Toko
                    </a>
                </div>

                <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm overflow-hidden p-4 space-y-4">
                    <div class="w-full h-44 rounded-2xl overflow-hidden bg-gray-100 relative">
                        <img src="https://images.unsplash.com/photo-1532372320978-9b4d7a92b24d?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover" alt="Roemah Rotan">
                        <div class="absolute bottom-3 left-3 w-14 h-14 bg-white rounded-xl p-1 shadow-md border border-gray-50 flex items-center justify-center">
                            <div class="w-full h-full bg-stone-800 rounded-lg flex items-center justify-center text-yellow-500 font-bold text-[10px] text-center p-1 leading-tight">
                                RMH RTN
                            </div>
                        </div>
                    </div>

                    <div class="px-1 space-y-2">
                        <h3 class="text-xl font-[900] text-gray-800 tracking-tight">Roemah Rotan</h3>
                        <p class="text-xs font-medium text-gray-400 leading-relaxed">Roemah Rotan menghadirkan berbagai kerajinan rotan berkualitas dengan sentuhan tradisional and modern. Tersedia furniture, dekorasi rumah, tas, and aksesoris handmade yang elegan dengan harga terjangkau.</p>
                        
                        <div class="flex items-center gap-4 text-xs pt-1">
                            <div class="flex items-center gap-1 text-gray-700 font-bold">
                                <span class="text-yellow-400 font-bold text-sm">★</span> 4.7
                            </div>
                            <div class="flex items-center gap-1 text-gray-400 font-bold">
                                <svg class="w-4 h-4 text-[#9333EA]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                                15 Produk
                            </div>
                        </div>

                        <div class="flex items-center gap-1 text-[11px] font-bold text-gray-400 pt-1">
                            <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            Jepara
                        </div>
                    </div>

                    <a href="{{ route('toko.detail') }}" class="block w-full py-3.5 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-sm rounded-2xl shadow-lg shadow-purple-100 hover:scale-[1.01] active:scale-95 transition-all uppercase tracking-wide text-center">
                        Kunjungi Toko
                    </a>
                </div>

            </div>
        </main>
    </div>

</body>
</html>