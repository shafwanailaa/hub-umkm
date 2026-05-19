<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Anyaman - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col pb-8" 
         x-data="{ 
            cartCount: 6, 
            showModal: false,
            showChat: false,
            rating: 5,
            reviewText: '',
            chatText: '',
            reviews: [
                { name: 'Anita Anjani', date: '11/3/2026', stars: 5, text: 'Produk rajut memiliki desain yang unik, nyaman digunakan, dan dibuat dengan detail yang rapi.' }
            ],
            messages: [
                { sender: 'toko', text: 'Halo! Selamat datang di Rumah Anyaman. Ada yang bisa kami bantu mengenai produk rajut kami? 😊', time: '20.30' }
            ],
            submitReview() {
                if(this.reviewText.trim() === '') return;
                this.reviews.unshift({
                    name: 'Pembeli Setia',
                    date: new Date().toLocaleDateString('id-ID'),
                    stars: parseInt(this.rating),
                    text: this.reviewText
                });
                this.reviewText = '';
                this.rating = 5;
                this.showModal = false;
            },
            sendMessage() {
                if(this.chatText.trim() === '') return;
                
                // Tambah pesan pembeli ke room chat
                this.messages.push({
                    sender: 'pembeli',
                    text: this.chatText,
                    time: new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
                });
                
                this.chatText = '';
                
                // Simulasi auto-reply dari toko setelah 1 detik
                setTimeout(() => {
                    this.messages.push({
                        sender: 'toko',
                        text: 'Terima kasih pesannya! Admin kami akan segera membalas pertanyaan Anda dalam beberapa saat.',
                        time: new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
                    });
                }, 1000);
            }
         }">
        
        <header class="bg-white border-b border-gray-100 px-5 py-4 flex justify-between items-center sticky top-0 z-50">
            <a href="{{ route('dashboard.pembeli') }}" class="flex items-center gap-1 text-gray-500 hover:text-[#9333EA] transition text-xs font-bold">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Toko
            </a>

            <div class="flex items-center gap-2">
                <button @click="showChat = true" class="p-2 bg-gray-50 hover:bg-purple-50 text-gray-400 hover:text-[#9333EA] rounded-xl border border-gray-100 transition relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </button>
                
                <a href="{{ route('cart.index') }}" class="p-2 bg-[#9333EA] text-white rounded-xl shadow-md shadow-purple-100 relative hover:bg-[#8227ec] transition flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[9px] font-black w-5 h-5 rounded-full flex items-center justify-center border-2 border-white" x-text="cartCount"></span>
                </a>
            </div>
        </header>

        <main class="flex-grow overflow-y-auto no-scrollbar">
            
            <div class="relative w-full h-48 bg-gray-100">
                <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover" alt="Banner Rumah Anyaman">
                <div class="absolute -bottom-1 left-0 right-0 h-6 bg-white rounded-t-[32px]"></div>
            </div>

            <div class="px-4 relative -mt-10 z-10">
                <div class="bg-white rounded-[28px] border border-gray-100 shadow-xl shadow-gray-100/50 p-5 space-y-3">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 bg-white rounded-2xl p-1 shadow-md border border-gray-100 flex-shrink-0 flex items-center justify-center">
                            <div class="w-full h-full bg-[#F59E0B]/10 rounded-xl flex items-center justify-center text-[#F59E0B] font-black text-xs text-center p-1 leading-none border border-[#F59E0B]/20">
                                RMH ANYM
                            </div>
                        </div>
                        <div class="space-y-1">
                            <h2 class="text-xl font-[900] text-gray-800 tracking-tight leading-none">Rumah Anyaman</h2>
                            <p class="text-[11px] font-medium text-gray-400 leading-relaxed">Rumah Anyaman menyediakan berbagai kerajinan anyaman berkualitas dengan desain tradisional dan modern. Tersedia koleksi dekorasi rumah, tas, souvenir, dan perlengkapan handmade dengan harga terjangkau.</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 pt-1">
                        <span class="flex items-center gap-1 bg-yellow-50 text-yellow-600 border border-yellow-100 px-3 py-1 rounded-xl text-[10px] font-bold">
                            ★ 4.8 Ulasan
                        </span>
                        <span class="flex items-center gap-1 bg-purple-50 text-[#9333EA] border border-purple-100 px-3 py-1 rounded-xl text-[10px] font-bold">
                            📦 10 Produk
                        </span>
                        <span class="flex items-center gap-1 bg-blue-50 text-blue-600 border border-blue-100 px-3 py-1 rounded-xl text-[10px] font-bold">
                            📍 Bogor
                        </span>
                    </div>
                </div>
            </div>

            <div class="px-5 mt-6 space-y-4">
                <h3 class="text-2xl font-[900] text-[#9333EA] tracking-tighter">Produk Kami</h3>

                <div class="bg-white rounded-[28px] border border-gray-100 shadow-sm p-3 space-y-3">
                    <div class="w-full h-64 rounded-2xl overflow-hidden bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover" alt="Totebag Rajut">
                    </div>
                    <div class="px-1 space-y-1">
                        <h4 class="text-base font-[900] text-gray-800 tracking-tight leading-none">Totebag Rajut</h4>
                        <p class="text-lg font-[900] text-[#9333EA]">Rp 85.000</p>
                        <p class="text-xs font-bold text-gray-400">Stok : <span class="text-gray-700">5</span></p>
                    </div>
                    <button @click="cartCount++" class="w-full py-3.5 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-sm rounded-xl shadow-md shadow-purple-50 hover:scale-[1.01] active:scale-95 transition-all uppercase tracking-wide">
                        Tambah ke Keranjang
                    </button>
                </div>

                <div class="bg-white rounded-[28px] border border-gray-100 shadow-sm p-3 space-y-3">
                    <div class="w-full h-64 rounded-2xl overflow-hidden bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1627123424574-724758594e93?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover" alt="Dompet Rajut">
                    </div>
                    <div class="px-1 space-y-1">
                        <h4 class="text-base font-[900] text-gray-800 tracking-tight leading-none">Dompet Rajut</h4>
                        <p class="text-lg font-[900] text-[#9333EA]">Rp 45.000</p>
                        <p class="text-xs font-bold text-gray-400">Stok : <span class="text-gray-700">20</span></p>
                    </div>
                    <button @click="cartCount++" class="w-full py-3.5 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-sm rounded-xl shadow-md shadow-purple-50 hover:scale-[1.01] active:scale-95 transition-all uppercase tracking-wide">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

            <div class="px-5 mt-8 space-y-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-[900] text-[#9333EA] tracking-tighter">Ulasan Pelanggan</h3>
                    <button @click="showModal = true" class="bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white px-3 py-1.5 rounded-xl text-[10px] font-black shadow-md flex items-center gap-1 active:scale-95 transition">
                        📝 Beri Ulasan
                    </button>
                </div>

                <div class="space-y-3">
                    <template x-for="rev in reviews">
                        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm space-y-2">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center font-bold text-[#9333EA] text-xs" x-text="rev.name.substring(0,2).toUpperCase()"></div>
                                    <div>
                                        <h5 class="text-xs font-black text-gray-800" x-text="rev.name"></h5>
                                        <div class="text-yellow-400 text-[10px]" x-text="'★'.repeat(rev.stars) + '☆'.repeat(5-rev.stars)"></div>
                                    </div>
                                </div>
                                <span class="text-[9px] font-bold text-gray-300" x-text="rev.date"></span>
                            </div>
                            <p class="text-[11px] font-medium text-gray-400 leading-relaxed pl-1.5" x-text="rev.text"></p>
                        </div>
                    </template>
                </div>
            </div>
        </main>

        <div class="fixed inset-0 bg-black/40 z-50 flex items-end justify-center" 
             x-show="showChat" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-20"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-20"
             style="display: none;">
            
            <div class="bg-white rounded-t-[32px] w-full max-w-md h-[80vh] flex flex-col shadow-2xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-[#9333EA] to-[#E879F9] p-4 flex justify-between items-center text-white shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center font-black text-[#9333EA] text-sm shadow-sm border border-white/20">🏪</div>
                        <div>
                            <h4 class="text-sm font-black tracking-tight leading-none mb-1">Rumah Anyaman (Admin)</h4>
                            <span class="text-[10px] font-bold text-green-200 flex items-center gap-1">🟢 Online</span>
                        </div>
                    </div>
                    <button @click="showChat = false" class="bg-white/10 hover:bg-white/20 p-2 rounded-full text-white transition text-sm font-bold w-8 h-8 flex items-center justify-center">✕</button>
                </div>

                <div class="flex-grow p-4 overflow-y-auto space-y-3 bg-gray-50/50 no-scrollbar">
                    <template x-for="msg in messages">
                        <div :class="msg.sender === 'pembeli' ? 'flex justify-end' : 'flex justify-start'">
                            <div :class="msg.sender === 'pembeli' ? 'bg-[#9333EA] text-white rounded-2xl rounded-tr-none' : 'bg-white border border-gray-100 text-gray-800 rounded-2xl rounded-tl-none'" 
                                 class="max-w-[75%] p-3 shadow-sm space-y-1">
                                <p class="text-xs font-medium leading-relaxed" x-text="msg.text"></p>
                                <span :class="msg.sender === 'pembeli' ? 'text-purple-200' : 'text-gray-400'" class="text-[9px] font-bold block text-right" x-text="msg.time"></span>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="p-4 border-t border-gray-100 bg-white flex items-center gap-2">
                    <input type="text" x-model="chatText" @keydown.enter="sendMessage()" placeholder="Tulis pesan ke penjual..." class="flex-grow bg-gray-50 border border-gray-100 px-4 py-3 rounded-xl text-xs font-medium text-gray-700 focus:outline-none focus:border-[#9333EA] placeholder-gray-300">
                    <button @click="sendMessage()" class="p-3 bg-[#9333EA] hover:bg-[#8227ec] text-white rounded-xl shadow-md transition active:scale-95">
                        <svg class="w-4 h-4 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 transition-all" 
             x-show="showModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-90"
             style="display: none;">
            
            <div class="bg-white rounded-[28px] w-full max-w-sm p-6 space-y-4 shadow-2xl" @click.away="showModal = false">
                <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                    <h4 class="text-base font-black text-gray-800">Tulis Ulasan Toko</h4>
                    <button @click="showModal = false" class="text-gray-400 hover:text-gray-600 font-bold text-lg">✕</button>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-gray-400">Pilih Rating</label>
                    <select x-model="rating" class="w-full bg-gray-50 border border-gray-100 p-2.5 rounded-xl text-xs font-bold text-gray-700 focus:outline-none focus:border-[#9333EA]">
                        <option value="5">⭐⭐⭐⭐⭐ (5 - Sangat Puas)</option>
                        <option value="4">⭐⭐⭐⭐ (4 - Puas)</option>
                        <option value="3">⭐⭐⭐ (3 - Cukup)</option>
                        <option value="2">⭐⭐ (2 - Kurang)</option>
                        <option value="1">⭐ (1 - Kecewa)</option>
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-gray-400">Isi Ulasan Anda</label>
                    <textarea x-model="reviewText" rows="4" placeholder="Bagikan pengalaman belanja Anda di toko ini..." class="w-full bg-gray-50 border border-gray-100 p-3 rounded-xl text-xs font-medium text-gray-700 placeholder-gray-300 focus:outline-none focus:border-[#9333EA] resize-none"></textarea>
                </div>
                <button @click="submitReview()" class="w-full py-3 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-xs rounded-xl shadow-md shadow-purple-100 active:scale-95 transition-all uppercase tracking-wide">
                    Kirim Ulasan
                </button>
            </div>
        </div>

    </div>

</body>
</html>