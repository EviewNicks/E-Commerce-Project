<?php
include BASE_PATH . '/backend/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $category_id = filter_var($_POST['category_id'], FILTER_VALIDATE_INT);
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
    $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
    $tags = htmlspecialchars($_POST['tags'] ?? null, ENT_QUOTES, 'UTF-8');
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;

    // Validasi input
    if (!$product_id || !$name || !$category_id || !$price) {
        header('Location: ?page=products&status=invalid');
        exit;
    }


    // Ambil data produk lama jika diperlukan
    $sql = "SELECT image_url FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $existing_product = $result->fetch_assoc();
    $stmt->close();

    $image_url = $existing_product['image_url']; // Default gunakan gambar lama



    // Cek apakah file gambar baru diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Validasi dan unggah file gambar baru
        if (!in_array(mime_content_type($_FILES['image']['tmp_name']), ['image/jpeg', 'image/png', 'image/gif'])) {
            header('Location: ?page=products&status=invalid_file_type');
            exit;
        }
        if ($_FILES['image']['size'] > 2 * 1024 * 1024) { // Maksimal 2MB
            header('Location: ?page=products&status=large_file');
            exit;
        }

        $target_dir = __DIR__ . '/../../../public/uploads/products/';
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . uniqid() . "_" . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            header('Location: ?page=products&status=upload_error');
            exit;
        }

        $image_url = 'uploads/products/' . basename($target_file);
    } else {
        $image_url = $_POST['existing_image_url'];
    }


    // Update database
    $sql = "UPDATE products SET category_id = ?, name = ?, description = ?, price = ?, is_featured = ?, tags = ?" .
        ($image_url ? ", image_url = ?" : "") . " WHERE product_id = ?";
    $stmt = $conn->prepare($sql);

    if ($image_url) {
        $stmt->bind_param("issdissi", $category_id, $name, $description, $price, $is_featured, $tags, $image_url, $product_id);
    } else {
        $stmt->bind_param("issdissi", $category_id, $name, $description, $price, $is_featured, $tags, $product_id);
    }

    if ($stmt->execute()) {
        header('Location: ?page=products&status=success');
        exit; // Penting!
    } else {
        header('Location: ?page=products&status=error');
        exit;
    }


    $stmt->close();
    $conn->close();
    exit; // Penting!
} else {
    header('Location: ?page=products&status=invalid_method');
    exit;
}
