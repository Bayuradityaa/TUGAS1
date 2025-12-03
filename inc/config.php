<?php
// inc/config.php

// Start session
session_start();

// Simple autoload class
spl_autoload_register(function ($class_name) {
    include 'class/' . $class_name . '.php';
});

// data config
const DB_HOST = 'localhost';
const DB_USER = 'root';       
const DB_PASS = 'bayu555';           
const DB_NAME = 'nadimart';   

// Define base URL
const BASE_URL = 'https://localhost:8000/'; 

// Konfigurasi NAVBARnya
const NAV_PAGES = [
    ['title' => 'Dashboard',   'url' => 'index.php'],
    ['title' => 'Daftar Produk', 'url' => 'products.php'],
    ['title' => 'Tambah Produk', 'url' => 'create.php'],
];
?>