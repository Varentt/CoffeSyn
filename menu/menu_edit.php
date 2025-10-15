<?php
include('../koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = '$id'");
    $data = mysqli_fetch_assoc($result);
}


if (isset($_POST['update'])) {
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    mysqli_query($conn, "UPDATE menu SET nama_menu='$nama', harga='$harga', kategori='$kategori' WHERE id_menu='$id'");

    header("Location: menu_tampil.php?status=updated");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Menu</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-4">Edit Menu</h2>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nama Menu</label>
        <input type="text" name="nama_menu" class="form-control" value="<?= $data['nama_menu'] ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select">
          <option value="Kopi" <?= $data['kategori']=='Kopi'?'selected':'' ?>>Kopi</option>
          <option value="Non-Kopi" <?= $data['kategori']=='Non-Kopi'?'selected':'' ?>>Non-Kopi</option>
        </select>
      </div>

      <button type="submit" name="update" class="btn btn-success">Simpan Perubahan</button>
      <a href="menu_tampil.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
