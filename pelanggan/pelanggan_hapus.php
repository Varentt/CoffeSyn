<?php
include('../koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM pelanggan WHERE id_pelanggan = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: pelanggan_tampil.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan di URL!";
}
?>
