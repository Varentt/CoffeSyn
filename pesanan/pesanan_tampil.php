<?php
include('../koneksi.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>🧾 Data Pesanan CoffeSyn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e9dcc9 0%, #f8f5f2 50%, #ffffff 100%);
            color: #4b3b30;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        h2 {
            color: #4b3832;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .table thead th {
            background: linear-gradient(90deg, #6f4e37, #a67b5b); /* gradasi coklat kopi */
            color: white;
        }

        .table tbody tr:hover {
            background-color: rgba(111, 78, 55, 0.1);
        }

        .btn-primary {
            background: linear-gradient(90deg, #6f4e37, #8b5e3c);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #5b3d2e, #70412c);
        }

        .btn-secondary {
            background: linear-gradient(90deg, #8d7b68, #a1887f);
            border: none;
        }
        .btn-secondary:hover {
            background: linear-gradient(90deg, #7a6656, #8d776a);
        }

        .btn-warning {
            background-color: #d9a760;
            border: none;
            color: #fff;
        }
        .btn-warning:hover {
            background-color: #c1914d;
        }

        .btn-danger {
            background-color: #b3541e;
            border: none;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #8a3d15;
        }

        .alert {
            border-left: 6px solid #6f4e37;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body class="p-4">
<div class="container">
    <h2>🧾 Data Pesanan CoffeSyn</h2>

    <div class="mb-3 d-flex justify-content-between">
        <a href="pesanan_tambah.php" class="btn btn-primary">+ Tambah Pesanan</a>
        <a href="../index.php" class="btn btn-secondary">🏠 Kembali ke Dashboard</a>
    </div>

    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] == 'added'): ?>
            <div class="alert alert-success alert-dismissible fade show">
                ✅ Data pesanan berhasil <strong>ditambahkan!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php elseif ($_GET['status'] == 'updated'): ?>
            <div class="alert alert-info alert-dismissible fade show">
                ✏️ Data pesanan berhasil <strong>diperbarui!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php elseif ($_GET['status'] == 'deleted'): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                🗑️ Data pesanan berhasil <strong>dihapus!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <table class="table table-bordered table-hover table-striped align-middle shadow-sm">
    <thead class="text-center">
        <tr>
            <th width="70">No</th> 
            <th>Nama Pelanggan</th>
            <th>Nama Menu</th>
            <th width="80">Jumlah</th>
            <th width="160">Tanggal</th>
            <th width="160">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = mysqli_query($conn, "
            SELECT 
                pesanan.id_pesanan,
                pelanggan.nama,
                menu.nama_menu,
                pesanan.jumlah,
                pesanan.tanggal
            FROM pesanan
            JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan
            JOIN menu ON pesanan.id_menu = menu.id_menu
            ORDER BY pesanan.id_pesanan DESC
        ");

        if (mysqli_num_rows($data) > 0):
            $no = 1; 
            while ($d = mysqli_fetch_assoc($data)):
        ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td> 
            <td><?= htmlspecialchars($d['nama']) ?></td>
            <td><?= htmlspecialchars($d['nama_menu']) ?></td>
            <td class="text-center"><?= $d['jumlah'] ?></td>
            <td class="text-center"><?= $d['tanggal'] ?></td>
            <td class="text-center">
                <a href="pesanan_edit.php?id=<?= $d['id_pesanan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="pesanan_hapus.php?id=<?= $d['id_pesanan'] ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; else: ?>
        <tr>
            <td colspan="6" class="text-center text-muted py-3">Belum ada data pesanan ☕</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
