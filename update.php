<?php
require_once 'inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = $_POST['id'];
    $name     = $_POST['name'];
    $category = $_POST['category'];
    $price    = $_POST['price'];
    $stock    = $_POST['stock'];
    $status   = $_POST['status'];
    
    // Handle File Upload (Optional on update)
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imagePath = Utility::uploadImage($_FILES['image']);
    }

    $data = [
        'name'       => $name,
        'category'   => $category,
        'price'      => $price,
        'stock'      => $stock,
        'image_path' => $imagePath, // Jika null, Product class tidak akan mengupdate kolom ini
        'status'     => $status
    ];

    $product = new Product();
    if ($product->update($id, $data)) {
        Utility::redirect('products.php');
    } else {
        echo "Gagal mengupdate data.";
    }
} else {
    Utility::redirect('products.php');
}
?>