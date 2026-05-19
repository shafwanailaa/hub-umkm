<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col pb-8">
        
        <header class="bg-white px-5 py-4 flex items-center sticky top-0 z-50 border-b border-gray-50">
            <a href="javascript:history.back()" class="flex items-center gap-1 text-gray-500 hover:text-[#9333EA] transition text-xs font-bold">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Toko
            </a>
        </header>

        <main class="p-5 space-y-6 flex-grow overflow-y-auto no-scrollbar">
            
            <div class="space-y-1">
                <h2 class="text-4xl font-[900] text-[#D946EF] tracking-tight leading-none">Pesanan Saya</h2>
                <p class="text-xs font-bold text-gray-400">Lacak dan lihat riwayat pesanan Anda</p>
            </div>

            <div class="space-y-6">

                <div class="bg-white rounded-[28px] border border-gray-100 shadow-xl shadow-gray-100/40 p-4 space-y-4">
                    
                    <div class="bg-[#FDF2FF] rounded-2xl p-4 flex justify-between items-start relative">
                        <div class="space-y-1">
                            <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Nomor Pesanan</span>
                            <h3 class="text-base font-black text-gray-800 tracking-tight">ORD-1777431735925</h3>
                            <div class="flex items-center gap-1 text-[11px] font-bold text-gray-400 pt-0.5">
                                <span>📅</span> Rabu, 27 April 2026 pukul 09.31
                            </div>
                        </div>
                        <span class="bg-[#FEF3C7] text-[#D97706] text-[10px] font-bold px-2.5 py-0.5 rounded-md shadow-sm">
                            Pending
                        </span>
                    </div>

                    <div class="flex items-center justify-between gap-4 px-1">
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-14 bg-gray-50 rounded-xl overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Pensilcase Rajut">
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-gray-800 leading-tight">Pensilcase Rajut</h4>
                                <p class="text-xs font-bold text-gray-400 mt-0.5">Qty: 1</p>
                            </div>
                        </div>
                        <span class="text-base font-[900] text-[#9333EA]">Rp 50.000</span>
                    </div>

                    <div class="bg-[#F1F5F9] rounded-2xl p-4 space-y-1.5">
                        <h4 class="text-xs font-black text-gray-800">Informasi Pengiriman</h4>
                        <div class="space-y-1 text-[11px] font-medium text-gray-500">
                            <div class="flex items-center gap-1.5">
                                <span>📞</span> <span>08123456789</span>
                            </div>
                            <div class="flex items-start gap-1.5">
                                <span class="mt-0.5">📍</span> <span class="leading-tight">Jl. Mawar No.123, Jakarta Selatan</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-2 border-t border-gray-100 px-1">
                        <span class="text-sm font-black text-gray-800">Total Pembayaran</span>
                        <span class="text-lg font-[900] text-[#9333EA]">Rp 50.000</span>
                    </div>
                </div>

                <div class="bg-white rounded-[28px] border border-gray-100 shadow-xl shadow-gray-100/40 p-4 space-y-4">
                    
                    <div class="bg-[#FDF2FF] rounded-2xl p-4 flex justify-between items-start relative">
                        <div class="space-y-1">
                            <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Nomor Pesanan</span>
                            <h3 class="text-base font-black text-gray-800 tracking-tight">ORD-1735603200000</h3>
                            <div class="flex items-center gap-1 text-[11px] font-bold text-gray-400 pt-0.5">
                                <span>📅</span> Senin, 04 Mei 2026 pukul 10.15
                            </div>
                        </div>
                        <span class="bg-[#10B981] text-white text-[10px] font-bold px-2.5 py-0.5 rounded-md shadow-sm">
                            Selesai
                        </span>
                    </div>

                    <div class="flex items-center justify-between gap-4 px-1">
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-14 bg-gray-50 rounded-xl overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38?q=80&w=200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Slingbag Rajut">
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-gray-800 leading-tight">Slingbag Rajut</h4>
                                <p class="text-xs font-bold text-gray-400 mt-0.5">Qty: 2</p>
                            </div>
                        </div>
                        <span class="text-base font-[900] text-[#9333EA]">Rp 70.000</span>
                    </div>

                    <div class="bg-[#F1F5F9] rounded-2xl p-4 space-y-1.5">
                        <h4 class="text-xs font-black text-gray-800">Informasi Pengiriman</h4>
                        <div class="space-y-1 text-[11px] font-medium text-gray-500">
                            <div class="flex items-center gap-1.5">
                                <span>📞</span> <span>08753773000285</span>
                            </div>
                            <div class="flex items-start gap-1.5">
                                <span class="mt-0.5">📍</span> <span class="leading-tight">Jl. Pahlawan No.47, Surabaya</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-2 border-t border-gray-100 px-1">
                        <span class="text-sm font-black text-gray-800">Total Pembayaran</span>
                        <span class="text-lg font-[900] text-[#9333EA]">Rp 140.000</span>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>