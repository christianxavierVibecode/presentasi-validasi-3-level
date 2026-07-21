<?php
// 1. Koneksi ke Database MySQL
$host     = "localhost";
$user     = "root";
$password = "";
$database = "db_demo_validasi";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}

// 2. Ambil Data dari Form POST
$nama_barang = $_POST['nama_barang'];
$jumlah      = (int) $_POST['jumlah'];

// -------------------------------------------------------------
// VALIDASI LAYER 2: Backend Check (Aturan Bisnis)
// -------------------------------------------------------------
// if ($jumlah <= 2) {
//     // Hentikan proses simpan jika jumlah 2 atau kurang
//     die("<h3>[GAGAL - Backend Validation]</h3> Jumlah barang harus lebih dari 2! (Input kamu: $jumlah)");
// }

// 3. Jika Lolos Validasi Backend, Coba Simpan ke Database
$sql = "INSERT INTO barang (nama_barang, jumlah) VALUES ('$nama_barang', $jumlah)";

if (mysqli_query($conn, $sql)) {
    echo "<h3>[BERHASIL]</h3> Data barang <b>$nama_barang</b> dengan jumlah <b>$jumlah</b> berhasil disimpan!";
} else {
    // Peringatan jika tertahan oleh Validasi Layer 3 (Database Constraint)
    echo "<h3>[GAGAL - Database Validation]</h3> Terjadi error di database: " . mysqli_error($conn);
}

mysqli_close($conn);
