<?php
// class/Utility.php
class Utility {
    public static function redirect($url) {
        header("Location: " . BASE_URL . $url);
        exit();
    }

    public static function showNav($pages = NAV_PAGES) {
        echo '<nav><ul>';
        foreach ($pages as $item) {
            $title = htmlspecialchars($item['title'] ?? '', ENT_QUOTES, 'UTF-8');
            $url   = htmlspecialchars($item['url'] ?? '', ENT_QUOTES, 'UTF-8');
            echo "<li><a href='$url'>$title</a></li>";
        }
        echo '</ul></nav>';
    }

    // Fungsi Helper untuk Upload Gambar
    public static function uploadImage($fileInfo) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = basename($fileInfo["name"]);
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Generate nama unik agar tidak bentrok (timestamp)
        $newFileName = uniqid() . '.' . $fileType;
        $targetFilePath = $targetDir . $newFileName;

        // Validasi tipe file
        $allowTypes = array('jpg','png','jpeg','gif');
        if(in_array($fileType, $allowTypes)){
            // Upload file ke server
            if(move_uploaded_file($fileInfo["tmp_name"], $targetFilePath)){
                return $targetFilePath;
            }
        }
        return null; // Gagal upload
    }
}
?>