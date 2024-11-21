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
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Membuat folder jika belum ada
            error_log("Step 3: Folder upload dibuat");
        }

        // Validasi file upload
        if (!in_array(mime_content_type($image['tmp_name']), ['image/jpeg', 'image/png', 'image/gif'])) {
            error_log("Step 4: Format file tidak valid");
            header('Location: ?page=products&status=invalid_file_type');
            exit;
        }

        if ($image['size'] > 2 * 1024 * 1024) { // Maksimal 2MB
            error_log("Step 5: Ukuran file terlalu besar");
            header('Location: ?page=products&status=large_file');
            exit;
        }

        // Pindahkan file
        $target_file = $target_dir . uniqid() . "_" . basename($_FILES['image']['name']); // Gunakan nama Unique
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            header('Location: ?page=products&status=upload_error');
            exit;
        }

        $image_url = 'uploads/products/' . basename($target_file);
        error_log("Step 7: File berhasil diunggah ke $image_url");
    }

    // Simpan ke database
    $sql = "INSERT INTO products (category_id, name, description, price, image_url, is_featured, tags)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdiss", $category_id, $name, $description, $price, $image_url, $is_featured, $tags);

    if (!$stmt) {
        error_log("Step 8: Kesalahan pada prepare statement - " . $conn->error);
        header('Location: ?page=products&status=error');
        exit;
    }

    $stmt->bind_param("issdiss", $category_id, $name, $description, $price, $image_url, $is_featured, $tags);

    if (!$stmt->execute()) {
        error_log("Step 9: Database Error: " . $stmt->error);
        header('Location: ?page=products&status=error');
        exit;
    }

    error_log("Step 10: Produk berhasil ditambahkan");
    header('Location: ?page=products&status=success');
    exit;

    // Tutup koneksi
    $stmt->close();
    $conn->close();
} else {
    error_log("Step 11: Metode request tidak valid");
    header('Location: ?page=products&status=invalid_method');
    exit;
}
