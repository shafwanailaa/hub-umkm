<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Data Penjual - HubUMKM</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Langkah Terakhir, Penjual!</h2>
        <p class="text-sm text-gray-500 mb-6 text-center">Silakan tentukan nama tokomu untuk mulai mengelola bisnis di HubUMKM.</p>
        
        <form action="{{ route('profile.complete.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Toko UMKM</label>
                <input type="text" name="nama_toko" required placeholder="Contoh: Rumah Anyaman Surakarta" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded-lg transition duration-200">Simpan & Masuk Dashboard</button>
        </form>
    </div>
</body>
</html>