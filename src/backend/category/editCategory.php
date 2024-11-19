<?php
include '../../connection.php'; // Sesuaikan path ke connection.php

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
    die("ID kategori tidak valid.");
}

$name = $_POST['name'] ?? null;
$description = $_POST['description'] ?? null;
$parent_category_id = $_POST['parent_category_id'] ?: null;
$is_active = $_POST['is_active'] ?? 1;

// Validasi input
if (empty($name)) {
    die("Nama kategori tidak boleh kosong.");
}
if (strlen($name) > 255) {
    die("Nama kategori terlalu panjang (maksimal 255 karakter).");
}
if (strlen($description) > 500) {
    die("Deskripsi kategori terlalu panjang (maksimal 500 karakter).");
}

// Ambil data kategori lama
$sql = "SELECT image_url FROM categories WHERE category_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$category = $result->fetch_assoc();

if (!$category) {
    die("Kategori tidak ditemukan.");
}

// Proses upload gambar (opsional)
$image_url = $category['image_url'];
if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = __DIR__ . '/../../uploads/';
    $fileName = uniqid() . '_' . basename($_FILES['image_url']['name']);
    $uploadFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['image_url']['tmp_name'], $uploadFile)) {
        $image_url = 'uploads/' . $fileName;
    } else {
        die("Error: Upload file gagal.");
    }
}

// Update data kategori
$update_sql = "UPDATE categories SET name = ?, description = ?, parent_category_id = ?, is_active = ?, image_url = ? WHERE category_id = ?";
$update_stmt = $conn->prepare($update_sql);

if (!$update_stmt) {
    die("Error: Unable to prepare the update statement. " . $conn->error);
}

$update_stmt->bind_param('ssissi', $name, $description, $parent_category_id, $is_active, $image_url, $id);

if ($update_stmt->execute()) {
    header("Location: ../../index.php?page=categories&success=2");
    exit;
} else {
    die("Error: Unable to execute the update statement. " . $update_stmt->error);
}

$conn->close();
