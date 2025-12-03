<?php
require_once 'inc/config.php';

$productObj = new Product();
$products = $productObj->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Produk - Nadimart</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* Tambahan CSS kecil untuk gambar tabel */
    .thumb { width: 50px; height: 50px; object-fit: cover; }
    .action-btn { margin-right: 5px; text-decoration: none; padding: 2px 5px; border: 1px solid #ccc; background: #eee; color: #333; }
    .action-btn.del { background: #ffcccc; color: #a00; }
  </style>
</head>
<body>
  <header>
    <h1>Daftar Produk Alat Tulis</h1>
  </header>
  <?php Utility::showNav(); ?>
  <main>
    <section>
      <h2>Inventory Barang</h2>
      <a href="create.php" style="display:inline-block; margin-bottom:10px; padding:8px 15px; background:#4b5; color:white; text-decoration:none; border-radius:4px;">+ Tambah Produk Baru</a>
      <table>
        <thead>
          <tr>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $row): ?>
          <tr>
            <td>
                <?php if (!empty($row['image_path'])): ?>
                    <img src="<?= htmlspecialchars($row['image_path']) ?>" class="thumb">
                <?php else: ?>
                    <span style="font-size: small; color: #999;">No IMG</span>
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['category']) ?></td>
            <td>Rp <?= number_format($row['price'], 2, ',', '.') ?></td>
            <td><?= htmlspecialchars($row['stock']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="action-btn">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="action-btn del" onclick="return confirm('Yakin ingin menghapus produk ini?');">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>