<?php
include('../koneksi.php');

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    $query = "INSERT INTO pelanggan (nama, no_hp, email) VALUES ('$nama', '$no_hp', '$email')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: pelanggan_tampil.php?status=added");
        exit;
    } else {
        echo "❌ Gagal menambah data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
<div class="container">
    <h2 class="mb-4 text-center">Tambah Pelanggan Baru</h2>

    <form method="post" class="border rounded p-4 bg-white shadow-sm">
        <div class="mb-3">
            <label class="form-label fw-bold">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="pelanggan_tampil.php" class="btn btn-secondary">⬅️ Kembali</a>
            <button type="submit" name="simpan" class="btn btn-success">💾 Simpan</button>
        </div>
    </form>
</div>
</body>
</html>
