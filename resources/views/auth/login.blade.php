<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex items-center justify-center min-h-screen p-6">

    <div class="w-full max-w-md bg-white rounded-[40px] shadow-2xl shadow-purple-100/50 p-10 border border-gray-50">
        
        <div class="flex flex-col items-center mb-10">
            <div class="bg-gradient-to-br from-[#9333EA] to-[#E879F9] p-4 rounded-2xl text-white mb-4 shadow-lg shadow-purple-200">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>
            <h2 class="text-2xl font-[900] text-[#9333EA] tracking-tighter mb-1">HubUMKM</h2>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Mulai kelola bisnis Anda hari ini</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Email</label>
                <input type="email" name="email" value="lintangkejora@gmail.com" required class="w-full px-5 py-4 rounded-2xl bg-gray-50 border border-gray-100 outline-none focus:ring-2 focus:ring-purple-500 focus:bg-white transition-all font-bold text-gray-800">
            </div>

            <div class="relative">
                <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Password</label>
                <input type="password" name="password" required class="w-full px-5 py-4 rounded-2xl bg-gray-50 border border-gray-100 outline-none focus:ring-2 focus:ring-purple-500 focus:bg-white transition-all font-bold text-gray-800">
                <div class="absolute right-5 top-[46px] text-gray-400 cursor-pointer hover:text-[#9333EA] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                </div>
            </div>

            <div class="flex items-center justify-between px-1">
                <label class="flex items-center text-sm font-bold text-gray-400 cursor-pointer group">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-[#9333EA] focus:ring-[#9333EA] mr-2 transition">
                    <span class="group-hover:text-gray-600">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm font-bold text-[#9333EA] hover:text-[#E879F9] transition">Forget Password?</a>
            </div>

            <button type="submit" class="w-full py-4 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] rounded-2xl shadow-xl shadow-purple-100 hover:scale-[1.02] active:scale-95 transition-all">
                LOGIN
            </button>

            <div class="relative flex items-center py-4">
                <div class="flex-grow border-t border-gray-100"></div>
                <span class="flex-shrink mx-4 text-[10px] font-black text-gray-300 uppercase tracking-widest">OR CONTINUE WITH</span>
                <div class="flex-grow border-t border-gray-100"></div>
            </div>

            <button type="button" class="w-full py-4 bg-white border border-gray-100 text-gray-800 font-black rounded-2xl flex items-center justify-center gap-3 hover:bg-gray-50 transition-all active:scale-95">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5">
                GOOGLE
            </button>
        </form>

        <p class="text-center mt-8 text-sm font-bold text-gray-400">
            Don't have an account? <a href="{{ route('register') }}" class="text-[#9333EA] font-black hover:underline">Register now</a>
        </p>
    </div>

</body>
</html>