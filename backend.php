<?php
include 'koneksi.php';

$act = isset($_GET['act']) ? $_GET['act'] : '';

// --- LOGIC TAMBAH KONTAK ---
if ($act == 'tambah' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = $_POST['nama'];
    $no_hp = $_POST['no_hp']; // Ambil dari input baru
    
    // Query INSERT ke tabel kontak
    $sql = "INSERT INTO kontak (nama, no_hp) VALUES ('$nama', '$no_hp')";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}

// --- LOGIC UPDATE KONTAK ---
elseif ($act == 'update' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id    = $_POST['id'];
    $nama  = $_POST['nama'];
    $no_hp = $_POST['no_hp']; // Ambil dari input baru

    // Query UPDATE tabel kontak
    $sql = "UPDATE kontak SET nama='$nama', no_hp='$no_hp' WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}

// --- LOGIC HAPUS KONTAK ---
elseif ($act == 'hapus' && isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query DELETE dari tabel kontak
    $sql = "DELETE FROM kontak WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}

else {
    header("Location: index.php");
}
?>