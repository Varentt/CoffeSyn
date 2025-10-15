<?php
include('../koneksi.php');

if (!isset($_GET['id'])) {
    die("ID pelanggan tidak ditemukan!");
}

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$d = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    $query = "UPDATE pelanggan SET 
                nama='$nama',
                no_hp='$no_hp',
                email='$email'
              WHERE id_pelanggan='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: pelanggan_tampil.php?status=updated");
        exit;
    } else {
        echo "❌ Gagal memperbarui data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
<div class="container">
    <h2 class="mb-4 text-center">✏️ Edit Data Pelanggan</h2>

    <form method="post" class="border rounded p-4 bg-white shadow-sm">
        <div class="mb-3">
            <label class="form-label fw-bold">Nama</label>
            <input type="text" name="nama" value="<?= $d['nama']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">No HP</label>
            <input type="text" name="no_hp" value="<?= $d['no_hp']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="email" value="<?= $d['email']; ?>" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="pelanggan_tampil.php" class="btn btn-secondary">⬅️ Kembali</a>
            <button type="submit" name="update" class="btn btn-primary">💾 Simpan Perubahan</button>
        </div>
    </form>
</div>
</body>
</html>
