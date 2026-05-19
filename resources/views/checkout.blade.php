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

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col pb-24">
        
        <div x-show="!isSuccess" class="w-full flex flex-col">
            <header class="bg-white px-5 py-4 flex items-center sticky top-0 z-50 border-b border-gray-50">
                <a href="javascript:history.back()" class="flex items-center gap-1 text-gray-500 hover:text-[#9333EA] transition text-xs font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Keranjang
                </a>
            </header>

            <main class="p-5 space-y-6 flex-grow overflow-y-auto no-scrollbar">
                
                <div class="space-y-1">
                    <h2 class="text-[32px] font-[900] text-[#9333EA] tracking-tight leading-none">Informasi Pemesanan</h2>
                    <p class="text-xs font-bold text-gray-400">Lengkapi data pengiriman dan pembayaran Anda</p>
                </div>

                <form @submit.prevent="isSuccess = true" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-4">
                        <h3 class="text-sm font-black text-gray-800 uppercase tracking-wider px-1">📍 Data Pengiriman</h3>
                        
                        <div class="bg-white rounded-[24px] border border-gray-100 shadow-xl shadow-gray-100/50 p-5 space-y-4">
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-gray-500 pl-1">Nama Lengkap</label>
                                <input type="text" required placeholder="Nama Lengkap" 
                                    class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#9333EA] transition">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-gray-500 pl-1">Nomor Telepon</label>
                                <input type="tel" required placeholder="08xxxxxxxxxx" 
                                    class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#9333EA] transition">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-gray-500 pl-1">Alamat Lengkap</label>
                                <textarea required rows="3" placeholder="Jl. Mawar No. 123, Jakarta" 
                                    class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#9333EA] transition resize-none"></textarea>
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-gray-500 pl-1">Catatan (Opsional)</label>
                                <textarea rows="2" placeholder="Catatan untuk penjual..." 
                                    class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#9333EA] transition resize-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-sm font-black text-gray-800 uppercase tracking-wider px-1">💳 Metode Pembayaran</h3>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="payment_method" value="cod" x-model="paymentMethod" checked class="peer sr-only">
                                <div class="bg-white border border-gray-200 rounded-2xl p-4 flex flex-col items-center justify-center gap-1 text-center shadow-sm peer-checked:border-[#9333EA] peer-checked:bg-[#FDF2FF] transition h-24">
                                    <span class="text-xl">💵</span>
                                    <span class="text-xs font-black text-gray-800">COD</span>
                                    <span class="text-[9px] text-gray-400 leading-none">Bayar saat barang diterima</span>
                                </div>
                            </label>

                            <label class="relative cursor-pointer">
                                <input type="radio" name="payment_method" value="bank" x-model="paymentMethod" class="peer sr-only">
                                <div class="bg-white border border-gray-200 rounded-2xl p-4 flex flex-col items-center justify-center gap-1 text-center shadow-sm peer-checked:border-[#9333EA] peer-checked:bg-[#FDF2FF] transition h-24">
                                    <span class="text-xl">🏦</span>
                                    <span class="text-xs font-black text-gray-800">Transfer Bank</span>
                                    <span class="text-[9px] text-gray-400 leading-none">BCA, BRI, Mandiri...</span>
                                </div>
                            </label>

                            <label class="relative cursor-pointer">
                                <input type="radio" name="payment_method" value="qris" x-model="paymentMethod" class="peer sr-only">
                                <div class="bg-white border border-gray-200 rounded-2xl p-4 flex flex-col items-center justify-center gap-1 text-center shadow-sm peer-checked:border-[#9333EA] peer-checked:bg-[#FDF2FF] transition h-24">
                                    <span class="text-xl">📱</span>
                                    <span class="text-xs font-black text-gray-800">QRIS</span>
                                    <span class="text-[9px] text-gray-400 leading-none">Scan QR untuk bayar</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-sm font-black text-gray-800 uppercase tracking-wider px-1">🛍️ Ringkasan Pesanan</h3>
                        
                        <div class="bg-white rounded-[24px] border border-gray-100 shadow-xl shadow-gray-100/40 p-4 space-y-4">
                            <div class="flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gray-50 rounded-xl overflow-hidden flex-shrink-0 border border-gray-100">
                                        <img src="https://images.unsplash.com/photo-1627123424574-724758594e93?q=80&w=200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Dompet Rajut">
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-black text-gray-800 leading-tight">Dompet Rajut</h4>
                                        <p class="text-[11px] font-bold text-gray-400 mt-0.5">Qty: 1</p>
                                    </div>
                                </div>
                                <span class="text-xs font-black text-[#9333EA]">Rp 45.000</span>
                            </div>

                            <div class="pt-3 border-t border-gray-100 space-y-2">
                                <div class="flex justify-between items-center text-xs font-bold text-gray-400">
                                    <span>Subtotal Produk</span>
                                    <span class="text-gray-700">Rp 45.000</span>
                                </div>
                                <div class="flex justify-between items-center text-xs font-bold text-gray-400">
                                    <span>Subtotal Pengiriman</span>
                                    <span class="text-green-500 font-black">Gratis</span>
                                </div>
                                <div class="pt-3 border-t border-gray-100 flex justify-between items-center">
                                    <span class="text-sm font-black text-gray-800">Total</span>
                                    <span class="text-base font-[900] text-[#9333EA]">Rp 45.000</span>
                                </div>
                            </div>
                            
                            <div class="bg-[#FDF2FF] border border-[#F4D1FF] rounded-xl p-3 mt-2 flex items-center gap-2">
                                <span>💳</span>
                                <p class="text-[11px] font-bold text-gray-500">
                                    Metode Pembayaran: 
                                    <span class="text-[#9333EA] uppercase" x-text="paymentMethod === 'cod' ? 'COD (Bayar di Tempat)' : (paymentMethod === 'bank' ? 'Transfer Bank' : 'QRIS')"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-white border-t border-gray-50 flex justify-center">
                        <button type="submit" class="w-full max-w-md bg-gradient-to-r from-[#9333EA] to-[#E879F9] hover:scale-[1.01] active:scale-[0.98] text-white text-sm font-black py-4 rounded-2xl shadow-xl shadow-[#9333EA]/20 tracking-wide transition duration-200 uppercase">
                            Buat Pesanan
                        </button>
                    </div>
                </form>
            </main>
        </div>

        <div x-show="isSuccess" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             class="flex-grow flex items-center justify-center p-6 min-h-screen bg-transparent"
             style="display: none;">
            
            <div class="bg-white rounded-[32px] w-full max-w-sm p-8 text-center border border-gray-100 shadow-2xl space-y-6">
                <div class="flex justify-center">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-[#4ADE80] to-[#16A34A] flex items-center justify-center text-white text-4xl font-bold shadow-lg shadow-green-100">
                        ✓
                    </div>
                </div>

                <div class="space-y-2">
                    <h3 class="text-2xl font-[900] text-[#D946EF] tracking-tight">Pesanan Berhasil</h3>
                    <p class="text-xs font-bold text-gray-400">Nomor Pesanan:</p>
                    <h4 class="text-xl font-black text-gray-800 tracking-tight">ORD-1777431735925</h4>
                </div>

                <p class="text-xs font-semibold text-gray-400 leading-relaxed px-2">
                    Terima kasih atas pesanan Anda.<br>Kami akan segera memprosesnya.
                </p>

                <div class="pt-2">
                    <a href="{{ route('orders.history') }}" class="block w-full py-3.5 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-black text-xs rounded-xl shadow-md uppercase tracking-wider active:scale-95 transition-all text-center">
                        Lihat Riwayat Pesanan
                    </a>
                </div>
            </div>
        </div>

    </div>

</body>
</html>