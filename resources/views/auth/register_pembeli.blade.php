<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Pembeli - HubUMKM</title>
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <h2 class="text-2xl font-[900] text-gray-800 tracking-tight">Daftar Akun Pembeli</h2>
            <p class="text-xs font-medium text-gray-400">Buat akun untuk mulai mengisi keranjang belanja Anda</p>
        </div>

        <form action="{{ route('pembeli.register.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="space-y-1">
                <label for="name" class="text-xs font-bold text-gray-500 pl-1">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full bg-gray-50 border border-gray-100 px-4 py-3.5 rounded-2xl text-xs font-medium text-gray-700 focus:outline-none focus:border-[#9333EA] focus:bg-white transition-all placeholder-gray-300"
                    placeholder="Nama lengkap Anda">
                @error('name')
                    <p class="text-[11px] text-red-500 font-bold pl-1 mt-0.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1">
                <label for="email" class="text-xs font-bold text-gray-500 pl-1">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full bg-gray-50 border border-gray-100 px-4 py-3.5 rounded-2xl text-xs font-medium text-gray-700 focus:outline-none focus:border-[#9333EA] focus:bg-white transition-all placeholder-gray-300"
                    placeholder="nama@email.com">
                @error('email')
                    <p class="text-[11px] text-red-500 font-bold pl-1 mt-0.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1">
                <label for="password" class="text-xs font-bold text-gray-500 pl-1">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full bg-gray-50 border border-gray-100 px-4 py-3.5 rounded-2xl text-xs font-medium text-gray-700 focus:outline-none focus:border-[#9333EA] focus:bg-white transition-all placeholder-gray-300"
                    placeholder="Minimal 8 karakter">
                @error('password')
                    <p class="text-[11px] text-red-500 font-bold pl-1 mt-0.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1">
                <label for="password_confirmation" class="text-xs font-bold text-gray-500 pl-1">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full bg-gray-50 border border-gray-100 px-4 py-3.5 rounded-2xl text-xs font-medium text-gray-700 focus:outline-none focus:border-[#9333EA] focus:bg-white transition-all placeholder-gray-300"
                    placeholder="Ulangi password Anda">
            </div>

            <button type="submit" 
                class="w-full py-4 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-sm rounded-2xl shadow-lg shadow-purple-100 hover:scale-[1.01] active:scale-95 transition-all uppercase tracking-wide">
                Daftar Akun Baru
            </button>

            <div class="relative flex items-center py-1">
                <div class="flex-grow border-t border-gray-100"></div>
                <span class="flex-shrink mx-4 text-[10px] font-black text-gray-300 uppercase tracking-widest">ATAU</span>
                <div class="flex-grow border-t border-gray-100"></div>
            </div>

            <a href="{{ route('auth.google', ['role' => 'pembeli']) }}" class="w-full py-3.5 bg-white border border-gray-100 text-gray-700 font-black text-xs rounded-xl flex items-center justify-center gap-3 hover:bg-gray-50 transition-all active:scale-95 shadow-sm decoration-none">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-4 h-4">
                GOOGLE
            </a>
        </form>

        <div class="text-center pt-2 border-t border-gray-50">
            <p class="text-xs font-medium text-gray-400">
                Sudah punya akun pembeli? 
                <a href="{{ route('pembeli.login') }}" class="text-[#9333EA] font-bold hover:underline">Masuk di sini</a>
            </p>
        </div>

    </div>

</body>
</html>