<?php
include('../koneksi.php'); 

if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_menu']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);

    $query = "INSERT INTO menu (nama_menu, harga, kategori) VALUES ('$nama', '$harga', '$kategori')";

    if (mysqli_query($conn, $query)) {
        header("Location: menu_tampil.php?status=added");
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
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
    <div class="container">
        <h2 class="mb-4 text-center">Tambah Menu Baru</h2>

        <form method="post" class="border rounded p-4 bg-white shadow-sm">
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Menu</label>
                <input type="text" name="nama_menu" class="form-control" placeholder="Contoh: Es Kopi Susu" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Contoh: 25000" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Kategori</label>
                <select name="kategori" class="form-select" required>
                    <option value="" selected disabled>-- Pilih Kategori --</option>
                    <option value="Kopi">Kopi</option>
                    <option value="Non-Kopi">Non-Kopi</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="menu_tampil.php" class="btn btn-secondary">⬅️ Kembali</a>
                <button type="submit" name="simpan" class="btn btn-success">💾 Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
