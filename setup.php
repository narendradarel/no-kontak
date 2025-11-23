<?php
$host = getenv('DB_HOST');
$user = getenv('DB_USERNAME');
$pass = getenv('DB_PASSWORD');

$conn = mysqli_connect($host, $user, $pass);

if (!$conn) {
    die("Gagal login ke MySQL Azure: " . mysqli_connect_error());
} else {
    echo "<h3>Berhasil Login ke Server MySQL!</h3>";
}

$sql_buat_db = "CREATE DATABASE IF NOT EXISTS no_kontak";

if (mysqli_query($conn, $sql_buat_db)) {
    echo "<h3>Sukses! Database 'no_kontak' berhasil dibuat (atau sudah ada).</h3>";
} else {
    die("Gagal buat database: " . mysqli_error($conn));
}

mysqli_select_db($conn, "no_kontak");

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