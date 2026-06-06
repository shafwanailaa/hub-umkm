<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HubUMKM - Kelola Bisnis Lebih Mudah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased bg-[#FDF2F8]">
    
    <div class="min-h-screen bg-gradient-to-b from-white via-[#FDF2F8] to-[#F5D0FE] flex flex-col items-center px-6 md:px-12">
        
        <header class="w-full max-w-7xl flex justify-between items-center py-6 border-b border-purple-100/30">
            <div class="flex items-center gap-2">
                <div class="bg-[#9333EA] p-1.5 rounded-lg shadow-sm">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3L4 9v12h16V9l-8-6zm0 2.5L18 10v9H6v-9l6-4.5zM9 12v5h6v-5H9z"/>
                    </svg>
                </div>
                <span class="text-2xl font-black text-[#9333EA] tracking-tight">HubUMKM</span>
            </div>
            
            <div class="flex gap-2">
                <a href="/login" class="bg-gray-100 text-gray-600 px-5 py-2 rounded-xl text-sm font-bold hover:bg-gray-200 transition">Login Penjual</a>
                <a href="{{ route('pembeli.login') }}" class="bg-[#9333EA] text-white px-5 py-2 rounded-xl text-sm font-bold shadow-md shadow-purple-200 hover:bg-[#7e22ce] transition">Login Pembeli</a>
            </div>
        </header>

        <main class="mt-16 text-center max-w-4xl flex flex-col items-center flex-grow">
            
            <h1 class="text-4xl md:text-6xl font-black text-[#1F2937] leading-[1.1] mb-8 tracking-tight">
                <span class="text-[#9333EA]">Kelola Bisnis</span> <br class="hidden md:inline"> 
                Lebih Mudah & Efisien
            </h1>

            <p class="text-gray-500 text-sm md:text-lg leading-relaxed max-w-2xl px-4 mb-12 font-medium">
                Platform manajemen bisnis all-in-one yang dirancang khusus untuk UMKM. Dari pencatatan stok hingga laporan keuangan, semua dalam satu aplikasi.
            </p>

            <div class="flex flex-col md:flex-row items-stretch justify-center gap-4 mt-4 w-full max-w-sm md:max-w-md px-4">
                <a href="{{ route('pembeli.register') }}" class="flex-1 min-h-[64px] bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white text-sm font-black rounded-2xl shadow-lg shadow-purple-100 text-center hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center p-3 uppercase">
                    <span>Daftar Jadi Pembeli</span>
                </a>

                <a href="{{ route('dashboard.pembeli') }}" class="flex-1 min-h-[64px] bg-[#F1F5F9] text-gray-900 text-sm font-black rounded-2xl shadow-lg shadow-gray-200/80 text-center hover:bg-[#E2E8F0] hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center p-3 border border-gray-200 uppercase">
                    <span>Jelajahi Toko</span>
                </a>
            </div>

            <div class="mt-24 w-full max-w-3xl grid grid-cols-3 gap-4 border-t border-purple-200/50 pt-10 mb-16">
                <div class="text-center">
                    <span class="block text-3xl md:text-4xl font-black text-[#9333EA]">100%</span>
                    <span class="text-[10px] md:text-[11px] text-gray-400 font-bold uppercase tracking-widest mt-1">Gratis</span>
                </div>
                <div class="text-center border-x border-purple-200/50">
                    <span class="block text-3xl md:text-4xl font-black text-[#9333EA]">24/7</span>
                    <span class="text-[10px] md:text-[11px] text-gray-400 font-bold uppercase tracking-widest mt-1">Akses</span>
                </div>
                <div class="text-center">
                    <span class="block text-3xl md:text-4xl font-black text-[#9333EA]">Aman</span>
                    <span class="text-[10px] md:text-[11px] text-gray-400 font-bold uppercase tracking-widest mt-1">Terjamin</span>
                </div>
            </div>
        </main>

        <footer class="w-full py-8 text-center border-t border-purple-100/20 mt-auto">
            <p class="text-[10px] text-gray-400 font-bold leading-relaxed uppercase tracking-widest">
                © 2026 HubUMKM. Platform manajemen bisnis untuk UMKM Indonesia.
            </p>
        </footer>
    </div>
</body>
</html>