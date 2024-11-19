<?php
include '../../connection.php'; // Sesuaikan path ke connection.php

$name = $_POST['name'] ?? null;
$description = $_POST['description'] ?? null;
$parent_category_id = $_POST['parent_category_id'] ?: null;
$is_active = 1; // Default kategori aktif

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

// Proses upload gambar (opsional)
$image_url = null;
if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = __DIR__ . '/../../uploads/'; // Pastikan folder uploads ada
    $fileName = uniqid() . '_' . basename($_FILES['image_url']['name']);
    $uploadFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['image_url']['tmp_name'], $uploadFile)) {
        $image_url = 'uploads/' . $fileName;
    } else {
        die("Error: Upload file gagal.");
    }
}

// Masukkan data ke database
$sql = "INSERT INTO categories (name, description, parent_category_id, is_active, image_url) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error: Unable to prepare the statement. " . $conn->error);
}

$stmt->bind_param('ssiis', $name, $description, $parent_category_id, $is_active, $image_url);

if ($stmt->execute()) {
    header("Location: ../../index.php?page=categories&success=1");
    exit;
} else {
    die("Error: Unable to execute the statement. " . $stmt->error);
}

$conn->close();
