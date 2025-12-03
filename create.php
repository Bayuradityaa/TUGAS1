<?php
require_once 'inc/config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>Tambah Produk Baru</h1>
  </header>
  <?php Utility::showNav(); ?>
  <main>
    <section>
      <form action="save.php" method="post" enctype="multipart/form-data" id="form-user">
        
        <div class="row">
          <label for="name">Nama Produk:</label>
          <input type="text" id="name" name="name" required>
        </div>

        <div class="row">
          <label for="category">Kategori:</label>
          <select id="category" name="category" required style="width: 475px; padding: 8px;">
              <option value="Buku Tulis">Buku Tulis</option>
              <option value="Pulpen & Pensil">Pulpen & Pensil</option>
              <option value="Penggaris">Penggaris</option>
              <option value="Lainnya">Lainnya</option>
          </select>
        </div>

        <div class="row">
          <label for="price">Harga (Rp):</label>
          <input type="number" id="price" name="price" min="0" required style="width: 475px; padding: 8px;">
        </div>

        <div class="row">
          <label for="stock">Stok:</label>
          <input type="number" id="stock" name="stock" min="0" required style="width: 475px; padding: 8px;">
        </div>

        <div class="row">
          <label for="status">Status:</label>
          <select id="status" name="status" style="width: 475px; padding: 8px;">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
        </div>

        <div class="row">
          <label for="image">Gambar:</label>
          <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <hr>
        <div class="row">
          <button type="submit">Simpan Produk</button>
        </div>
      </form>
    </section>
  </main>
</body>
</html>