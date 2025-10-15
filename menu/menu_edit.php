<?php
include('../koneksi.php');

if (!isset($_GET['id'])) {
    die("ID menu tidak ditemukan!");
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu='$id'");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    $query = "UPDATE menu SET 
                nama_menu='$nama',
                harga='$harga',
                kategori='$kategori'
              WHERE id_menu='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: menu_tampil.php?status=updated");
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
    <title>Edit Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
<div class="container">
    <h2 class="mb-4 text-center">✏️ Edit Data Menu</h2>

    <form id="menuForm" method="post" class="border rounded p-4 bg-white shadow-sm">
        <div class="mb-3">
            <label class="form-label fw-bold">Nama Menu</label>
            <input type="text" name="nama_menu" id="nama_menu" class="form-control" value="<?= $data['nama_menu'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="<?= $data['harga'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Kategori</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option value="Kopi" <?= $data['kategori']=='Kopi'?'selected':'' ?>>Kopi</option>
                <option value="Non-Kopi" <?= $data['kategori']=='Non-Kopi'?'selected':'' ?>>Non-Kopi</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="menu_tampil.php" class="btn btn-secondary">⬅️ Kembali</a>
            <button type="submit" name="update" class="btn btn-primary">💾 Simpan Perubahan</button>
        </div>
    </form>
</div>

<script src="../js/menu.js"></script>
</body>
</html>