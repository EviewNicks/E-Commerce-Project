<?php
include BASE_PATH . '/backend/connection.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi dan sanitasi input
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $category_id = filter_var($_POST['category_id'], FILTER_VALIDATE_INT);
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
    $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
    $tags = htmlspecialchars($_POST['tags'] ?? null, ENT_QUOTES, 'UTF-8');
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;

    error_log("Step 1: Input diterima untuk kategori ID: $category_id");

    // Validasi input yang wajib
    if (!$name || !$category_id || !$price) {
        error_log("Step 2: Validasi input gagal");
        header('Location: ?page=products&status=invalid');
        exit;
    }

    // Upload gambar (Opsional)
    $image_url = null; // Default jika gambar tidak diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $target_dir = __DIR__ . '/../../../public/uploads/products/';

        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);

        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
            header('Location: ?page=products&status=invalid_file_extension');
            exit;
        }

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Membuat folder jika belum ada
        }

        // Validasi file upload
        if (!in_array(mime_content_type($image['tmp_name']), ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
            header('Location: ?page=products&status=invalid_file_type');
            exit;
        }



        if ($image['size'] > 2 * 1024 * 1024) { // Maksimal 2MB
            header('Location: ?page=products&status=large_file');
            exit;
        }

        // Pindahkan file
        $target_file = $target_dir . uniqid() . "_" . basename($_FILES['image']['name']);
        if (!move_uploaded_file($image['tmp_name'], $target_file)) {
            header('Location: ?page=products&status=upload_error');
            exit;
        }

        $image_url = 'uploads/products/' . basename($target_file);
        error_log("Step 7: File berhasil diunggah ke $image_url");
    } else {
        // Fallback ke gambar default
        $default_image_path = __DIR__ . '/../../../public/uploads/products/default.jpg';
        if (!file_exists($default_image_path)) {
            error_log("Error: Default image file not found at $default_image_path");
            header('Location: ?page=products&status=missing_default_image');
            exit;
        }
        $image_url = 'uploads/products/default.jpg';
        error_log("Info: Image URL set to default because no file was uploaded.");
    }

    // Simpan ke database
    $sql = "INSERT INTO products (category_id, name, description, price, image_url, is_featured, tags)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);


    if (!$stmt) {
        error_log("Step 8: Kesalahan pada prepare statement - " . $conn->error);
        header('Location: ?page=products&status=error');
        exit;
    }

    $stmt->bind_param("issdsis", $category_id, $name, $description, $price, $image_url, $is_featured, $tags);

    if (!$stmt->execute()) {
        error_log("Step 9: Database Error: " . $stmt->error);
        header('Location: ?page=products&status=error');
        exit;
    }

    error_log("Step 10: Produk berhasil ditambahkan");
    header('Location: ?page=products&status=success');
    exit;
} else {
    error_log("Step 11: Metode request tidak valid");
    header('Location: ?page=products&status=invalid_method');
    exit;
}

// Tutup koneksi
$stmt->close();
$conn->close();
