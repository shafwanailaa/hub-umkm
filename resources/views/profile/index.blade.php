<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil & Pengaturan - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-[#FAFAFC] min-h-screen shadow-2xl relative flex flex-col" 
         x-data="{ 
            isEditing: false, 
            profilePhoto: null,
            // Data simulasi (nanti diambil dari backend)
            user: {
                name: 'Lintang Kejora',
                email: 'lintangkejora23@gmail.com',
                phone: '081234567890',
                business: 'Toko Saya',
                address: 'Jl. Contoh No. 123'
            },
            // Fungsi untuk preview foto yang dipilih
            previewPhoto(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => { this.profilePhoto = e.target.result; };
                    reader.readAsDataURL(file);
                }
            }
         }">
        
        <header class="bg-white border-b border-gray-100 px-6 py-5 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-xl font-[900] text-[#9333EA] tracking-tighter leading-none">Profil & Pengaturan</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-red-500 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </header>

        <main class="p-4 space-y-4 flex-grow mb-24 overflow-y-auto no-scrollbar">
            
            <div class="bg-gradient-to-br from-[#7C3AED] to-[#C084FC] p-6 rounded-[28px] text-white shadow-md relative overflow-hidden flex items-center gap-4">
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full"></div>
                <div class="absolute -left-4 -top-4 w-20 h-20 bg-white/10 rounded-full"></div>

                <div class="relative flex-shrink-0">
                    <div class="w-20 h-20 rounded-full border-2 border-white/40 flex items-center justify-center bg-white/10 overflow-hidden relative">
                        <template x-if="profilePhoto">
                            <img :src="profilePhoto" class="w-full h-full object-cover">
                        </template>
                        <template x-if="!profilePhoto">
                            <svg class="w-12 h-12 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </template>
                    </div>
                    
                    <input type="file" id="photoInput" class="hidden" accept="image/*" @change="previewPhoto">
                    
                    <label for="photoInput" class="absolute bottom-0 right-0 bg-white p-1.5 rounded-full shadow-md text-[#9333EA] hover:scale-105 transition cursor-pointer z-20">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </label>
                </div>

                <div class="z-10 truncate">
                    <h3 class="text-2xl font-[900] tracking-tight leading-none mb-1 truncate" x-text="user.name"></h3>
                    <p class="text-xs font-medium text-white/80 mb-2 truncate" x-text="user.email"></p>
                    <div class="flex items-center gap-1.5 bg-white/20 px-2.5 py-1 rounded-xl w-fit backdrop-blur-sm border border-white/10">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span class="text-[10px] font-bold tracking-wide" x-text="user.business"></span>
                    </div>
                </div>
            </div>

            <form action="#" method="POST" class="bg-white p-5 rounded-[28px] border border-gray-100 shadow-sm space-y-4">
                @csrf
                <div class="flex justify-between items-center pb-2">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#9333EA]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <h4 class="text-base font-black text-gray-800 tracking-tight">Informasi Bisnis</h4>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <button type="button" x-show="isEditing" x-cloak @click="isEditing = false" class="bg-gray-100 text-gray-500 p-1.5 rounded-full hover:bg-gray-200 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>

                        <button type="button" 
                                @click="if(isEditing) { /* Logika simpan backend di sini */; isEditing = false; } else { isEditing = true; }"
                                :class="isEditing ? 'bg-green-500 shadow-green-100' : 'bg-[#9333EA] shadow-purple-100'"
                                class="text-white px-4 py-1.5 rounded-xl text-xs font-black shadow-sm active:scale-95 transition flex items-center gap-1.5">
                            <template x-if="!isEditing">
                                <span>Edit Profil</span>
                            </template>
                            <template x-if="isEditing">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" /></svg>
                                    Simpan Perubahan
                                </span>
                            </template>
                        </button>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-[#1E3A8A] tracking-tight">Nama Pemilik</label>
                        <input type="text" name="name" x-model="user.name" :readonly="!isEditing" 
                               :class="isEditing ? 'bg-white border-gray-300 focus:border-purple-400 focus:ring-1 focus:ring-purple-100' : 'bg-[#F8FAFC] border-gray-200'"
                               class="w-full mt-1 px-4 py-3 border rounded-xl text-sm font-medium text-gray-700 outline-none transition-all duration-200">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-[#1E3A8A] tracking-tight">Email</label>
                        <input type="email" name="email" x-model="user.email" :readonly="!isEditing"
                               :class="isEditing ? 'bg-white border-gray-300 focus:border-purple-400 focus:ring-1 focus:ring-purple-100' : 'bg-[#F8FAFC] border-gray-200'"
                               class="w-full mt-1 px-4 py-3 border rounded-xl text-sm font-medium text-gray-700 outline-none transition-all duration-200">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-[#1E3A8A] tracking-tight">Nama Bisnis</label>
                        <input type="text" name="business" x-model="user.business" :readonly="!isEditing"
                               :class="isEditing ? 'bg-white border-gray-300 focus:border-purple-400 focus:ring-1 focus:ring-purple-100' : 'bg-[#F8FAFC] border-gray-200'"
                               class="w-full mt-1 px-4 py-3 border rounded-xl text-sm font-medium text-gray-700 outline-none transition-all duration-200">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-[#1E3A8A] tracking-tight">Alamat Bisnis</label>
                        <textarea name="address" x-model="user.address" :readonly="!isEditing"
                                  :class="isEditing ? 'bg-white border-gray-300 focus:border-purple-400 focus:ring-1 focus:ring-purple-100' : 'bg-[#F8FAFC] border-gray-200'"
                                  class="w-full mt-1 px-4 py-3 border rounded-xl text-sm font-medium text-gray-700 outline-none transition-all duration-200 h-24 resize-none"></textarea>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-[#1E3A8A] tracking-tight">Nomor Telepon</label>
                        <input type="tel" name="phone" x-model="user.phone" :readonly="!isEditing"
                               :class="isEditing ? 'bg-white border-gray-300 focus:border-purple-400 focus:ring-1 focus:ring-purple-100' : 'bg-[#F8FAFC] border-gray-200'"
                               class="w-full mt-1 px-4 py-3 border rounded-xl text-sm font-medium text-gray-700 outline-none transition-all duration-200">
                    </div>
                </div>
            </form>
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