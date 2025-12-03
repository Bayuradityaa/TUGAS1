<?php
require_once 'inc/config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Nadimart</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>Nadimart Merdeka Dashboard</h1>
  </header>
  <?php Utility::showNav(); ?>
  <main>
    <section>
      <h2>Selamat Datang di Inventory Nadimart</h2>
      <p>Aplikasi berbasis web ini digunakan untuk mengelola stok alat tulis.</p>
      <ul>
          <li>Kelola Data Produk (CRUD)</li>
          <li>Update Stok</li>
          <li>Upload Gambar Produk</li>
      </ul>
      <a href="products.php" class="button">Lihat Daftar Produk</a>
    </section>
  </main>
</body>
</html>