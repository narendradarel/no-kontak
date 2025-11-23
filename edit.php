<?php 
include 'koneksi.php'; 

$id = $_GET['id'];
$query = "SELECT * FROM kontak WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) { header("Location: index.php"); exit(); }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kontak</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Background dan Font sama dengan Index */
        body { font-family: 'Poppins', sans-serif; background-color: #f0f2f5; }
        .form-control:focus { box-shadow: none; border-color: #0d6efd; background-color: #fff; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-lg-5 col-md-8">
            
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary">✏️ Edit Kontak</h2>
                        <p class="text-muted small">Perbarui informasi temanmu.</p>
                    </div>

                    <form action="backend.php?act=update" method="POST">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-secondary">Nama Lengkap</label>
                            <input type="text" name="nama" 
                                   class="form-control form-control-lg bg-light border-0" 
                                   value="<?= htmlspecialchars($data['nama']) ?>" required>
                        </div>

                        <div class="mb-5">
                            <label class="form-label fw-bold small text-uppercase text-secondary">Nomor Telepon</label>
                            <input type="text" name="no_hp" 
                                   class="form-control form-control-lg bg-light border-0" 
                                   value="<?= htmlspecialchars($data['no_hp']) ?>" required>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning btn-lg text-white fw-bold shadow-sm rounded-3">
                                Simpan Perubahan
                            </button>
                            <a href="index.php" class="btn btn-light btn-lg text-muted fw-bold rounded-3">
                                Batal
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>