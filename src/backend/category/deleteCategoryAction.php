<?php
include BASE_PATH . '/backend/connection.php';

header('Content-Type: application/json'); // Respons JSON

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $category_id = intval($_GET['id'] ?? 0);

    if ($category_id === 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid category ID']);
        exit;
    }

    // Cek apakah kategori digunakan di produk
    $check_sql = "SELECT COUNT(*) AS count FROM products WHERE category_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $category_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    $row = $check_result->fetch_assoc();

    if ($row['count'] > 0) {
        echo json_encode(['success' => false, 'message' => 'Kategori tidak dapat dihapus karena masih digunakan pada produk.']);
        exit;
    }

    // Hapus kategori
    $delete_sql = "DELETE FROM categories WHERE category_id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $category_id);

    if ($delete_stmt->execute()) {
        header('Location: ?page=categories&success=3'); // Berhasil dihapus
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus kategori.']);
        exit;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}
