<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center items-center min-h-screen p-4">

    <div class="w-full max-w-md bg-white rounded-[32px] border border-gray-100 shadow-2xl p-8 space-y-6">
        
        <div class="text-center space-y-2">
            <div class="inline-flex items-center gap-2 justify-center">
                <div class="bg-[#9333EA] p-2 rounded-xl text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h1 class="text-2xl font-[900] text-[#9333EA] tracking-tighter">HubUMKM</h1>
            </div>
            <div class="pt-2">
                <h2 class="text-xl font-black text-gray-800 tracking-tight">Lengkapi Data Diri</h2>
                <p class="text-xs font-bold text-gray-400">Daftarkan bisnis UMKM Anda untuk mulai mengelola workspace (Penjual)</p>
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div class="space-y-1.5">
                <label for="name" class="text-xs font-bold text-gray-500 pl-1">Business Name / Nama Lengkap</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Masukkan nama bisnis atau nama Anda"
                    class="w-full bg-[#F8FAFC] border border-gray-100 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#9333EA]/20 focus:border-[#9333EA] transition">
                @if($errors->has('name'))
                    <p class="text-red-500 font-bold mt-1 pl-1" style="font-size: 11px;">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="space-y-1.5">
                <label for="email" class="text-xs font-bold text-gray-500 pl-1">Email Address</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com"
                    class="w-full bg-[#F8FAFC] border border-gray-100 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#9333EA]/20 focus:border-[#9333EA] transition">
                @if($errors->has('email'))
                    <p class="text-red-500 font-bold mt-1 pl-1" style="font-size: 11px;">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="space-y-1.5">
                <label for="password" class="text-xs font-bold text-gray-500 pl-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••"
                    class="w-full bg-[#F8FAFC] border border-gray-100 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#9333EA]/20 focus:border-[#9333EA] transition">
                @if($errors->has('password'))
                    <p class="text-red-500 font-bold mt-1 pl-1" style="font-size: 11px;">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <div class="space-y-1.5">
                <label for="password_confirmation" class="text-xs font-bold text-gray-500 pl-1">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••"
                    class="w-full bg-[#F8FAFC] border border-gray-100 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#9333EA]/20 focus:border-[#9333EA] transition">
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-[#9333EA] hover:bg-[#7e22ce] active:scale-[0.98] text-white text-sm font-black py-3.5 rounded-xl shadow-xl shadow-[#9333EA]/20 tracking-wide transition duration-200 uppercase">
                    Daftar Akun Penjual
                </button>
            </div>

            <div class="relative flex items-center py-1">
                <div class="flex-grow border-t border-gray-100"></div>
                <span class="flex-shrink mx-4 text-[10px] font-black text-gray-300 uppercase tracking-widest">OR</span>
                <div class="flex-grow border-t border-gray-100"></div>
            </div>

            <a href="{{ route('auth.google', ['role' => 'penjual']) }}" class="w-full py-3.5 bg-white border border-gray-100 text-gray-700 font-black text-xs rounded-xl flex items-center justify-center gap-3 hover:bg-gray-50 transition-all active:scale-95 shadow-sm decoration-none">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-4 h-4">
                GOOGLE
            </a>
        </form>

        <div class="text-center pt-2 border-t border-gray-50">
            <p class="text-xs font-bold text-gray-400">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-[#9333EA] hover:text-[#7e22ce] underline transition ml-1">Masuk di sini</a>
            </p>
        </div>

    </div>

</body>
</html>