<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook Canggih</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f0f2f5; }
        /* CSS tombol bulat dihapus karena sekarang pakai teks */
        .dataTables_wrapper .dataTables_paginate .paginate_button { padding: 0 !important; margin: 0 5px; }
        table.dataTable thead th { border-bottom: none; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="text-center mb-4">
                <h2 class="fw-bold text-primary">📒 Daftar Kontak</h2>
            </div>

            <div class="card shadow-lg border-0 rounded-4 mb-4">
                <div class="card-body p-4">
                    <form action="backend.php?act=tambah" method="POST">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-5">
                                <label class="form-label fw-bold small text-uppercase text-secondary">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control bg-light border-0" placeholder="..." required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-bold small text-uppercase text-secondary">Nomor HP</label>
                                <input type="text" name="no_hp" class="form-control bg-light border-0" placeholder="..." required>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        
                        <table id="tabelKontak" class="table table-hover align-middle w-100">
                            <thead class="bg-primary text-white text-center">
                                <tr>
                                    <th class="py-3 rounded-start">No</th>
                                    <th class="py-3 text-start ps-4">Nama Kontak</th>
                                    <th class="py-3">Nomor Telepon</th> 
                                    <th class="py-3 rounded-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $query = "SELECT * FROM kontak ORDER BY id DESC"; 
                                $result = mysqli_query($conn, $query);
                                $no = 1;

                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td class='fw-bold text-secondary'>" . $no++ . "</td>";
                                    echo "<td class='text-start ps-4 fw-bold text-dark'>" . htmlspecialchars($row['nama']) . "</td>";
                                    echo "<td class='text-primary'>" . htmlspecialchars($row['no_hp']) . "</td>";       
                                    echo "<td>
                                        <div class='btn-group' role='group'>
                                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm fw-bold'>Edit</a>
                                            <a href='backend.php?act=hapus&id=" . $row['id'] . "' class='btn btn-danger btn-sm fw-bold' onclick='return confirm(\"Hapus kontak ini?\")'>Hapus</a>
                                        </div>
                                    </td>";


                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#tabelKontak').DataTable({
            "pageLength": 5, 
            "lengthMenu": [ [5, 10, 25, -1], [5, 10, 25, "Semua"] ], 
            "language": { "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json" },
            "ordering": true
        });
    });
</script>

</body>
</html>