<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght=400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col">
        
        <header class="bg-white border-b border-gray-100 px-6 py-5 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-2xl font-[900] text-[#9333EA] tracking-tighter leading-none">Pesanan</h2>
        </header>

        <main class="p-6 space-y-4 flex-grow mb-24">
            @forelse($daftarPesanan as $item)
                @php
                    $primaryKey = $item->id_pesanan ?? $item->id;
                    $status = strtolower($item->status_pesanan ?? $item->status ?? 'pending');
                    
                    // Menentukan warna badge depan berdasarkan status dari database
                    $warnaBadge = 'bg-amber-50 text-amber-600 border border-amber-100'; // Pending
                    if($status === 'diproses') $warnaBadge = 'bg-blue-50 text-blue-600 border border-blue-100';
                    if($status === 'dikirim') $warnaBadge = 'bg-purple-50 text-purple-600 border border-purple-100';
                    if($status === 'selesai') $warnaBadge = 'bg-emerald-50 text-emerald-600 border border-emerald-100';
                @endphp

                <a href="{{ route('orders.show', $primaryKey) }}" class="block bg-white p-5 rounded-[32px] border border-gray-100 shadow-sm hover:scale-[1.01] transition duration-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-[900] text-gray-800 text-base leading-tight">{{ $item->nama_pembeli ?? $item->nama ?? 'Pelanggan' }}</h4>
                            <p class="text-[10px] font-bold text-gray-400 mt-1">
                                {{ isset($item->created_at) ? \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') : '27/4/2026' }}
                            </p>
                            <p class="text-sm font-black text-gray-700 mt-3">Rp {{ number_format($item->total_harga ?? $item->harga ?? 0, 0, ',', '.') }}</p>
                        </div>
                        
                        <span class="px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-wider {{ $warnaBadge }}">
                            {{ $item->status_pesanan ?? $item->status ?? 'Pending' }}
                        </span>
                    </div>
                </a>
            @empty
                <div class="text-center py-12 text-gray-400 font-medium text-sm">Belum ada pesanan masuk.</div>
            @endforelse
        </main>

        <nav class="fixed bottom-0 w-full max-w-md bg-white border-t border-gray-100 z-50 px-4 py-3 flex justify-between items-end h-20 pb-4 shadow-[0_-10px_30px_rgba(0,0,0,0.05)]">
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-end w-full gap-1 text-gray-300 pb-1.5"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg><span class="text-[8px] font-bold uppercase tracking-tighter">Home</span></a>
            <a href="{{ route('products.index') }}" class="flex flex-col items-center justify-end w-full gap-1 text-gray-300 pb-1.5"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg><span class="text-[8px] font-bold uppercase tracking-tighter">Produk</span></a>
            <a href="{{ route('orders.index') }}" class="flex flex-col items-center justify-end w-full gap-1 text-[#9333EA]"><div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg></div><span class="text-[8px] font-[900] uppercase tracking-tighter text-center">Order</span></a>
            <a href="{{ route('finance.index') }}" class="flex flex-col items-center justify-end w-full gap-1 text-gray-300 pb-1.5"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg><span class="text-[8px] font-bold uppercase tracking-tighter text-center">Keuangan</span></a>
            <a href="{{ route('workspace.index') }}" class="flex flex-col items-center justify-end w-full gap-1 text-gray-300 pb-1.5"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 022 2z" /></svg><span class="text-[8px] font-bold uppercase tracking-tighter text-center">Workspace</span></a>
            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center justify-end w-full gap-1 text-gray-300 pb-1.5"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg><span class="text-[8px] font-bold uppercase tracking-tighter">Profile</span></a>
        </nav>
    </div>

</body>
</html>