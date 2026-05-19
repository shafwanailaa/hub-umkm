<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HubUMKM - Kelola Bisnis Lebih Mudah</title>
    <!-- Menggunakan CDN Tailwind CSS untuk kemudahan -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased bg-[#FDF2F8]">
    <!-- Container Utama dengan Gradasi Sesuai Gambar -->
    <div class="min-h-screen bg-gradient-to-b from-white via-[#FDF2F8] to-[#F5D0FE] flex flex-col items-center px-6">
        
        <!-- Header / Navigation -->
        <header class="w-full max-w-md flex justify-between items-center py-6">
            <div class="flex items-center gap-2">
                <!-- Ikon Toko Sesuai Gambar -->
                <div class="bg-[#9333EA] p-1.5 rounded-lg shadow-sm">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3L4 9v12h16V9l-8-6zm0 2.5L18 10v9H6v-9l6-4.5zM9 12v5h6v-5H9z"/>
                    </svg>
                </div>
                <span class="text-2xl font-black text-[#9333EA] tracking-tight">HubUMKM</span>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('login') }}" class="bg-gray-100 text-gray-600 px-5 py-2 rounded-xl text-sm font-bold hover:bg-gray-200 transition">Masuk</a>
                <a href="{{ route('register') }}" class="bg-[#9333EA] text-white px-5 py-2 rounded-xl text-sm font-bold shadow-md shadow-purple-200 hover:bg-[#7e22ce] transition">Daftar</a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="mt-12 text-center max-w-md flex flex-col items-center">
            
            <!-- Badge Platform Terpercaya -->
            <div class="inline-flex items-center gap-2 bg-white/60 backdrop-blur-md border border-purple-200 px-4 py-2 rounded-full mb-10 shadow-sm">
                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <span class="text-[10px] md:text-[11px] text-purple-800 font-bold uppercase tracking-wider">Platform Terpercaya untuk UMKM Indonesia</span>
            </div>

            <!-- Headline Utama -->
            <h1 class="text-4xl md:text-5xl font-black text-[#1F2937] leading-[1.1] mb-8">
                <span class="text-[#9333EA]">Kelola Bisnis</span> <br> 
                Lebih Mudah & Efisien
            </h1>

            <!-- Deskripsi -->
            <p class="text-gray-500 text-sm md:text-base leading-relaxed px-4 mb-12 font-medium">
                Platform manajemen bisnis all-in-one yang dirancang khusus untuk UMKM. Dari pencatatan stok hingga laporan keuangan, semua dalam satu aplikasi.
            </p>

            <!-- Tombol CTA Sesuai Gambar -->
            <div class="flex items-stretch justify-center gap-4 mt-8 w-full max-w-sm px-4">
    
            <a href="{{ route('register') }}" class="flex-1 min-h-[72px] bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white text-sm font-black rounded-2xl shadow-lg shadow-purple-100 text-center hover:scale-[1.01] active:scale-95 transition-all flex items-center justify-center p-3 leading-tight tracking-wide">
                 <span>Mulai Sekarang<br>Gratis!</span>
             </a>

            <a href="{{ route('dashboard.pembeli') }}" class="flex-1 min-h-[72px] bg-[#F1F5F9] text-gray-900 text-sm font-black rounded-2xl shadow-lg shadow-gray-200/80 text-center hover:bg-[#E2E8F0] hover:scale-[1.01] active:scale-95 transition-all flex items-center justify-center p-3 border border-gray-100 tracking-wide">
                 <span>Jelajahi Toko</span>
             </a>

            </div>

            <!-- Statistik Section -->
            <div class="mt-20 w-full grid grid-cols-3 gap-4 border-t border-purple-200/50 pt-10">
                <div class="text-center">
                    <span class="block text-3xl font-black text-[#9333EA]">100%</span>
                    <span class="text-[11px] text-gray-500 font-bold uppercase tracking-widest mt-1">Gratis</span>
                </div>
                <div class="text-center border-x border-purple-100">
                    <span class="block text-3xl font-black text-[#9333EA]">24/7</span>
                    <span class="text-[11px] text-gray-500 font-bold uppercase tracking-widest mt-1">Akses</span>
                </div>
                <div class="text-center">
                    <span class="block text-3xl font-black text-[#9333EA]">Aman</span>
                    <span class="text-[11px] text-gray-500 font-bold uppercase tracking-widest mt-1">Terjamin</span>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="mt-auto py-10 text-center">
            <p class="text-[10px] text-gray-400 font-bold leading-relaxed uppercase tracking-tight">
                © 2026 HubUMKM. <br> 
                Platform manajemen bisnis untuk UMKM Indonesia.
            </p>
        </footer>
    </div>
</body>
</html>