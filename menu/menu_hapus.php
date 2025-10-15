<?php
include('../koneksi.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "DELETE FROM menu WHERE id_menu = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: menu_tampil.php?status=deleted");
        exit;
    } else {
        echo "❌ Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "⚠️ ID tidak ditemukan di URL!";
}
?>
