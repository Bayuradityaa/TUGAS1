# Nadimart Inventory System 

**Sistem Inventaris Nadimart** adalah sebuah  inovasi berbasis web yang dirancang untuk mengefisiensikan pengelolaan stok barang pada toko alat tulis. Proyek ini dikembangkan menggunakan **PHP Native** dengan pendekatan arsitektur **Object-Oriented Programming (OOP)** serta didukung oleh basis data **MySQL**.

## Keunggulan Fitur

Aplikasi ini memfasilitasi operasi data secara menyeluruh (CRUD - *Create, Read, Update, Delete*) dengan fitur-fitur berikut:

* **Dashboard Ringkas**: Halaman antarmuka utama yang menyajikan rangkuman aksesibilitas sistem.
* **Kontrol Produk Lengkap**:
    * Input data produk baru termasuk pengunggahan gambar visual.
    * Pembaruan informasi produk (nama, harga, stok, kategori, dan status).
    * Penghapusan data produk sekaligus membersihkan file gambar terkait dari penyimpanan server.
* **Sistem Kategori**: Pengelompokan jenis barang yang terstruktur (misal: Buku Tulis, Alat Tulis, Penggaris).
* **Manajemen Status**: Fitur untuk menandai ketersediaan produk (*Active/Inactive*).
* **Keamanan Upload Gambar**: Mekanisme unggah foto dengan fitur *auto-rename* (penamaan unik otomatis) untuk mencegah konflik pada direktori penyimpanan.

## Spesifikasi Teknis

* **Backend**: PHP.
* **Database**: MySQL.
* **Konektivitas**: Menggunakan driver PDO untuk keamanan dan stabilitas transaksi data.
* **Frontend**: HTML5 & CSS.

## Struktur Codingan

Struktur file dalam proyek ini:

```text
/
├── class/              # Inti Logika Aplikasi (Core Classes)
│   ├── Database.php    # Konfigurasi koneksi PDO MySQL
│   ├── Product.php     # Class yang menangani operasi CRUD
│   └── Utility.php     # Helper untuk navigasi, upload, & redirect
├── css/
│   └── style.css       # Stylesheet tampilan antarmuka
├── inc/
│   ├── config.php      # Pengaturan konstanta database & Base URL
│   └── nadimart.sql    # Skema database untuk instalasi awal
├── uploads/            # Direktori penyimpanan aset gambar produk
├── index.php           # Halaman Dashboard utama
├── products.php        # Halaman tabel data inventaris
├── create.php          # Halaman input produk baru
├── edit.php            # Halaman form edit data
├── save.php            # Controller untuk menyimpan data baru
├── update.php          # Controller untuk memperbarui data
└── delete.php          # Controller untuk menghapus data
