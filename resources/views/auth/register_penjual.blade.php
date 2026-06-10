<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Penjual - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center items-center min-h-screen p-4">

    <div class="w-full max-w-md bg-white rounded-[32px] border border-gray-100 shadow-2xl p-6 space-y-6">
        <div class="text-center space-y-2">
            <div class="inline-flex bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <h2 class="text-2xl font-[900] text-gray-800 tracking-tight">Daftar Akun Penjual</h2>
            <p class="text-xs font-medium text-gray-400">Daftarkan bisnis Anda dan mulai kelola workspace</p>
        </div>

        <form action="{{ route('register.penjual.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div class="space-y-1">
                <label class="text-xs font-bold text-gray-500 pl-1">Nama Bisnis / Toko</label>
                <input type="text" name="name" required class="w-full bg-gray-50 border border-gray-100 px-4 py-3.5 rounded-2xl text-xs font-medium text-gray-700 focus:outline-none focus:border-[#9333EA] transition" placeholder="Masukkan nama bisnis Anda">
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-gray-500 pl-1">Alamat Email</label>
                <input type="email" name="email" required class="w-full bg-gray-50 border border-gray-100 px-4 py-3.5 rounded-2xl text-xs font-medium text-gray-700 focus:outline-none focus:border-[#9333EA] transition" placeholder="nama@email.com">
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-gray-500 pl-1">Password</label>
                <input type="password" name="password" required class="w-full bg-gray-50 border border-gray-100 px-4 py-3.5 rounded-2xl text-xs font-medium text-gray-700 focus:outline-none focus:border-[#9333EA] transition" placeholder="Minimal 8 karakter">
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-gray-500 pl-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="w-full bg-gray-50 border border-gray-100 px-4 py-3.5 rounded-2xl text-xs font-medium text-gray-700 focus:outline-none focus:border-[#9333EA] transition" placeholder="Ulangi password">
            </div>

            <button type="submit" class="w-full py-4 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-sm rounded-2xl shadow-lg hover:scale-[1.01] transition-all uppercase tracking-wide">
                Daftar Akun Penjual
            </button>
        </form>
    </div>
</body>
</html>