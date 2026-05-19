<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Keuangan - HubUMKM</title>
    <style>
        /* Standarisasi dasar halaman cetak */
        @page { margin: 20px 30px; }
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #2d3748; padding: 0; margin: 0; font-size: 12px; line-height: 1.4; }
        
        /* Header Utama */
        .header-table { width: 100%; border-bottom: 3px solid #9333EA; padding-bottom: 12px; margin-bottom: 15px; }
        .title { font-size: 24px; font-weight: bold; color: #000000; letter-spacing: -0.5px; }
        .subtitle { color: #a0aec0; font-size: 13px; font-weight: bold; margin-top: 2px; }
        
        /* Metadata Cetak */
        .info-table { width: 100%; margin-bottom: 20px; }
        .info-label { color: #a0aec0; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.5px; }
        .info-value { font-size: 12px; font-weight: bold; color: #2d3748; margin-top: 2px; }
        
        /* Komponen Struktur 3 Kotak Utama (Menggunakan standard Table Cell) */
        .summary-table { width: 100%; margin-bottom: 25px; border-collapse: separate; border-spacing: 10px 0; margin-left: -10px; margin-right: -10px; }
        .box { padding: 12px 14px; border-radius: 12px; text-align: left; vertical-align: middle; }
        
        /* Warna Box disesuaikan dengan contoh mockup */
        .box-pemasukan { background-color: #DCFCE7; border: 1px solid #BBF7D0; }
        .box-pengeluaran { background-color: #FEE2E2; border: 1px solid #FCA5A5; }
        .box-saldo { background-color: #F3E8FF; border: 1px solid #E9D5FF; }
        
        /* Label & Angka Box */
        .lbl-pemasukan { color: #15803D; font-size: 9px; font-weight: bold; text-transform: uppercase; }
        .val-pemasukan { color: #16A34A; font-size: 18px; font-weight: bold; margin-top: 3px; }
        .lbl-pengeluaran { color: #B91C1C; font-size: 9px; font-weight: bold; text-transform: uppercase; }
        .val-pengeluaran { color: #DC2626; font-size: 18px; font-weight: bold; margin-top: 3px; }
        .lbl-saldo { color: #6B21A8; font-size: 9px; font-weight: bold; text-transform: uppercase; }
        .val-saldo { color: #9333EA; font-size: 18px; font-weight: bold; margin-top: 3px; }

        /* Detail Tabel Transaksi */
        .section-title { font-size: 14px; font-weight: bold; text-transform: uppercase; margin-bottom: 10px; color: #000000; letter-spacing: 0.3px; }
        .data-table { width: 100%; border-collapse: collapse; margin-bottom: 25px; border: 1px solid #E2E8F0; }
        .data-table th { background-color: #F1F5F9; color: #1E293B; font-weight: bold; text-align: center; padding: 10px 8px; font-size: 11px; border-bottom: 2px solid #CBD5E1; }
        .data-table td { padding: 10px 8px; border-bottom: 1px solid #E2E8F0; font-size: 11px; color: #334155; text-align: center; }
        
        /* Status Badge */
        .badge-masuk { background-color: #DCFCE7; color: #16A34A; font-weight: bold; padding: 3px 10px; border-radius: 6px; font-size: 9px; text-transform: uppercase; border: 1px solid #BBF7D0; }
        .text-jumlah-masuk { color: #16A34A; font-weight: bold; }
        .total-row { background-color: #F8FAFC; font-weight: bold; }
        
        /* Card Ringkasan Kelayakan Bawah */
        .footer-card { background-color: #F1F5F9; border-radius: 16px; padding: 15px 20px; margin-bottom: 30px; }
        .footer-card-title { font-size: 14px; font-weight: bold; text-transform: uppercase; margin-bottom: 12px; color: #000000; }
        .footer-line-table { width: 100%; }
        .footer-line-table td { font-size: 11px; font-weight: bold; color: #64748B; padding: 3px 0; }
        .footer-line-table .val { text-align: right; color: #1E293B; font-size: 11px; }

        /* Footer Informasi Hak Cipta */
        .footer-note { text-align: center; font-size: 9px; color: #94A3B8; font-weight: bold; margin-top: 15px; line-height: 1.4; }
    </style>
</head>
<body>

    <table class="header-table" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <div class="title">LAPORAN KEUANGAN</div>
                <div class="subtitle">HubUMKM</div>
            </td>
            <td style="text-align: right; vertical-align: middle;">
                <div style="background-color: #9333EA; width: 40px; height: 40px; border-radius: 10px; text-align: center;">
                    <span style="color: white; font-size: 22px; font-weight: bold; line-height: 38px;">🏪</span>
                </div>
            </td>
        </tr>
    </table>

    <table class="info-table" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 50%;">
                <div class="info-label">Periode</div>
                <div class="info-value">Selasa, 28 April 2026</div>
            </td>
            <td style="text-align: right;">
                <div class="info-label">Tanggal Cetak</div>
                <div class="info-value">Selasa, 28 April 2026</div>
            </td>
        </tr>
    </table>

    <table class="summary-table" cellpadding="0" cellspacing="0">
        <tr>
            <td class="box box-pemasukan">
                <div class="lbl-pemasukan">↗ Pemasukan</div>
                <div class="val-pemasukan">Rp {{ number_format($pemasukan, 0, ',', '.') }}</div>
            </td>
            <td class="box box-pengeluaran">
                <div class="lbl-pengeluaran">↘ Pengeluaran</div>
                <div class="val-pengeluaran">Rp {{ number_format($pengeluaran, 0, ',', '.') }}</div>
            </td>
            <td class="box box-saldo">
                <div class="lbl-saldo">Saldo Bersih</div>
                <div class="val-saldo">Rp {{ number_format($saldoBersih, 0, ',', '.') }}</div>
            </td>
        </tr>
    </table>

    <div class="section-title">Detail Transaksi</div>
    <table class="data-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 8%;">No</th>
                <th style="width: 22%;">Tanggal</th>
                <th style="width: 35%;">Deskripsi</th>
                <th style="width: 15%;">Status</th>
                <th style="width: 20%;">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayat as $row)
            <tr>
                <td>{{ $row['no'] }}</td>
                <td>{{ $row['tanggal'] }}</td>
                <td style="text-align: left; padding-left: 12px;">{{ $row['deskripsi'] }}</td>
                <td><span class="badge-masuk">{{ $row['status'] }}</span></td>
                <td class="text-jumlah-masuk">+Rp {{ number_format($row['jumlah'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="4" style="text-align: right; padding-right: 15px; font-weight: bold; font-size: 12px; color: #1E293B;">TOTAL SALDO:</td>
                <td style="color: #9333EA; font-weight: bold; font-size: 12px;">Rp {{ number_format($saldoBersih, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer-card">
        <div class="footer-card-title">Ringkasan</div>
        <table class="footer-line-table" cellpadding="0" cellspacing="0">
            <tr>
                <td>Total Transaksi Masuk:</td>
                <td class="val">2 transaksi</td>
            </tr>
            <tr>
                <td>Total Transaksi Keluar:</td>
                <td class="val">0 transaksi</td>
            </tr>
            <tr>
                <td style="padding-bottom: 6px; border-bottom: 1px solid #CBD5E1;">Total Semua Transaksi:</td>
                <td class="val" style="padding-bottom: 6px; border-bottom: 1px solid #CBD5E1;">2 transaksi</td>
            </tr>
            <tr>
                <td style="padding-top: 8px;">Rata-rata Pemasukan:</td>
                <td class="val" style="padding-top: 8px; color: #16A34A;">Rp {{ number_format($pemasukan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Rata-rata Pengeluaran:</td>
                <td class="val" style="color: #DC2626;">Rp {{ number_format($pengeluaran, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <div class="footer-note">
        Laporan ini dibuat secara otomatis oleh sistem HubUMKM<br>
        © 2026 CMS UMKM - Platform Manajemen Bisnis untuk UMKM Indonesia
    </div>

</body>
</html>