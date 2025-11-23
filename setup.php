<?php
// 1. Ambil Username & Password dari Azure Environment (Tanpa Nama Database)
$host = getenv('DB_HOST');
$user = getenv('DB_USERNAME');
$pass = getenv('DB_PASSWORD');

// 2. Login ke MySQL Azure (Tanpa memilih database dulu)
$conn = mysqli_connect($host, $user, $pass);

if (!$conn) {
    die("Gagal login ke MySQL Azure: " . mysqli_connect_error());
} else {
    echo "<h3>Berhasil Login ke Server MySQL!</h3>";
}

// 3. Perintah Membuat Database 'no_kontak'
$sql_buat_db = "CREATE DATABASE IF NOT EXISTS no_kontak";

if (mysqli_query($conn, $sql_buat_db)) {
    echo "<h3>Sukses! Database 'no_kontak' berhasil dibuat (atau sudah ada).</h3>";
} else {
    die("Gagal buat database: " . mysqli_error($conn));
}

// 4. Masuk ke Database baru itu
mysqli_select_db($conn, "no_kontak");

// 5. Buat Tabel 'kontak'
$sql_buat_tabel = "CREATE TABLE IF NOT EXISTS kontak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    no_hp VARCHAR(50) NOT NULL,
    waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql_buat_tabel)) {
    echo "<h3>Sukses! Tabel 'kontak' berhasil dibuat.</h3>";
    echo "<hr><p>DATABASE SIAP! <a href='index.php'>Klik disini untuk buka Aplikasi</a></p>";
} else {
    echo "Gagal buat tabel: " . mysqli_error($conn);
}
?>