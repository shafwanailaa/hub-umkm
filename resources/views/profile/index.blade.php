<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #FDFDFC; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="flex justify-center min-h-screen pb-24">

    <div class="w-full max-w-7xl bg-white shadow-2xl min-h-screen flex flex-col">
        
        <header class="border-b border-gray-100 px-8 py-6 flex justify-between items-center bg-white sticky top-0 z-40">
            <h2 class="text-2xl font-[900] text-[#9333EA] tracking-tighter">Profil & Pengaturan</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-red-500 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </header>

        <main class="p-8 flex-grow space-y-8">
            
            <div class="bg-gradient-to-br from-[#9333EA] to-[#E879F9] rounded-[40px] p-8 text-white flex flex-col md:flex-row items-center gap-6 shadow-xl shadow-purple-100">
                <div class="relative">
                    <div class="w-28 h-28 bg-white/20 rounded-full border-4 border-white/30 flex items-center justify-center overflow-hidden">
                        <svg class="w-16 h-16 text-white/80" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <button class="absolute bottom-1 right-1 bg-white text-[#9333EA] p-2 rounded-full shadow-lg hover:scale-110 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </button>
                </div>
                <div class="text-center md:text-left flex-1">
                    <h3 class="text-3xl font-[900] tracking-tight">Lintang Kejora</h3>
                    <p class="text-purple-100 font-medium opacity-90">lintangkejora23@gmail.com</p>
                    <div class="mt-4 inline-flex items-center gap-2 bg-white/20 px-5 py-2 rounded-2xl border border-white/30 backdrop-blur-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        <span class="text-xs font-black uppercase tracking-wider">Toko Saya</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[40px] border border-gray-100 shadow-sm space-y-6">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-8 bg-[#9333EA] rounded-full"></div>
                        <h4 class="font-[900] text-gray-800 text-xl tracking-tight">Informasi Bisnis</h4>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="bg-purple-50 text-[#9333EA] px-6 py-2.5 rounded-2xl font-black text-xs hover:bg-[#9333EA] hover:text-white transition shadow-sm">
                        Edit Profil
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Nama Pemilik</label>
                        <div class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700">
                            Lintang Kejora
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Email</label>
                        <div class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700">
                            lintangkejora23@gmail.com
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Nama Bisnis</label>
                        <div class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700">
                            Toko Saya
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Alamat Bisnis</label>
                        <div class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700">
                            Jl. Contoh No. 123
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Navbar bawah tetap terjaga untuk mobile-responsif -->
        <nav class="fixed bottom-0 w-full max-w-7xl bg-white border-t border-gray-100 z-50 px-8 py-4 flex justify-between items-center h-20 shadow-[0_-10px_30px_rgba(0,0,0,0.03)]">
            <!-- Isi nav tetap sama, hanya sesuaikan padding -->
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('dashboard') ? 'text-[#9333EA]' : 'text-gray-300' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                <span class="text-[8px] font-bold uppercase">Home</span>
            </a>
            <a href="{{ route('products.index') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('products.index') ? 'text-[#9333EA]' : 'text-gray-300' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                <span class="text-[8px] font-bold uppercase">Produk</span>
            </a>
            <a href="{{ route('orders.index') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('orders.index') ? 'text-[#9333EA]' : 'text-gray-300' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                <span class="text-[8px] font-bold uppercase">Order</span>
            </a>
            <a href="{{ route('finance.index') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('finance.index') ? 'text-[#9333EA]' : 'text-gray-300' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span class="text-[8px] font-bold uppercase">Keuangan</span>
            </a>
            <a href="{{ route('workspace.index') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('workspace.index') ? 'text-[#9333EA]' : 'text-gray-300' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                <span class="text-[8px] font-bold uppercase">Workspace</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('profile.edit') ? 'text-[#9333EA]' : 'text-gray-300' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                <span class="text-[8px] font-bold uppercase">Profile</span>
            </a>
        </nav>
    </div>

</body>
</html>