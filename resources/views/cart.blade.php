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

    <form action="{{ route('checkout.index') }}" method="GET" class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col" 
          x-data="{ 
            // DI-RESET: Mengosongkan data toko dan barang bawaan agar mendeteksi akun baru tanpa aktivitas
            stores: [],
            
            // State untuk menyimpan ID item yang dicentang pembeli
            checkedItems: [], 

            // Helper: Menggabungkan semua item dari semua toko menjadi satu list datar
            get allItems() {
                let list = [];
                this.stores.forEach(store => {
                    store.items.forEach(item => list.push(item));
                });
                return list;
            },

            // Menghitung total jumlah barang yang sedang diceklis
            get totalItem() {
                return this.allItems.filter(item => this.checkedItems.includes(item.id))
                                     .reduce((sum, item) => sum + item.qty, 0);
            },

            // Menghitung subtotal harga dari barang yang diceklis saja
            get subtotal() {
                return this.allItems.filter(item => this.checkedItems.includes(item.id))
                                     .reduce((sum, item) => sum + (item.price * item.qty), 0);
            },

            formatRupiah(val) {
                return 'Rp ' + val.toLocaleString('id-ID');
            },

            // Fungsi inisialisasi awal
            init() {
                let allIds = [];
                this.stores.forEach(store => {
                    store.items.forEach(item => allIds.push(item.id));
                });
                this.checkedItems = allIds;
            }
          }">
        @csrf
        
        <header class="bg-[#FDF2FF] border-b border-gray-100 px-5 py-4 flex justify-between items-center sticky top-0 z-50">
            <div class="flex items-center gap-3">
                <div class="bg-[#9333EA] p-2.5 rounded-xl text-white shadow-md shadow-purple-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-[900] text-[#9333EA] tracking-tight leading-none mb-1">Keranjang</h1>
                    <p class="text-xs font-bold text-gray-400" x-text="allItems.length + ' item'"></p>
                </div>
            </div>

            <a href="javascript:history.back()" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </header>

        <main class="p-5 space-y-5 flex-grow overflow-y-auto no-scrollbar mb-44">
            
            <template x-if="stores.length === 0 || stores.every(s => s.items.length === 0)">
                <div class="text-center py-20 space-y-3">
                    <span class="text-5xl block">🛒</span>
                    <h3 class="font-bold text-gray-400">Keranjang belanja Anda kosong</h3>
                </div>
            </template>

            <template x-for="store in stores" :key="store.id">
                <template x-if="store.items.length > 0">
                    <div class="bg-white border border-gray-100 rounded-[28px] p-4 shadow-sm space-y-3">
                        
                        <div class="flex items-center gap-2 pb-2 border-b border-gray-50">
                            <span class="text-sm">🏪</span>
                            <h3 class="font-black text-xs text-gray-700 uppercase tracking-wider" x-text="store.name"></h3>
                        </div>

                        <div class="space-y-3">
                            <template x-for="item in store.items" :key="item.id">
                                <div class="bg-[#F8FAFC] rounded-[20px] p-3 flex items-center justify-between border border-gray-50/50 gap-2">
                                    <div class="flex items-center gap-3 flex-grow">
                                        
                                        <input type="checkbox" 
                                               name="selected_items[]" 
                                               :value="item.id" 
                                               x-model="checkedItems"
                                               class="w-5 h-5 rounded-lg border-gray-200 text-[#9333EA] focus:ring-[#9333EA] accent-[#9333EA] cursor-pointer flex-shrink-0">

                                        <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-200 flex-shrink-0">
                                            <img :src="item.image" class="w-full h-full object-cover" :alt="item.name">
                                        </div>
                                        
                                        <div class="space-y-1 flex-grow">
                                            <h4 class="font-bold text-gray-800 text-sm tracking-tight leading-tight" x-text="item.name"></h4>
                                            <p class="text-xs font-[900] text-[#9333EA]" x-text="formatRupiah(item.price)"></p>
                                            
                                            <div class="flex items-center gap-2 pt-1">
                                                <button type="button" @click="if(item.qty > 1) item.qty--" class="w-5 h-5 bg-white border border-gray-200 rounded-md flex items-center justify-center font-black text-gray-500 text-xs hover:bg-gray-50 active:scale-90 transition">-</button>
                                                <span class="text-xs font-black text-gray-800 w-4 text-center" x-text="item.qty"></span>
                                                <button type="button" @click="item.qty++" class="w-5 h-5 bg-white border border-gray-200 rounded-md flex items-center justify-center font-black text-gray-500 text-xs hover:bg-gray-50 active:scale-90 transition">+</button>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" 
                                            @click="
                                                store.items = store.items.filter(i => i.id !== item.id);
                                                checkedItems = checkedItems.filter(id => id !== item.id);
                                            " 
                                            class="text-red-400 hover:text-red-600 transition p-2 active:scale-90 flex-shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>

                    </div>
                </template>
            </template>

        </main>

        <footer class="absolute bottom-0 left-0 right-0 bg-[#FDF2FF] border-t border-purple-100 p-5 space-y-4 rounded-t-[32px] shadow-[0_-10px_30px_rgba(147,51,234,0.03)] z-50">
            <div class="space-y-2 px-1">
                <div class="flex justify-between items-center text-xs font-bold text-gray-400">
                    <span>Subtotal (<span x-text="totalItem"></span> barang terpilih)</span>
                    <span class="text-gray-800" x-text="formatRupiah(subtotal)"></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-base font-black text-gray-800">Total</span>
                    <span class="text-lg font-[900] text-[#9333EA]" x-text="formatRupiah(subtotal)"></span>
                </div>
            </div>

            <button type="submit" 
                    :disabled="checkedItems.length === 0"
                    :class="checkedItems.length === 0 ? 'opacity-50 cursor-not-allowed bg-gray-300 shadow-none' : 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] shadow-purple-200/50 hover:scale-[1.01] active:scale-95'"
                    class="block w-full py-4 text-white font-[900] text-base rounded-2xl shadow-lg transition-all tracking-wide text-center uppercase">
                Checkout Terpilih
            </button>
        </footer>

    </form>

</body>
</html>