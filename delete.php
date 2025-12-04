<?php
require_once 'inc/config.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $product = new Product();
    $product->delete($id);
}

Utility::redirect('products.php');
?>