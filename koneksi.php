<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Logika HYBRID (Otomatis deteksi Local atau Azure)
// Jika Azure memberikan data DB_HOST, pakai itu. Jika tidak, pakai localhost.
$host = getenv('DB_HOST') ? getenv('DB_HOST') : "localhost";
$user = getenv('DB_USERNAME') ? getenv('DB_USERNAME') : "root";
$pass = getenv('DB_PASSWORD') ? getenv('DB_PASSWORD') : ""; // Password XAMPP kosong
$db   = getenv('DB_DATABASE') ? getenv('DB_DATABASE') : "no_kontak";

try {
    $conn = mysqli_connect($host, $user, $pass, $db);
} catch (mysqli_sql_exception $e) {
    die("<h3>Koneksi Gagal!</h3><p>" . $e->getMessage() . "</p>");
}
?>