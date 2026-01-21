<?php
// Alamat server database (biasanya localhost jika di komputer sendiri)
$host = "localhost";

// Nama database yang akan digunakan
$dbname = "auth_app";

/*
 * isi versi kamu sendiri
 * username database (contoh: root)
 */
$username = "";

/*
 * isi versi kamu sendiri
 * password database (contoh: kosong atau sesuai setting MySQL)
 */
$password = "";

try {
    // Membuat koneksi ke database menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Mengaktifkan mode error agar PDO menampilkan error jika terjadi masalah
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Variabel penanda bahwa koneksi berhasil
    $connectionStatus = true;

} catch (PDOException $e) {
    // Jika koneksi gagal, tampilkan pesan error
    echo "❌ Koneksi gagal: " . $e->getMessage();
}
?>
