<?php
include('../koneksi.php');

if (!isset($_GET['id'])) {
    die("❌ ID pesanan tidak ditemukan di URL!");
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$cek = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan='$id'");
if (mysqli_num_rows($cek) == 0) {
    die("⚠️ Data pesanan dengan ID tersebut tidak ditemukan!");
}

$query = "DELETE FROM pesanan WHERE id_pesanan='$id'";
if (mysqli_query($conn, $query)) {
    header("Location: pesanan_tampil.php?status=deleted");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
