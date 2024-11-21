<?php
include BASE_PATH . '/backend/connection.php';

error_log("Debug: addCategoryAction.php dimulai");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("Debug: Request POST diterima.");

    // Validasi dan sanitasi input
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
    $parent_category_id = $_POST['parent_category_id'] ? intval($_POST['parent_category_id']) : null;
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    error_log("Debug: Input - Name: $name, Description: $description, Parent ID: $parent_category_id, Active: $is_active");

    // Handle file upload
    $image_url = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        error_log("Debug: File upload ditemukan.");
        $target_dir = BASE_PATH . '/uploads/categories/';
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
            error_log("Debug: Folder upload dibuat di $target_dir.");
        }

        $target_file = $target_dir . uniqid() . "_" . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_url = 'uploads/categories/' . basename($target_file);
            error_log("Debug: File berhasil diunggah ke $image_url.");
        } else {
            error_log("Debug: File gagal diunggah.");
        }
    }

    // Simpan ke database
    $sql = "INSERT INTO categories (name, description, parent_category_id, image_url, is_active) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Debug: Kesalahan pada prepare statement - " . $conn->error);
    }

    $stmt->bind_param("ssisi", $name, $description, $parent_category_id, $image_url, $is_active);
    if ($stmt->execute()) {
        error_log("Debug: Kategori berhasil ditambahkan.");
        header('Location: ?page=categories&success=1');
        exit;
    } else {
        error_log("Debug: Kesalahan pada database - " . $stmt->error);
        header('Location: ?page=categories&error=1');
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    error_log("Debug: Request bukan POST.");
    header('Location: ?page=categories&error=1');
    exit;
}
