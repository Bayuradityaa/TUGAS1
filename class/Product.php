<?php
// class/Product.php
class Product {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Read: Ambil semua produk
    public function getAll() {
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Read: Ambil 1 produk berdasarkan ID
    public function getById($id) {
        $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
        $stmt = $this->db->query($sql, ['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create: Tambah Produk
    public function create($data) {
        $sql = "INSERT INTO products (name, category, price, stock, image_path, status) 
                VALUES (:name, :category, :price, :stock, :image_path, :status)";
        
        return $this->db->query($sql, [
            'name'       => $data['name'],
            'category'   => $data['category'],
            'price'      => $data['price'],
            'stock'      => $data['stock'],
            'image_path' => $data['image_path'],
            'status'     => $data['status']
        ]);
    }

    // Update: Ubah Produk
    public function update($id, $data) {
        // Cek apakah user mengupload gambar baru
        if (!empty($data['image_path'])) {
            $sql = "UPDATE products SET name=:name, category=:category, price=:price, stock=:stock, image_path=:image_path, status=:status WHERE id=:id";
            $params = [
                'id'         => $id,
                'name'       => $data['name'],
                'category'   => $data['category'],
                'price'      => $data['price'],
                'stock'      => $data['stock'],
                'image_path' => $data['image_path'],
                'status'     => $data['status']
            ];
        } else {
            // Jika tidak ada gambar baru, jangan update kolom image_path
            $sql = "UPDATE products SET name=:name, category=:category, price=:price, stock=:stock, status=:status WHERE id=:id";
             $params = [
                'id'         => $id,
                'name'       => $data['name'],
                'category'   => $data['category'],
                'price'      => $data['price'],
                'stock'      => $data['stock'],
                'status'     => $data['status']
            ];
        }
        return $this->db->query($sql, $params);
    }

    // Delete: Hapus Produk
    public function delete($id) {
        // Opsional: Hapus file fisik gambar jika perlu
        $product = $this->getById($id);
        if ($product && file_exists($product['image_path'])) {
            unlink($product['image_path']); 
        }

        $sql = "DELETE FROM products WHERE id = :id";
        return $this->db->query($sql, ['id' => $id]);
    }
}
?>