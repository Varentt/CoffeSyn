<?php
$koneksi = new mysqli("localhost", "root", "", "kedai_kopi");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$jml_pelanggan = $koneksi->query("SELECT COUNT(*) AS total FROM pelanggan")->fetch_assoc()['total'];
$jml_pesanan   = $koneksi->query("SELECT COUNT(*) AS total FROM pesanan")->fetch_assoc()['total'];
$jml_menu      = $koneksi->query("SELECT COUNT(*) AS total FROM menu")->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin | CoffeeSyn</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-brown" href="#">☕ CoffeeSyn</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="menu/menu_tampil.php">Kelola Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="pelanggan/pelanggan_tampil.php">Data Pelanggan</a></li>
        <li class="nav-item"><a class="nav-link" href="pesanan/pesanan_tampil.php">Data Pesanan</a></li>
      </ul>
    </div>
  </div>
</nav>

<section class="hero d-flex align-items-center">
  <div class="container text-start">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="display-5 fw-bold text-brown mb-3">Welcome, Admin CoffeeSyn!</h1>
        <p class="lead mb-4">Hai Admin! Waktunya mengatur menu, pelanggan, dan pesanan agar CoffeSyn tetap berjalan lancar</p>
      </div>
      <div class="col-md-6 text-center">
        <img src="img/coffe.png" class="img-fluid hero-img" alt="Coffee Cup">
      </div>
    </div>
  </div>
</section>

<section class="stats container text-center my-5">
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card shadow stat-card">
        <div class="card-body">
          <h2 class="fw-bold text-brown"><?= number_format($jml_pelanggan); ?></h2>
          <p class="text-muted">Pelanggan</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow stat-card">
        <div class="card-body">
          <h2 class="fw-bold text-brown"><?= number_format($jml_pesanan); ?></h2>
          <p class="text-muted">Pesanan</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow stat-card">
        <div class="card-body">
          <h2 class="fw-bold text-brown"><?= number_format($jml_menu); ?></h2>
          <p class="text-muted">Menu Kopi</p>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="text-center text-muted py-3 border-top">
  <p class="mb-0">&copy; <?= date('Y'); ?> CoffeeSyn — Sistem Admin</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>