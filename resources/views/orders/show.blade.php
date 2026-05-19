<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col" x-data="{ status: 'pending' }">
        
        <header class="bg-white border-b border-gray-100 px-6 py-5 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-2xl font-[900] text-[#9333EA] tracking-tighter leading-none">Detail Pesanan</h2>
            <a href="#" class="text-gray-400">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </a>
        </header>

        <main class="p-6 space-y-6 flex-grow mb-24">
            <a href="{{ route('orders.index') }}" class="flex items-center gap-2 text-gray-500 font-bold hover:text-[#9333EA] transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali</span>
            </a>

            <div class="bg-white p-5 rounded-[24px] border-2 border-blue-400 shadow-lg shadow-blue-50 space-y-4">
                <div class="flex items-center gap-4">
                    <div class="bg-blue-500 p-3 rounded-2xl text-white shadow-md shadow-blue-100">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Pelanggan</p>
                        <h4 class="font-[900] text-gray-800 text-lg leading-tight">Siska Amalia</h4>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-green-400 p-3 rounded-2xl text-white shadow-md shadow-green-50">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tanggal Pesanan</p>
                        <h4 class="font-[900] text-gray-800 text-lg leading-tight">27/4/2026, 09.31</h4>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="bg-[#E879F9] p-2 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h4 class="font-[900] text-gray-800 text-lg">Item Pesanan</h4>
                </div>

                <div class="bg-[#FDF2F8] p-4 rounded-2xl flex justify-between items-center">
                    <div>
                        <h5 class="font-bold text-gray-800">Pensilcase Rajut</h5>
                        <p class="text-[10px] font-bold text-gray-400">Qty: 1</p>
                    </div>
                    <span class="font-[900] text-gray-800">Rp 50.000</span>
                </div>

                <hr class="border-dashed border-gray-200">
                
                <div class="flex justify-between items-center">
                    <span class="font-[900] text-gray-800 text-lg">Total</span>
                    <span class="font-[900] text-[#E879F9] text-xl">Rp 50.000</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm">
                <h4 class="font-[900] text-gray-800 text-lg mb-6 tracking-tight">Update Status</h4>
                <div class="grid grid-cols-2 gap-4">
                    <button @click="status = 'pending'" :class="status === 'pending' ? 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white shadow-purple-200' : 'bg-gray-100 text-gray-400'" class="py-4 rounded-2xl font-black text-sm shadow-md transition">
                        Pending
                    </button>
                    <button @click="status = 'diproses'" :class="status === 'diproses' ? 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white shadow-purple-200' : 'bg-gray-100 text-gray-400'" class="py-4 rounded-2xl font-black text-sm shadow-md transition">
                        Diproses
                    </button>
                    <button @click="status = 'dikirim'" :class="status === 'dikirim' ? 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white shadow-purple-200' : 'bg-gray-100 text-gray-400'" class="py-4 rounded-2xl font-black text-sm shadow-md transition">
                        Dikirim
                    </button>
                    <button @click="status = 'selesai'" :class="status === 'selesai' ? 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white shadow-purple-200' : 'bg-gray-100 text-gray-400'" class="py-4 rounded-2xl font-black text-sm shadow-md transition">
                        Selesai
                    </button>
                </div>
            </div>
        </main>

        <nav class="fixed bottom-0 w-full max-w-md bg-white border-t border-gray-100 z-50 px-4 py-3 flex justify-between items-end h-20 pb-4 shadow-[0_-10px_30px_rgba(0,0,0,0.05)]">
    
    <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-end w-full gap-1 text-gray-300 pb-1.5">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="text-[8px] font-bold uppercase tracking-tighter">Home</span>
    </a>

    <a href="{{ route('products.index') }}" class="flex flex-col items-center justify-end w-full gap-1 text-gray-300 pb-1.5">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
        </svg>
        <span class="text-[8px] font-bold uppercase tracking-tighter">Produk</span>
    </a>

    <a href="{{ route('orders.index') }}" class="flex flex-col items-center justify-end w-full gap-1 text-[#9333EA]">
        <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </div>
        <span class="text-[8px] font-[900] uppercase tracking-tighter text-center">Order</span>
    </a>

    <div class="flex flex-col items-center justify-end w-full gap-1 text-gray-300 pb-1.5">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="text-[8px] font-bold uppercase tracking-tighter text-center">Keuangan</span>
    </div>

    <div class="flex flex-col items-center justify-end w-full gap-1 text-gray-300 pb-1.5">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
        <span class="text-[8px] font-bold uppercase tracking-tighter leading-none text-center">Workspace</span>
    </div>

    <div class="flex flex-col items-center justify-end w-full gap-1 text-gray-300 pb-1.5">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <span class="text-[8px] font-bold uppercase tracking-tighter">Profile</span>
    </div>
</nav>
    </div>

</body>
</html>