<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajahi Toko UMKM - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#FDFDFC] antialiased">

    <div class="max-w-7xl mx-auto px-6 py-4">
        <!-- HEADER (Logo, Pencarian, Keranjang) -->
        <header class="flex justify-between items-center mb-10 pb-4 border-b border-gray-100">
            <div class="flex items-center gap-2">
                <div class="bg-[#9333EA] p-2 rounded-lg text-white font-black">🏪</div>
                <h1 class="text-2xl font-[900] text-[#9333EA]">HubUMKM</h1>
            </div>
            <div class="flex items-center gap-4">
                <button class="text-gray-400">🔍</button>
                <a href="{{ route('cart.index') }}" class="bg-purple-600 text-white p-3 rounded-full shadow-lg">🛒</a>
            </div>
        </header>

        <!-- JUDUL -->
        <div class="mb-10">
            <h2 class="text-3xl font-[900] text-[#9333EA] tracking-tight mb-2">Jelajahi Toko UMKM</h2>
            <p class="text-gray-400 font-bold text-sm">Dukung UMKM Indonesia dengan berbelanja langsung dari pemilik usaha</p>
        </div>

        <!-- GRID 3 KOLOM -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Kartu Toko 1 -->
            <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm p-4 space-y-4">
                <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38?q=80&w=600" class="w-full h-44 object-cover rounded-2xl">
                <div class="px-2 space-y-2">
                    <h3 class="text-xl font-[900] text-gray-800">Rumah Anyaman</h3>
                    <p class="text-xs text-gray-400 leading-relaxed">Kerajinan anyaman berkualitas desain modern.</p>
                    <div class="flex items-center gap-4 text-xs font-bold text-gray-400 pt-1">
                        <span>★ 4.8</span> <span>📦 10 Produk</span> <span>📍 Bogor</span>
                    </div>
                </div>
                <a href="{{ route('toko.detail') }}" class="block w-full py-3 bg-purple-600 text-white font-black text-sm rounded-2xl text-center hover:bg-purple-700 transition">KUNJUNGI TOKO</a>
            </div>

            <!-- Kartu Toko 2 -->
            <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm p-4 space-y-4">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=600" class="w-full h-44 object-cover rounded-2xl">
                <div class="px-2 space-y-2">
                    <h3 class="text-xl font-[900] text-gray-800">Santapan Mantap</h3>
                    <p class="text-xs text-gray-400 leading-relaxed">Makanan lezat dengan cita rasa khas rumahan.</p>
                    <div class="flex items-center gap-4 text-xs font-bold text-gray-400 pt-1">
                        <span>★ 4.9</span> <span>📦 20 Produk</span> <span>📍 Surabaya</span>
                    </div>
                </div>
                <a href="#" class="block w-full py-3 bg-purple-600 text-white font-black text-sm rounded-2xl text-center hover:bg-purple-700 transition">KUNJUNGI TOKO</a>
            </div>

            <!-- Kartu Toko 3 -->
            <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm p-4 space-y-4">
                <img src="https://images.unsplash.com/photo-1532372320978-9b4d7a92b24d?q=80&w=600" class="w-full h-44 object-cover rounded-2xl">
                <div class="px-2 space-y-2">
                    <h3 class="text-xl font-[900] text-gray-800">Roemah Rotan</h3>
                    <p class="text-xs text-gray-400 leading-relaxed">Furniture rotan elegan untuk dekorasi rumah.</p>
                    <div class="flex items-center gap-4 text-xs font-bold text-gray-400 pt-1">
                        <span>★ 4.7</span> <span>📦 15 Produk</span> <span>📍 Jepara</span>
                    </div>
                </div>
                <a href="#" class="block w-full py-3 bg-purple-600 text-white font-black text-sm rounded-2xl text-center hover:bg-purple-700 transition">KUNJUNGI TOKO</a>
            </div>

        </div>
    </div>
</body>
</html>