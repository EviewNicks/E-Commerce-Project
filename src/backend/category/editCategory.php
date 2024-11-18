<?php
include BASE_PATH . 'backend/connection.php';

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
    die("ID kategori tidak valid.");
}

// Ambil data kategori
$sql = "SELECT * FROM categories WHERE category_id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error: Unable to prepare the select statement. " . $conn->error);
}
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$category = $result->fetch_assoc();

if (!$category) {
    die("Kategori tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $parent_category_id = $_POST['parent_category_id'] ?: null;
    $is_active = $_POST['is_active'];

    if (empty($name)) {
        die("Nama kategori tidak boleh kosong.");
    }
    if (strlen($name) > 255) {
        die("Nama kategori terlalu panjang (maksimal 255 karakter).");
    }
    if (strlen($description) > 500) {
        die("Deskripsi kategori terlalu panjang (maksimal 500 karakter).");
    }

    $update_sql = "UPDATE categories SET name = ?, description = ?, parent_category_id = ?, is_active = ? WHERE category_id = ?";
    $update_stmt = $conn->prepare($update_sql);

    if ($update_stmt === false) {
        die("Error: Unable to prepare the update statement. " . $conn->error);
    }

    $update_stmt->bind_param('ssiii', $name, $description, $parent_category_id, $is_active, $id);

    if ($update_stmt->execute()) {
        header("Location: index.php?page=categories&success=2");
    } else {
        die("Error: Unable to execute the update statement. " . $update_stmt->error);
    }
}
$conn->close();
