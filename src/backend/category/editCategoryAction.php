<?php
include BASE_PATH . '/backend/connection.php';

// header('Content-Type: application/json'); // Untuk respons JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("Step 1: Request diterima"); // Log awal

    $category_id = intval($_POST['category_id']);
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
    $parent_category_id = $_POST['parent_category_id'] ? intval($_POST['parent_category_id']) : null;
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    error_log("Step 2: Input - category_id: $category_id, name: $name, description: $description, parent_id: $parent_category_id, active: $is_active");

    // Handle file upload
    $image_url = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = BASE_PATH . '/uploads/categories/';
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
            error_log("Step 3: Folder upload dibuat");
        }

        $target_file = $target_dir . uniqid() . "_" . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_url = 'uploads/categories/' . basename($target_file);
            error_log("Step 4: File berhasil diunggah ke $image_url");
        } else {
            error_log("Step 5: Gagal mengunggah file");
            echo json_encode(['success' => false, 'message' => 'Failed to upload image']);
            exit;
        }
    } else {
        error_log("Step 6: Tidak ada file yang diunggah atau file tidak valid");
    }

    // Update database
    $sql = "UPDATE categories SET name = ?, description = ?, parent_category_id = ?, image_url = IFNULL(?, image_url), is_active = ? WHERE category_id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("Step 7: Gagal prepare statement - " . $conn->error);
        echo json_encode(['success' => false, 'message' => 'Database error: prepare statement failed']);
        exit;
    }

    $stmt->bind_param("ssisii", $name, $description, $parent_category_id, $image_url, $is_active, $category_id);
    error_log("Step 8: Bind parameter berhasil");

    if ($stmt->execute()) {
        error_log("Step 10: Kategori berhasil diperbarui");
        header('Location: ?page=categories&success=2'); // Tambahkan parameter sukses
        exit;
    } else {
        error_log("Step 9: Gagal eksekusi query - " . $stmt->error);
        header('Location: ?page=categories&error=1'); // Tambahkan parameter error
        exit;
    }


    $stmt->close();
    $conn->close();
} else {
    error_log("Step 11: Invalid request method");
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}
