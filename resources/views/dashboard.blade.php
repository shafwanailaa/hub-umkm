<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght=400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col">
        
        <header class="bg-white border-b border-gray-100 px-6 py-5 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-2xl font-[900] text-[#9333EA] tracking-tighter leading-none">Dashboard</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </header>

        <main class="p-6 space-y-6 flex-grow mb-24">
            <div class="bg-gradient-to-br from-[#9333EA] to-[#E879F9] rounded-[32px] p-6 text-white shadow-xl shadow-purple-100">
                <div class="flex items-center gap-2 mb-2 opacity-90">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                    <span class="text-xs font-bold uppercase tracking-wider">Total Penjualan Hari Ini</span>
                </div>
                <h3 class="text-4xl font-[900] mb-1 tracking-tight">Rp {{ number_format($totalPenjualanHariIni, 0, ',', '.') }}</h3>
                <p class="text-[10px] font-bold opacity-70 uppercase tracking-widest">Target: Rp 500.000</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white p-5 rounded-[28px] border border-gray-100 shadow-sm flex flex-col items-start">
                    <div class="bg-green-50 p-2.5 rounded-xl mb-3 text-green-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" /></svg>
                    </div>
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-tighter leading-none">Order Hari Ini</span>
                    <span class="text-3xl font-[900] text-green-500 mt-1 leading-none">{{ $orderHariIni }}</span>
                </div>
                
                <div class="bg-white p-5 rounded-[28px] border border-gray-100 shadow-sm flex flex-col items-start">
                    <div class="bg-orange-50 p-2.5 rounded-xl mb-3 text-orange-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" /><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>
                    </div>
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-tighter leading-none">Total Produk</span>
                    <span class="text-3xl font-[900] text-orange-500 mt-1 leading-none">{{ $totalProduk }}</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm">
                <h4 class="font-[900] text-gray-800 mb-4 text-lg">Pesanan Terbaru</h4>
                <div class="space-y-3">
                    @forelse($pesananTerbaru as $order)
                        <div class="bg-gray-50/50 rounded-2xl p-4 flex justify-between items-center border border-gray-100">
                            <div>
                                <h5 class="font-bold text-sm text-gray-800">{{ $order->nama_pembeli ?? 'Pelanggan' }}</h5>
                                <p class="text-[11px] font-black text-[#9333EA]">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                            </div>
                            <span class="text-white text-[10px] font-black px-4 py-1.5 rounded-full shadow-sm 
                                {{ strtolower($order->status) === 'pending' ? 'bg-[#F6AD8F]' : 'bg-emerald-500' }}">
                                {{ $order->status }}
                            </span>
                        </div>
                    @empty
                        <p class="text-xs font-semibold text-gray-400 text-center py-4">Belum ada pesanan masuk saat ini.</p>
                    @endforelse
                </div>
            </div>
        </main>

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