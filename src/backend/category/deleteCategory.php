<?php
include BASE_PATH . 'backend/connection.php';

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
    die("ID kategori tidak valid.");
}

// Cek apakah kategori digunakan oleh produk
$check_sql = "SELECT COUNT(*) as count FROM products WHERE category_id = ?";
$stmt = $conn->prepare($check_sql);
if (!$stmt) {
    die("Error: Unable to prepare the count statement. " . $conn->error);
}
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$count = $result->fetch_assoc()['count'];

if ($count > 0) {
    header("Location: index.php?page=categories&error=1");
    exit;
}

// Hapus kategori
$delete_sql = "DELETE FROM categories WHERE category_id = ?";
$delete_stmt = $conn->prepare($delete_sql);
if (!$delete_stmt) {
    die("Error: Unable to prepare the delete statement. " . $conn->error);
}

$delete_stmt->bind_param('i', $id);
if ($delete_stmt->execute()) {
    header("Location: index.php?page=categories&success=3");
} else {
    die("Error: Unable to execute the delete statement. " . $delete_stmt->error);
}

$conn->close();
