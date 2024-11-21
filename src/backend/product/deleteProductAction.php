<?php
include BASE_PATH . '/backend/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $product_id = $_GET['id'] ?? null;

    if ($product_id) {
        // Ambil data produk untuk menghapus file gambar
        $sql = "SELECT image_url FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if ($product) {
            // Hapus gambar produk jika ada
            $image_path = BASE_PATH . "../public/" . $product['image_url'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            // Hapus produk dari database
            $delete_sql = "DELETE FROM products WHERE product_id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("i", $product_id);

            if ($delete_stmt->execute()) {
                header("Location: ?page=products&status=deleted");
            } else {
                header("Location: ?page=products&status=error");
            }
            exit;
        }
    }
}

// Jika gagal
header("Location: ?page=products&status=invalid");
exit;
