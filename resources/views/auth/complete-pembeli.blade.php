<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Data Pembeli - HubUMKM</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Data Pengiriman Barang</h2>
        <p class="text-sm text-gray-500 mb-6 text-center">Isi data di bawah ini untuk memudahkan proses transaksi pemesanan produk kamu.</p>
        
        <form action="{{ route('profile.complete.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp / HP</label>
                <input type="text" name="no_hp" required placeholder="Contoh: 08123456789" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 mb-4">
                
                <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap Pengiriman</label>
                <textarea name="alamat" required placeholder="Tuliskan nama jalan, nomor rumah, RT/RW, dan kecamatan..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 h-24"></textarea>
            </div>
            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded-lg transition duration-200">Selesai & Mulai Belanja</button>
        </form>
    </div>
</body>
</html>