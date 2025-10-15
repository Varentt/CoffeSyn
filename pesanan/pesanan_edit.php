<?php
include('../koneksi.php');

if (!isset($_GET['id'])) {
    die("ID pesanan tidak ditemukan!");
}

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan='$id'");
$d = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_menu = $_POST['id_menu'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    $query = "UPDATE pesanan SET 
                id_pelanggan='$id_pelanggan',
                id_menu='$id_menu',
                jumlah='$jumlah',
                tanggal='$tanggal'
              WHERE id_pesanan='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: pesanan_tampil.php?status=updated");
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
    <title>Edit Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
<div class="container">
    <h2 class="mb-4 text-center">✏️ Edit Data Pesanan</h2>

    <form method="post" class="border rounded p-4 bg-white shadow-sm">

        <div class="mb-3">
            <label class="form-label fw-bold">Pelanggan</label>
            <select name="id_pelanggan" class="form-select" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php
                $pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama ASC");
                while ($p = mysqli_fetch_assoc($pelanggan)) {
                    $selected = ($p['id_pelanggan'] == $d['id_pelanggan']) ? 'selected' : '';
                    echo "<option value='{$p['id_pelanggan']}' $selected>{$p['nama']}</option>";
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
                    $selected = ($m['id_menu'] == $d['id_menu']) ? 'selected' : '';
                    echo "<option value='{$m['id_menu']}' $selected>{$m['nama_menu']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Jumlah</label>
            <input type="number" name="jumlah" value="<?= $d['jumlah'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Tanggal</label>
            <input type="date" name="tanggal" value="<?= $d['tanggal'] ?>" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="pesanan_tampil.php" class="btn btn-secondary">⬅️ Kembali</a>
            <button type="submit" name="update" class="btn btn-primary">💾 Simpan Perubahan</button>
        </div>
    </form>
</div>
</body>
</html>
