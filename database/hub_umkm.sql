-- ============================================================
--  DATABASE: Sistem Manajemen UMKM Inovaska
--  Dibuat berdasarkan ERD Capstone Project - Inovaska Team
--  Universitas Muhammadiyah Surakarta 2025/2026
-- ============================================================

CREATE DATABASE IF NOT EXISTS inovaska;
USE inovaska;

-- ------------------------------------------------------------
-- 1. TABEL ADMIN
--    Menyimpan data akun admin yang mengelola sistem
-- ------------------------------------------------------------
CREATE TABLE admin (
    id_admin     INT PRIMARY KEY AUTO_INCREMENT,
    nama_admin   VARCHAR(100)        NOT NULL,
    username     VARCHAR(50) UNIQUE  NOT NULL,
    password     VARCHAR(255)        NOT NULL,   -- simpan hash (bcrypt)
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ------------------------------------------------------------
-- 2. TABEL KATEGORI
--    Kategori produk (misal: tas ransel, tas selempang, dll.)
-- ------------------------------------------------------------
CREATE TABLE kategori (
    id_kategori   INT PRIMARY KEY AUTO_INCREMENT,
    nama_kategori VARCHAR(100) NOT NULL,
    created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ------------------------------------------------------------
-- 3. TABEL PRODUK
--    Data produk tas yang dijual oleh UMKM
-- ------------------------------------------------------------
CREATE TABLE produk (
    id_produk     INT PRIMARY KEY AUTO_INCREMENT,
    id_kategori   INT          NOT NULL,
    nama_produk   VARCHAR(150) NOT NULL,
    deskripsi     TEXT,
    harga         DECIMAL(12, 2) NOT NULL,
    stok          INT          NOT NULL DEFAULT 0,
    foto_produk   VARCHAR(255),                 -- path / URL foto
    status_produk ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_produk_kategori FOREIGN KEY (id_kategori)
        REFERENCES kategori (id_kategori)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

-- ------------------------------------------------------------
-- 4. TABEL CUSTOMER
--    Data pelanggan yang melakukan pemesanan (tanpa login)
-- ------------------------------------------------------------
CREATE TABLE customer (
    id_customer   INT PRIMARY KEY AUTO_INCREMENT,
    nama_customer VARCHAR(100) NOT NULL,
    no_hp         VARCHAR(20)  NOT NULL,
    alamat        TEXT         NOT NULL,
    created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ------------------------------------------------------------
-- 5. TABEL PESANAN
--    Header / induk setiap transaksi pemesanan
-- ------------------------------------------------------------
CREATE TABLE pesanan (
    id_pesanan     INT PRIMARY KEY AUTO_INCREMENT,
    id_customer    INT            NOT NULL,
    total_pesanan  DECIMAL(14, 2) NOT NULL DEFAULT 0,
    tanggal_pesanan DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    catatan_pesanan TEXT,
    status_pesanan ENUM(
        'menunggu_pembayaran',
        'pembayaran_valid',
        'pembayaran_tidak_valid',
        'diproses',
        'dikirim',
        'selesai',
        'dibatalkan'
    ) DEFAULT 'menunggu_pembayaran',
    created_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_pesanan_customer FOREIGN KEY (id_customer)
        REFERENCES customer (id_customer)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

-- ------------------------------------------------------------
-- 6. TABEL DETAIL PESANAN
--    Rincian produk per transaksi (bisa lebih dari 1 produk)
-- ------------------------------------------------------------
CREATE TABLE detail_pesanan (
    id_detail_pesanan INT PRIMARY KEY AUTO_INCREMENT,
    id_pesanan        INT            NOT NULL,
    id_produk         INT            NOT NULL,
    jumlah            INT            NOT NULL DEFAULT 1,
    harga_satuan      DECIMAL(12, 2) NOT NULL,  -- harga snapshot saat pesan
    subtotal          DECIMAL(14, 2) NOT NULL,  -- jumlah × harga_satuan

    CONSTRAINT fk_detail_pesanan    FOREIGN KEY (id_pesanan)
        REFERENCES pesanan (id_pesanan)
        ON UPDATE CASCADE ON DELETE CASCADE,

    CONSTRAINT fk_detail_produk     FOREIGN KEY (id_produk)
        REFERENCES produk (id_produk)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

-- ------------------------------------------------------------
-- 7. TABEL PEMBAYARAN
--    Informasi pembayaran untuk setiap pesanan
-- ------------------------------------------------------------
CREATE TABLE pembayaran (
    id_pembayaran    INT PRIMARY KEY AUTO_INCREMENT,
    id_pesanan       INT            NOT NULL UNIQUE,  -- 1 pesanan = 1 pembayaran
    tanggal_bayar    DATETIME,
    metode_pembayaran ENUM('COD', 'QRIS') NOT NULL,
    status_pembayaran ENUM(
        'menunggu',
        'valid',
        'tidak_valid'
    ) DEFAULT 'menunggu',
    bukti_pembayaran VARCHAR(255),   -- path foto bukti transfer QRIS
    created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_pembayaran_pesanan FOREIGN KEY (id_pesanan)
        REFERENCES pesanan (id_pesanan)
        ON UPDATE CASCADE ON DELETE CASCADE
);

-- ------------------------------------------------------------
-- 8. TABEL PENGIRIMAN
--    Data pengiriman barang ke pelanggan
-- ------------------------------------------------------------
CREATE TABLE pengiriman (
    id_pengiriman     INT PRIMARY KEY AUTO_INCREMENT,
    id_pesanan        INT          NOT NULL UNIQUE,  -- 1 pesanan = 1 pengiriman
    nama_penerima     VARCHAR(100) NOT NULL,
    no_hp_penerima    VARCHAR(20)  NOT NULL,
    alamat_pengiriman TEXT         NOT NULL,
    jasa_kirim        VARCHAR(50),
    nomor_resi        VARCHAR(100),
    tanggal_kirim     DATE,
    harga_kirim       DECIMAL(10, 2) DEFAULT 0,
    status_pengiriman ENUM(
        'belum_dikirim',
        'dikirim',
        'terkirim'
    ) DEFAULT 'belum_dikirim',
    created_at        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at        TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_pengiriman_pesanan FOREIGN KEY (id_pesanan)
        REFERENCES pesanan (id_pesanan)
        ON UPDATE CASCADE ON DELETE CASCADE
);


