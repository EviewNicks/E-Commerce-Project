<?php
include BASE_PATH . '/backend/connection.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $tags = $_POST['tags'] ?? null;
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;

    // Upload gambar
    $image = $_FILES['image'];
    $target_dir = BASE_PATH . '/uploads/products/';
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Membuat folder jika belum ada
    }

    if ($image['error'] !== UPLOAD_ERR_OK) {
        echo "Error uploading file: " . $image['error'];
        exit;
    }

    if (!in_array(mime_content_type($image['tmp_name']), ['image/jpeg', 'image/png', 'image/gif'])) {
        echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
        exit;
    }

    if ($image['size'] > 2 * 1024 * 1024) { // Maksimal 2MB
        echo "File size too large. Maximum allowed is 2MB.";
        exit;
    }

    $target_file = $target_dir . basename($image['name']);
    if (!move_uploaded_file($image['tmp_name'], $target_file)) {
        echo "Failed to upload file to: " . $target_file;
        exit;
    }

    $image_url = 'uploads/products/' . basename($image['name']);

    // Simpan ke database
    $sql = "INSERT INTO products (category_id, name, description, price, image_url, is_featured, tags)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdiss", $category_id, $name, $description, $price, $image_url, $is_featured, $tags);

    if (!$stmt->execute()) {
        echo "Database Error: " . $stmt->error;
        exit;
    }

    header('Location: ?page=products&status=success');
    exit;

    $stmt->close();
    $conn->close();
} else {
    header('Location: ?page=products&status=invalid');
    exit;
}
