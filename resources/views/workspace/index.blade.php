<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #FDFDFC; }
    </style>
</head>
<body class="flex justify-center min-h-screen">

    <div class="w-full max-w-7xl bg-white shadow-2xl min-h-screen flex flex-col relative">
        
        <header class="border-b border-gray-100 px-6 py-6 flex justify-between items-center bg-white sticky top-0 z-40">
            <h1 class="text-2xl sm:text-3xl font-[900] text-[#9333EA] tracking-tighter">Workspace</h1>
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400 font-bold hover:text-red-500 transition">Logout</button>
            </form>
            @endauth
        </header>

        <main class="p-6 sm:p-8 flex-grow space-y-6">
            
            <div class="flex p-1 bg-gray-100 rounded-2xl w-full">
                <button class="flex-1 py-3 text-sm font-bold bg-white text-purple-600 rounded-xl shadow-sm">Catatan</button>
                <button class="flex-1 py-3 text-sm font-bold text-gray-500">Tasks</button>
            </div>

            <button class="w-full py-4 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] rounded-2xl shadow-lg hover:opacity-90 transition">
                + Tambah Catatan
            </button>

            <div class="w-full border-2 border-dashed border-gray-200 rounded-[32px] p-8 flex flex-col items-center justify-center min-h-[300px] text-center">
                <div class="bg-orange-50 p-6 rounded-full mb-4">
                    <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/></svg>
                </div>
                <p class="text-gray-400 font-bold">Belum ada catatan</p>
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
    