<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col" 
         x-data="{ 
            items: [
                { id: 1, name: 'Pensilcase Rajut', price: 50000, qty: 1, image: 'https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=200&auto=format&fit=crop' },
                { id: 2, name: 'Slingbag Rajut', price: 70000, qty: 1, image: 'https://images.unsplash.com/photo-1513519245088-0e12902e5a38?q=80&w=200&auto=format&fit=crop' }
            ],
            get totalItem() {
                return this.items.reduce((sum, item) => sum + item.qty, 0);
            },
            get subtotal() {
                return this.items.reduce((sum, item) => sum + (item.price * item.qty), 0);
            },
            formatRupiah(val) {
                return 'Rp ' + val.toLocaleString('id-ID');
            },
            removeItem(id) {
                this.items = this.items.filter(item => item.id !== id);
            }
         }">
        
        <header class="bg-[#FDF2FF] border-b border-gray-100 px-5 py-4 flex justify-between items-center sticky top-0 z-50">
            <div class="flex items-center gap-3">
                <div class="bg-[#9333EA] p-2.5 rounded-xl text-white shadow-md shadow-purple-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-[900] text-[#9333EA] tracking-tight leading-none mb-1">Keranjang</h1>
                    <p class="text-xs font-bold text-gray-400" x-text="items.length + ' item'"></p>
                </div>
            </div>

            <a href="javascript:history.back()" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </header>

        <main class="p-5 space-y-4 flex-grow overflow-y-auto no-scrollbar mb-44">
            
            <template x-if="items.length === 0">
                <div class="text-center py-20 space-y-3">
                    <span class="text-5xl block">🛒</span>
                    <h3 class="font-bold text-gray-400">Keranjang belanja Anda kosong</h3>
                </div>
            </template>

            <template x-for="item in items" :key="item.id">
                <div class="bg-[#F8FAFC] rounded-[24px] p-4 flex items-center justify-between border border-gray-50 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 rounded-xl overflow-hidden bg-gray-200 flex-shrink-0">
                            <img :src="item.image" class="w-full h-full object-cover" :alt="item.name">
                        </div>
                        
                        <div class="space-y-1.5">
                            <h4 class="font-bold text-gray-800 text-sm tracking-tight" x-text="item.name"></h4>
                            <p class="text-sm font-[900] text-[#9333EA]" x-text="formatRupiah(item.price)"></p>
                            
                            <div class="flex items-center gap-3 pt-0.5">
                                <button @click="if(item.qty > 1) item.qty--" class="w-6 h-6 bg-white border border-gray-200 rounded-md flex items-center justify-center font-black text-gray-500 hover:bg-gray-50 active:scale-90 transition">-</button>
                                <span class="text-xs font-black text-gray-800 w-4 text-center" x-text="item.qty"></span>
                                <button @click="item.qty++" class="w-6 h-6 bg-white border border-gray-200 rounded-md flex items-center justify-center font-black text-gray-500 hover:bg-gray-50 active:scale-90 transition">+</button>
                            </div>
                        </div>
                    </div>

                    <button @click="removeItem(item.id)" class="text-red-400 hover:text-red-600 transition p-2 active:scale-90">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </template>

        </main>

        <footer class="absolute bottom-0 left-0 right-0 bg-[#FDF2FF] border-t border-purple-100 p-5 space-y-4 rounded-t-[32px] shadow-[0_-10px_30px_rgba(147,51,234,0.03)] z-50">
            <div class="space-y-2 px-1">
                <div class="flex justify-between items-center text-xs font-bold text-gray-400">
                    <span>Subtotal</span>
                    <span class="text-gray-800" x-text="formatRupiah(subtotal)"></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-base font-black text-gray-800">Total</span>
                    <span class="text-lg font-[900] text-[#9333EA]" x-text="formatRupiah(subtotal)"></span>
                </div>
            </div>

            <a href="{{ route('checkout.index') }}" class="block w-full py-4 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-base rounded-2xl shadow-lg shadow-purple-200/50 hover:scale-[1.01] active:scale-95 transition-all tracking-wide text-center">
                Checkout
            </a>
        </footer>

    </div>

</body>
</html>