<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght=400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col" x-data="{ openModal: false, type: 'pemasukan' }">
        
        <header class="bg-white border-b border-gray-100 px-6 py-5 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-2xl font-[900] text-[#9333EA] tracking-tighter leading-none">Keuangan</h2>
            <button class="text-gray-400">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
            </button>
        </header>

        <main class="p-6 space-y-6 flex-grow mb-24 overflow-y-auto no-scrollbar">
            
            <div class="bg-white p-4 rounded-[24px] border border-gray-100 shadow-sm space-y-3">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase">Tanggal Awal:</label>
                        <input type="date" class="w-full mt-1 p-2 bg-gray-50 border border-gray-100 rounded-xl text-xs font-bold outline-none" value="2026-04-28">
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase">Tanggal Akhir:</label>
                        <input type="date" class="w-full mt-1 p-2 bg-gray-50 border border-gray-100 rounded-xl text-xs font-bold outline-none" value="2026-04-28">
                    </div>
                </div>
                <div class="bg-purple-50 p-2 rounded-lg text-center">
                    <p class="text-[10px] font-black text-[#9333EA]">Periode: Selasa, 28 April 2026</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-green-400 to-green-500 p-5 rounded-[24px] text-white shadow-lg shadow-green-100 relative overflow-hidden">
                    <svg class="w-8 h-8 opacity-20 absolute -right-2 -top-2" fill="currentColor" viewBox="0 0 24 24"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" /></svg>
                    <p class="text-[10px] font-bold opacity-80 uppercase">Pemasukan</p>
                    <h3 class="text-xl font-[900] mt-1 tracking-tight">Rp {{ number_format($pemasukan, 0, ',', '.') }}</h3>
                </div>
                <div class="bg-gradient-to-br from-orange-500 to-red-600 p-5 rounded-[24px] text-white shadow-lg shadow-orange-100 relative overflow-hidden">
                    <svg class="w-8 h-8 opacity-20 absolute -right-2 -top-2" fill="currentColor" viewBox="0 0 24 24"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" /></svg>
                    <p class="text-[10px] font-bold opacity-80 uppercase">Pengeluaran</p>
                    <h3 class="text-xl font-[900] mt-1 tracking-tight">Rp {{ number_format($pengeluaran, 0, ',', '.') }}</h3>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[24px] border border-gray-100 shadow-sm">
                <p class="text-xs font-bold text-gray-400 uppercase">Saldo Bersih</p>
                <h2 class="text-3xl font-[900] text-green-500 mt-1 tracking-tight">Rp {{ number_format($saldoBersih, 0, ',', '.') }}</h2>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <button @click="openModal = true" class="bg-[#9333EA] text-white py-3 rounded-xl font-black text-xs shadow-lg shadow-purple-100 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" /></svg>
                    Tambah Transaksi
                </button>
                <a href="{{ route('finance.download-pdf') }}" class="bg-green-500 text-white py-3 rounded-xl font-black text-xs shadow-lg shadow-green-100 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2.457a2 2 0 001.414-.586l3.071-3.071a2 2 0 00.586-1.414V2a2 2 0 00-2-2H2a2 2 0 00-2 2v12a2 2 0 00.586 1.414l3.071 3.071A2 2 0 005.071 17H7.5M17 17v5a2 2 0 01-2 2H9a2 2 0 01-2 2v-5m10 0H7" />
                    </svg>
                    Cetak Laporan
                </a>
            </div>

            <div class="bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm space-y-4">
                <h4 class="font-[900] text-gray-800 tracking-tight">Riwayat Transaksi</h4>
                
                <div class="space-y-3">
                    @foreach($riwayat as $item)
                    <div class="flex justify-between items-center p-3 bg-gray-50/50 rounded-2xl border border-gray-50">
                        <div class="flex items-center gap-3">
                            <div class="bg-green-500 text-white p-2 rounded-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                            </div>
                            <div>
                                <h5 class="text-xs font-black text-gray-800">{{ $item['nama'] }}</h5>
                                <p class="text-[10px] font-bold text-gray-400">{{ $item['tanggal'] }}</p>
                            </div>
                        </div>
                        <span class="text-xs font-[900] text-green-500">+Rp {{ number_format($item['jumlah'], 0, ',', '.') }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>

        <div x-show="openModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-6 bg-black/40 backdrop-blur-sm">
            <div @click.away="openModal = false" class="bg-white w-full max-w-sm rounded-[32px] p-8 shadow-2xl relative">
                <button @click="openModal = false" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600 transition"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                <h3 class="text-2xl font-[900] text-[#9333EA] mb-6">Tambah Transaksi</h3>

                <form class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Tipe Transaksi</label>
                        <div class="grid grid-cols-2 gap-3 p-1 bg-gray-50 rounded-2xl border border-gray-100">
                            <button type="button" @click="type = 'pemasukan'" :class="type === 'pemasukan' ? 'bg-green-500 text-white shadow-md' : 'text-gray-400'" class="py-2.5 rounded-xl text-xs font-black transition-all">Pemasukan</button>
                            <button type="button" @click="type = 'pengeluaran'" :class="type === 'pengeluaran' ? 'bg-red-500 text-white shadow-md' : 'text-gray-400'" class="py-2.5 rounded-xl text-xs font-black transition-all">Pengeluaran</button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Jumlah</label>
                        <input type="number" 
                               min="0" 
                               oninput="if(this.value < 0) this.value = 0;" 
                               required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:ring-2 focus:ring-purple-500 transition font-bold text-gray-700" 
                               placeholder="Rp 0">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Deskripsi</label>
                        <input type="text" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:ring-2 focus:ring-purple-500 transition" placeholder="Misal: Penjualan Tas">
                    </div>
                    <button type="submit" class="w-full py-4 mt-4 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] rounded-2xl shadow-lg shadow-purple-100 active:scale-95 transition">+ Tambah Transaksi</button>
                </form>
            </div>
        </div>

        <nav class="fixed bottom-0 w-full max-w-md bg-white border-t border-gray-100 z-50 px-4 py-3 flex justify-between items-end h-20 pb-4 shadow-[0_-10px_30px_rgba(0,0,0,0.05)]">
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('dashboard') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('dashboard'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('dashboard') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Home</span>
            </a>

            <a href="{{ route('products.index') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('products.index') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('products.index'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('products.index') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Produk</span>
            </a>

            <a href="{{ route('orders.index') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('orders.index') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('orders.index'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('orders.index') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Order</span>
            </a>

            <a href="{{ route('finance.index') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('finance.index') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('finance.index'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('finance.index') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Keuangan</span>
            </a>

            <a href="{{ route('workspace.index') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('workspace.index') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('workspace.index'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('workspace.index') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Workspace</span>
            </a>

            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('profile.edit') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('profile.edit'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('profile.edit') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Profile</span>
            </a>
        </nav>
    </div>

</body>
</html>