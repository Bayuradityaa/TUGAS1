<?php
require_once 'inc/config.php';

$id = $_GET['id'] ?? null;
if (!$id) Utility::redirect('products.php');

$productObj = new Product();
$item = $productObj->getById($id);

if (!$item) Utility::redirect('products.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>Edit Produk: <?= htmlspecialchars($item['name']) ?></h1>
  </header>
  <?php Utility::showNav(); ?>
  <main>
    <section>
      <form action="update.php" method="post" enctype="multipart/form-data" id="form-user">
        <input type="hidden" name="id" value="<?= $item['id'] ?>">
        
        <div class="row">
          <label for="name">Nama Produk:</label>
          <input type="text" id="name" name="name" value="<?= htmlspecialchars($item['name']) ?>" required>
        </div>

        <div class="row">
          <label for="category">Kategori:</label>
          <select id="category" name="category" style="width: 475px; padding: 8px;">
              <option value="Buku Tulis" <?= $item['category'] == 'Buku Tulis' ? 'selected' : '' ?>>Buku Tulis</option>
              <option value="Pulpen & Pensil" <?= $item['category'] == 'Pulpen & Pensil' ? 'selected' : '' ?>>Pulpen & Pensil</option>
              <option value="Penggaris" <?= $item['category'] == 'Penggaris' ? 'selected' : '' ?>>Penggaris</option>
              <option value="Lainnya" <?= $item['category'] == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
          </select>
        </div>

        <div class="row">
          <label for="price">Harga:</label>
          <input type="number" id="price" name="price" value="<?= $item['price'] ?>" required style="width: 475px; padding: 8px;">
        </div>

        <div class="row">
          <label for="stock">Stok:</label>
          <input type="number" id="stock" name="stock" value="<?= $item['stock'] ?>" required style="width: 475px; padding: 8px;">
        </div>

        <div class="row">
          <label for="status">Status:</label>
          <select id="status" name="status" style="width: 475px; padding: 8px;">
              <option value="active" <?= $item['status'] == 'active' ? 'selected' : '' ?>>Active</option>
              <option value="inactive" <?= $item['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
          </select>
        </div>

        <div class="row">
          <label>Gambar Saat Ini:</label>
          <?php if($item['image_path']): ?>
            <img src="<?= $item['image_path'] ?>" width="80"><br>
          <?php else: ?>
            <small>Belum ada gambar</small>
          <?php endif; ?>
        </div>

        <div class="row">
          <label for="image">Ganti Gambar:</label>
          <input type="file" id="image" name="image" accept="image/*">
          <small>(Biarkan kosong jika tidak ingin mengubah gambar)</small>
        </div>

        <hr>
        <div class="row">
          <button type="submit">Update Produk</button>
        </div>
      </form>
    </section>
  </main>
</body>
</html>