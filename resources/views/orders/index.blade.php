<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col" 
         x-data="{ 
            currentStatus: 'Semua',
            // Tempatkan kumpulan data pesanan di sini agar filter bekerja dinamis
            orders: [
                { id: 1, name: 'Siska Amalia', date: '27/4/2026', items: '1 item', price: 'Rp 50.000', status: 'Pending' }
            ]
         }">
        
        <header class="bg-white border-b border-gray-100 px-6 py-5 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-2xl font-[900] text-[#9333EA] tracking-tighter leading-none">Pesanan</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-red-500 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </header>

        <main class="p-6 flex-grow mb-24">
            
            <div class="flex gap-3 overflow-x-auto pb-4 mb-4 no-scrollbar">
                <button @click="currentStatus = 'Semua'" 
                        :class="currentStatus === 'Semua' ? 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900]' : 'bg-white text-gray-400 font-bold border-gray-100'" 
                        class="px-6 py-2.5 rounded-xl shadow-sm border whitespace-nowrap transition-all duration-200">Semua</button>
                
                <button @click="currentStatus = 'Pending'" 
                        :class="currentStatus === 'Pending' ? 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900]' : 'bg-white text-gray-400 font-bold border-gray-100'" 
                        class="px-6 py-2.5 rounded-xl shadow-sm border whitespace-nowrap transition-all duration-200">Pending</button>
                
                <button @click="currentStatus = 'Diproses'" 
                        :class="currentStatus === 'Diproses' ? 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900]' : 'bg-white text-gray-400 font-bold border-gray-100'" 
                        class="px-6 py-2.5 rounded-xl shadow-sm border whitespace-nowrap transition-all duration-200">Diproses</button>
                
                <button @click="currentStatus = 'Dipro'" 
                        :class="currentStatus === 'Dipro' ? 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900]' : 'bg-white text-gray-400 font-bold border-gray-100'" 
                        class="px-6 py-2.5 rounded-xl shadow-sm border whitespace-nowrap transition-all duration-200">Dikirim</button>
            </div>

            <div class="space-y-5">
                <template x-for="order in orders" :key="order.id">
                    <a href="{{ route('orders.show') }}" 
                       x-show="currentStatus === 'Semua' || currentStatus === order.status" 
                       x-transition:enter="transition ease-out duration-200"
                       x-transition:enter-start="opacity-0 transform scale-95"
                       x-transition:enter-end="opacity-100 transform scale-100"
                       class="block transition hover:opacity-90 active:scale-[0.98]">
                        <div class="bg-white p-5 rounded-[32px] shadow-sm border border-gray-50 relative">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h4 class="font-[900] text-gray-800 text-lg tracking-tight" x-text="order.name"></h4>
                                    <p class="text-[11px] font-bold text-gray-400" x-text="order.date"></p>
                                </div>
                                <div class="bg-purple-50 p-2 rounded-xl text-[#9333EA]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" /></svg>
                                </div>
                            </div>
                            <div class="flex justify-between items-end">
                                <div>
                                    <p class="text-[11px] font-black text-gray-300 uppercase tracking-widest" x-text="order.items"></p>
                                    <p class="text-xl font-[900] text-[#9333EA]" x-text="order.price"></p>
                                </div>
                                <span class="bg-[#FBE3CC] text-[#E29A5B] text-[10px] font-black px-4 py-1.5 rounded-lg border border-orange-50" x-text="order.status"></span>
                            </div>
                        </div>
                    </a>
                </template>
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