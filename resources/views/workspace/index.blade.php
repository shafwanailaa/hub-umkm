<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #FDFDFC; }
    </style>
</head>
<body class="flex justify-center min-h-screen">

    <div x-data="{ tab: 'catatan', openModal: false }" class="w-full max-w-7xl bg-white shadow-2xl min-h-screen flex flex-col relative pb-24">
        
        <header class="border-b border-gray-100 px-6 py-6 flex justify-between items-center bg-white sticky top-0 z-40">
            <h1 class="text-2xl sm:text-3xl font-[900] text-[#9333EA] tracking-tighter">Workspace</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400 font-bold hover:text-red-500 transition">Logout</button>
            </form>
        </header>

        <main class="p-6 sm:p-8 flex-grow space-y-6">
            <div class="flex p-1 bg-gray-100 rounded-2xl w-full">
                <button @click="tab = 'catatan'" 
                        :class="tab === 'catatan' ? 'bg-white text-purple-600 shadow-sm' : 'text-gray-500'"
                        class="flex-1 py-3 text-sm font-bold rounded-xl transition">Catatan</button>
                <button @click="tab = 'tasks'" 
                        :class="tab === 'tasks' ? 'bg-white text-purple-600 shadow-sm' : 'text-gray-500'"
                        class="flex-1 py-3 text-sm font-bold rounded-xl transition">Tasks</button>
            </div>

            <button @click="openModal = true" 
                    class="w-full py-4 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] rounded-2xl shadow-lg hover:opacity-90 transition">
                + Tambah <span x-text="tab === 'catatan' ? 'Catatan' : 'Task'"></span>
            </button>

            <div x-show="tab === 'catatan'" class="w-full border-2 border-dashed border-gray-200 rounded-[32px] p-8 min-h-[300px] text-center">
                <p class="text-gray-400 font-bold">Belum ada catatan</p>
            </div>
            <div x-show="tab === 'tasks'" class="w-full border-2 border-dashed border-gray-200 rounded-[32px] p-8 min-h-[300px] text-center">
                <p class="text-gray-400 font-bold">Belum ada tasks</p>
            </div>
        </main>

        <div x-show="openModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div @click.away="openModal = false" class="bg-white rounded-[32px] p-8 w-full max-w-sm shadow-2xl">
                <h3 class="text-xl font-black text-purple-700 mb-4" x-text="'Tambah ' + (tab === 'catatan' ? 'Catatan' : 'Task')"></h3>
                
                <form action="{{ route('workspace.storeNote') }}" method="POST">
                    @csrf
                    <input type="text" name="content" class="w-full p-3 border rounded-xl mb-4" placeholder="Tulis sesuatu..." required>
                    <button type="submit" class="w-full py-3 bg-purple-600 text-white font-bold rounded-xl hover:bg-purple-700 transition">Simpan</button>
                </form>
            </div>
        </div>
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
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
    