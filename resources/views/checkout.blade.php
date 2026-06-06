<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pemesanan - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center" x-data="{ isSuccess: false, paymentMethod: 'cod' }">

    <div class="w-full max-w-7xl bg-white min-h-screen shadow-2xl relative flex flex-col pb-24 px-4 md:px-8">
        
        <div x-show="!isSuccess" class="w-full flex flex-col">
            <header class="bg-white px-2 py-6 flex items-center sticky top-0 z-50 border-b border-gray-50 mb-4">
                <a href="javascript:history.back()" class="flex items-center gap-1 text-gray-500 hover:text-[#9333EA] transition text-xs font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
            </header>

            <main class="grid grid-cols-1 lg:grid-cols-2 gap-10 flex-grow pb-24">
                
                <div class="space-y-6">
                    <div class="space-y-1">
                        <h2 class="text-[32px] font-[900] text-[#9333EA] tracking-tight leading-none">Informasi Pemesanan</h2>
                        <p class="text-xs font-bold text-gray-400">Lengkapi data pengiriman dan pembayaran Anda</p>
                    </div>

                    <form @submit.prevent="isSuccess = true" class="space-y-6">
                        @csrf
                        <div class="space-y-4">
                            <h3 class="text-sm font-black text-gray-800 uppercase tracking-wider px-1">📍 Data Pengiriman</h3>
                            <div class="bg-white rounded-[24px] border border-gray-100 shadow-sm p-5 space-y-4">
                                <div class="space-y-1.5"><label class="text-xs font-bold text-gray-500 pl-1">Nama Lengkap</label><input type="text" required placeholder="Nama Lengkap" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 focus:border-[#9333EA] transition"></div>
                                <div class="space-y-1.5"><label class="text-xs font-bold text-gray-500 pl-1">Nomor Telepon</label><input type="tel" required placeholder="08xxxxxxxxxx" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 focus:border-[#9333EA] transition"></div>
                                <div class="space-y-1.5"><label class="text-xs font-bold text-gray-500 pl-1">Alamat Lengkap</label><textarea required rows="3" placeholder="Jl. Mawar No. 123, Jakarta" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 focus:border-[#9333EA] transition resize-none"></textarea></div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="lg:sticky lg:top-28 h-fit bg-[#FDF2FF] rounded-[32px] p-8 border border-purple-100 shadow-xl shadow-purple-50">
                     <h3 class="text-sm font-black text-gray-800 uppercase tracking-wider mb-6">💳 Pembayaran & Ringkasan</h3>
                     <div class="space-y-6">
                        <div class="flex justify-between items-center text-sm font-bold text-gray-600">
                            <span>Total Harga (1 Barang)</span>
                            <span class="text-[#9333EA] font-black">Rp 45.000</span>
                        </div>
                        <button type="submit" @click="isSuccess = true" class="w-full bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-black py-4 rounded-2xl shadow-lg hover:scale-[1.01] transition uppercase">
                            Buat Pesanan
                        </button>
                     </div>
                </div>

            </main>
        </div>

        <div x-show="isSuccess" class="fixed inset-0 flex items-center justify-center p-6 bg-white z-[100]" style="display: none;">
            <div class="text-center space-y-6">
                <div class="w-24 h-24 mx-auto rounded-full bg-green-100 flex items-center justify-center text-green-500 text-4xl">✓</div>
                <h3 class="text-2xl font-[900] text-[#D946EF]">Pesanan Berhasil!</h3>
                <a href="{{ route('orders.history') }}" class="block px-8 py-3 bg-[#9333EA] text-white font-black rounded-xl">Lihat Riwayat</a>
            </div>
        </div>

    </div>
</body>
</html>