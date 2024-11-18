<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/../../');
}
include BASE_PATH . 'backend/connection.php';

$action = $_GET['action'] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($action === 'add') {
        // Logika menambahkan produk
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, category_id, is_featured) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdii", $_POST['name'], $_POST['description'], $_POST['price'], $_POST['category_id'], isset($_POST['is_featured']) ? 1 : 0);
    } elseif ($action === 'edit') {
        // Logika mengedit produk
        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, category_id = ?, is_featured = ? WHERE product_id = ?");
        $stmt->bind_param("ssdiii", $_POST['name'], $_POST['description'], $_POST['price'], $_POST['category_id'], isset($_POST['is_featured']) ? 1 : 0, $_POST['product_id']);
    }

    if (isset($stmt) && $stmt->execute()) {
        header("Location: /E-Commerce-Project/index.php?page=products&status=success");
    } else {
        header("Location: /E-Commerce-Project/index.php?page=formProduct&action=$action&status=error");
    }
    exit;
}

if ($action === 'delete' && isset($_GET['id'])) {
    // Logika menghapus produk
    $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $_GET['id']);
    if ($stmt->execute()) {
        header("Location: /E-Commerce-Project/index.php?page=products&status=success");
    } else {
        header("Location: /E-Commerce-Project/index.php?page=products&status=error");
    }
    exit;
}
