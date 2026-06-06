<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght=400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center" 
      x-data="{ 
          openModalStore: false, 
          openModalEdit: false, 
          fileName: 'Pilih file...',
          editAction: '',
          editName: '',
          editPrice: '',
          editStock: ''
      }">

    <div class="w-full max-w-7xl mx-auto bg-white min-h-screen shadow-2xl relative flex flex-col">
        
        <header class="bg-white border-b border-gray-100 px-6 py-5 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-2xl font-[900] text-[#9333EA] tracking-tighter leading-none">Produk</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </header>

        <main class="p-6 space-y-6 flex-grow mb-24 relative z-10">
            
            <button @click="openModalStore = true; fileName = 'Pilih file...'" class="relative z-30 flex justify-center items-center w-full py-4 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-lg rounded-2xl shadow-lg shadow-purple-100 hover:scale-[1.01] active:scale-95 transition cursor-pointer">
                + Tambah Produk
            </button>

            @if(session('success'))
    <div x-data="{ show: true }" 
         x-init="setTimeout(() => show = false, 3000)" 
         x-show="show"
         x-transition.duration.500ms
         class="bg-emerald-50 border border-emerald-100 text-emerald-600 text-xs font-bold p-4 rounded-2xl text-center shadow-sm">
        {{ session('success') }}
    </div>
@endif

            <div class="space-y-4">
                @forelse($daftarProduk as $item)
                    @php
                        $primaryKey = $item->id_produk;
                        $namaProduk = $item->nama_produk;
                        $hargaProduk = $item->harga;
                        $stokProduk = $item->stok;
                        $gambarProduk = $item->foto_produk; // <--- PEMBETULAN VARIABEL BLADE

                        $words = explode(' ', $namaProduk);
                        $code = '';
                        foreach ($words as $w) { $code .= substr($w, 0, 1); }
                        $code = strtoupper(substr($code, 0, 2));
                    @endphp

                    <div class="bg-white p-4 rounded-[32px] shadow-sm border border-gray-50 flex items-center gap-4 relative">
                        
                        <div class="w-20 h-20 bg-purple-50 rounded-2xl flex items-center justify-center border border-purple-100 overflow-hidden shrink-0">
                            @if($gambarProduk)
                                <img src="{{ asset('storage/' . $gambarProduk) }}" class="w-full h-full object-cover" onerror="this.onerror=null; this.parentElement.innerHTML='<span class=\'text-[#9333EA] font-black text-xl\'>{{ $code }}</span>';">
                            @else
                                <span class="text-[#9333EA] font-black text-xl">{{ $code }}</span>
                            @endif
                        </div>
                        
                        <div class="flex-1 min-w-0">
                            <h4 class="font-[900] text-gray-800 text-sm tracking-tight truncate leading-none">{{ $namaProduk }}</h4>
                            <p class="text-sm font-[900] text-[#9333EA] mt-1">Rp {{ number_format($hargaProduk, 0, ',', '.') }}</p>
                            <p class="text-[10px] font-bold text-gray-400 mt-1 uppercase tracking-wider">Stok: {{ $stokProduk }}</p>
                        </div>

                        <div class="flex flex-col gap-2 shrink-0">
                            <button @click="
                                editAction = '{{ route('products.update', $primaryKey) }}';
                                editName = '{{ $namaProduk }}';
                                editPrice = '{{ $hargaProduk }}';
                                editStock = '{{ $stokProduk }}';
                                fileName = 'Tetap pakai file lama...';
                                openModalEdit = true;
                            " class="bg-[#5C7CFA] text-white p-2 rounded-xl shadow-sm hover:bg-blue-600 active:scale-95 transition cursor-pointer">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" /></svg>
                            </button>

                            <form action="{{ route('products.destroy', $primaryKey) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk {{ $namaProduk }} ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-[#FF6B6B] text-white p-2 rounded-xl shadow-sm hover:bg-red-600 active:scale-95 transition cursor-pointer">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9z" clip-rule="evenodd" /></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-16 bg-white border border-gray-100 rounded-[32px] p-6 shadow-sm">
                        <div class="inline-flex bg-purple-50 p-4 rounded-full text-[#9333EA] mb-3">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                        </div>
                        <h5 class="font-black text-gray-700 text-sm">Belum Ada Produk</h5>
                    </div>
                @endforelse
            </div>
        </main>

        <div x-show="openModalStore" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-6 bg-black/50 backdrop-blur-sm">
            <div @click.away="openModalStore = false" class="bg-white w-full max-w-sm rounded-[40px] p-8 shadow-2xl relative">
                <button @click="openModalStore = false" class="absolute top-8 right-8 text-gray-400 hover:text-gray-600 transition"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                <h3 class="text-2xl font-[900] text-[#9333EA] mb-6">Tambah Produk</h3>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Nama Produk</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:ring-2 focus:ring-purple-500 bg-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Harga</label>
                        <input type="number" name="price" required class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:ring-2 focus:ring-purple-500 bg-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Stok</label>
                        <input type="number" name="stock" required class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:ring-2 focus:ring-purple-500 bg-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Upload Gambar</label>
                        <div class="relative group">
                            <input type="file" name="image" @change="fileName = $event.target.files[0].name" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                            <div class="w-full px-4 py-3 rounded-xl border border-gray-200 flex justify-between items-center group-hover:border-purple-300 bg-transparent">
                                <span class="text-xs text-gray-400 truncate pr-2" x-text="fileName">Pilih file...</span>
                                <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full py-3.5 mt-2 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-black text-md rounded-2xl shadow-md active:scale-95 transition">Tambah Produk</button>
                </form>
            </div>
        </div>

        <div x-show="openModalEdit" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-6 bg-black/50 backdrop-blur-sm">
            <div @click.away="openModalEdit = false" class="bg-white w-full max-w-sm rounded-[40px] p-8 shadow-2xl relative">
                <button @click="openModalEdit = false" class="absolute top-8 right-8 text-gray-400 hover:text-gray-600 transition"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                <h3 class="text-2xl font-[900] text-[#5C7CFA] mb-6">Ubah Data Produk</h3>
                <form :action="editAction" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Nama Produk</label>
                        <input type="text" name="name" x-model="editName" required class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:ring-2 focus:ring-blue-500 bg-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Harga</label>
                        <input type="number" name="price" x-model="editPrice" required class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:ring-2 focus:ring-blue-500 bg-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Stok</label>
                        <input type="number" name="stock" x-model="editStock" required class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:ring-2 focus:ring-blue-500 bg-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Ganti Gambar (Opsional)</label>
                        <div class="relative group">
                            <input type="file" name="image" @change="fileName = $event.target.files[0].name" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                            <div class="w-full px-4 py-3 rounded-xl border border-gray-200 flex justify-between items-center group-hover:border-blue-300 bg-transparent">
                                <span class="text-xs text-gray-400 truncate pr-2" x-text="fileName">Pilih file baru...</span>
                                <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H18" /></svg>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full py-3.5 mt-2 bg-gradient-to-r from-[#5C7CFA] to-[#3b5bdb] text-white font-black text-md rounded-2xl shadow-md active:scale-95 transition">Simpan Perubahan</button>
                </form>
            </div>
        </div>

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