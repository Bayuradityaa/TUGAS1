<?php
require_once 'inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'];
    $category = $_POST['category'];
    $price    = $_POST['price'];
    $stock    = $_POST['stock'];
    $status   = $_POST['status'];
    
    // Handle File Upload
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imagePath = Utility::uploadImage($_FILES['image']);
    }

    $data = [
        'name'       => $name,
        'category'   => $category,
        'price'      => $price,
        'stock'      => $stock,
        'image_path' => $imagePath,
        'status'     => $status
    ];

    $product = new Product();
    if ($product->create($data)) {
        Utility::redirect('products.php');
    } else {
        echo "Gagal menyimpan data.";
    }
} else {
    Utility::redirect('create.php');
}
?>