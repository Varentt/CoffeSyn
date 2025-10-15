<?php
include('../koneksi.php');

if (isset($_POST['simpan'])) {
    $id_pelanggan = mysqli_real_escape_string($conn, $_POST['id_pelanggan']);
    $id_menu = mysqli_real_escape_string($conn, $_POST['id_menu']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);

    $query = "INSERT INTO pesanan (id_pelanggan, id_menu, jumlah, tanggal)
              VALUES ('$id_pelanggan', '$id_menu', '$jumlah', '$tanggal')";

    if (mysqli_query($conn, $query)) {
        header("Location: pesanan_tampil.php?status=added");
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
    <title>Tambah Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
<div class="container">
    <h2 class="mb-4 text-center">➕ Tambah Pesanan</h2>

    <form method="post" class="border rounded p-4 bg-white shadow-sm">

        <div class="mb-3">
            <label class="form-label fw-bold">Pelanggan</label>
            <select name="id_pelanggan" class="form-select" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php
                $pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama ASC");
                while ($p = mysqli_fetch_assoc($pelanggan)) {
                    echo "<option value='{$p['id_pelanggan']}'>{$p['nama']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Menu</label>
            <select name="id_menu" class="form-select" required>
                <option value="">-- Pilih Menu --</option>
                <?php
                $menu = mysqli_query($conn, "SELECT * FROM menu ORDER BY nama_menu ASC");
                while ($m = mysqli_fetch_assoc($menu)) {
                    echo "<option value='{$m['id_menu']}'>{$m['nama_menu']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="pesanan_tampil.php" class="btn btn-secondary">⬅️ Kembali</a>
            <button type="submit" name="simpan" class="btn btn-success">💾 Simpan</button>
        </div>
    </form>
</div>
</body>
</html>
