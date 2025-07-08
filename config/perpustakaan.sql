-- =========================================
-- SISTEM INFORMASI PERPUSTAKAAN
-- Full Migration Script (v1.0)
-- =========================================

-- 1. DROP & CREATE DATABASE
DROP DATABASE IF EXISTS perpustakaan;
CREATE DATABASE perpustakaan;
USE perpustakaan;

-- 2. DROP TABLES (berurutan dari anak ke induk)
DROP TABLE IF EXISTS peminjaman;
DROP TABLE IF EXISTS anggota;
DROP TABLE IF EXISTS buku;
DROP TABLE IF EXISTS kategori;
DROP TABLE IF EXISTS petugas;

-- 3. CREATE TABLES

-- 3.1 Tabel: petugas
CREATE TABLE petugas (
    id_petugas INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(25) NOT NULL,
    alamat VARCHAR(50),
    no_telp VARCHAR(25),
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(25) NOT NULL
);

-- 3.2 Tabel: kategori
CREATE TABLE kategori (
    id_kat INT AUTO_INCREMENT PRIMARY KEY,
    deskripsi VARCHAR(100) NOT NULL
);

-- 3.3 Tabel: buku
CREATE TABLE buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul_buku VARCHAR(100) NOT NULL,
    id_kat INT,
    pengarang VARCHAR(50),
    penerbit VARCHAR(50),
    FOREIGN KEY (id_kat) REFERENCES kategori(id_kat)
);

-- 3.4 Tabel: anggota (dengan login)
CREATE TABLE anggota (
    id_anggota INT AUTO_INCREMENT PRIMARY KEY,
    status ENUM('Aktif','Tidak Aktif') DEFAULT 'Aktif',
    nama VARCHAR(50) NOT NULL,
    no_telp VARCHAR(25),
    alamat VARCHAR(100),
    jk ENUM('Laki-laki','Perempuan') NOT NULL,
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(25) NOT NULL,
    id_petugas INT,
    FOREIGN KEY (id_petugas) REFERENCES petugas(id_petugas)
);

-- 3.5 Tabel: peminjaman
CREATE TABLE peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    tgl_peminjaman DATE NOT NULL,
    tgl_kembali DATE,
    status ENUM('Pinjam','Kembali') DEFAULT 'Pinjam',
    id_buku INT,
    id_anggota INT,
    FOREIGN KEY (id_buku) REFERENCES buku(id_buku),
    FOREIGN KEY (id_anggota) REFERENCES anggota(id_anggota)
);

-- 4. INSERT DATA DUMMY

-- 4.1 Petugas
INSERT INTO petugas (nama, alamat, no_telp, username, password) VALUES
('Nurman', 'Bekasi aja', '021', 'nurman', 'nurman');

-- 4.2 Kategori Buku
INSERT INTO kategori (deskripsi) VALUES
('Teknologi'),
('Fiksi'),
('Sejarah');

-- 4.3 Buku
INSERT INTO buku (judul_buku, id_kat, pengarang, penerbit) VALUES
('Belajar SQL', 1, 'John Doe', 'Erlangga'),
('Petualangan Si Kancil', 2, 'Budi Hartono', 'Gramedia'),
('Sejarah Indonesia', 3, 'Slamet Widodo', 'Andi Publisher');

-- 4.4 Anggota (dengan login)
INSERT INTO anggota (status, nama, no_telp, alamat, jk, username, password, id_petugas) VALUES
('Aktif', 'Andi Odang', '081212121212', 'Jl. Kenanga No. 3', 'Laki-laki', 'andi', 'andi123', 1),
('Aktif', 'Kimberly', '0987', 'Di sana', 'Perempuan', 'kim', 'kim123', 1),
('Aktif', 'Rizky Maulana', '082233', 'Jl. Mawar No. 4', 'Laki-laki', 'rizky', 'rizky123', 1);

-- 4.5 Peminjaman
INSERT INTO peminjaman (tgl_peminjaman, tgl_kembali, status, id_buku, id_anggota) VALUES
('2025-07-01', '2025-07-08', 'Pinjam', 1, 1);

-- =========================================
-- END OF MIGRATION
-- =========================================
