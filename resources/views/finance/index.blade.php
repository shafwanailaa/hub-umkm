<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center min-h-screen">

    <div class="w-full max-w-7xl bg-white shadow-2xl flex flex-col min-h-screen relative" x-data="{ openModal: false, type: 'pemasukan' }">
        
        <header class="border-b border-gray-100 px-8 py-6 flex justify-between items-center sticky top-0 bg-white z-40">
            <h2 class="text-3xl font-[900] text-[#9333EA] tracking-tighter">Keuangan</h2>
        </header>

        <main class="p-8 flex-grow space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-green-400 to-green-500 p-6 rounded-[32px] text-white shadow-lg">
                    <p class="text-[10px] font-bold opacity-80 uppercase">Pemasukan</p>
                    <h3 class="text-2xl font-[900] mt-1">Rp {{ number_format($pemasukan ?? 0, 0, ',', '.') }}</h3>
                </div>
                <div class="bg-gradient-to-br from-orange-500 to-red-600 p-6 rounded-[32px] text-white shadow-lg">
                    <p class="text-[10px] font-bold opacity-80 uppercase">Pengeluaran</p>
                    <h3 class="text-2xl font-[900] mt-1">Rp {{ number_format($pengeluaran ?? 0, 0, ',', '.') }}</h3>
                </div>
                <div class="bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm">
                    <p class="text-[10px] font-bold text-gray-400 uppercase">Saldo Bersih</p>
                    <h3 class="text-2xl font-[900] text-green-500 mt-1">Rp {{ number_format($saldoBersih ?? 0, 0, ',', '.') }}</h3>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[32px] border border-gray-100 shadow-sm">
                <h4 class="font-[900] text-gray-800 mb-6">Riwayat Transaksi</h4>
                <div class="space-y-4">
                    @foreach($riwayat as $item)
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-2xl">
                        <div class="flex items-center gap-4">
                            <div class="{{ ($item['tipe'] ?? 'pemasukan') == 'pemasukan' ? 'bg-green-500' : 'bg-red-500' }} text-white p-3 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                            </div>
                            <div>
                                <h5 class="text-sm font-black text-gray-800">{{ $item['deskripsi'] ?? 'Tanpa Deskripsi' }}</h5>
                                <p class="text-xs font-bold text-gray-400">{{ $item['tanggal'] ?? '-' }}</p>
                            </div>
                        </div>
                        <span class="text-sm font-[900] {{ ($item['tipe'] ?? 'pemasukan') == 'pemasukan' ? 'text-green-500' : 'text-red-500' }}">
                            {{ ($item['tipe'] ?? 'pemasukan') == 'pemasukan' ? '+' : '-' }}Rp {{ number_format($item['jumlah'] ?? 0, 0, ',', '.') }}
                        </span>
                    </div>
                    @endforeach
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