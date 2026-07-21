-- 1. Buat Database
CREATE DATABASE IF NOT EXISTS db_demo_validasi;
USE db_demo_validasi;

-- 2. Buat Tabel Barang
CREATE TABLE IF NOT EXISTS barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100) NOT NULL,
    jumlah INT NOT NULL,
    
    -- VALIDASI LAYER 3: Database Constraint
    -- Mencegah data masuk jika nilai kolom 'jumlah' kurang dari atau sama dengan 2
    CONSTRAINT chk_jumlah_minimal CHECK (jumlah > 2)
);