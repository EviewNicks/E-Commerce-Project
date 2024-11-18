<?php
include BASE_PATH . 'backend/connection.php';

$name = $_POST['name'];
$description = $_POST['description'];
$parent_category_id = $_POST['parent_category_id'] ?: null;
$is_active = 1;

if (empty($name)) {
    die("Nama kategori tidak boleh kosong.");
}
if (strlen($name) > 255) {
    die("Nama kategori terlalu panjang (maksimal 255 karakter).");
}
if (strlen($description) > 500) {
    die("Deskripsi kategori terlalu panjang (maksimal 500 karakter).");
}

$sql = "INSERT INTO categories (name, description, parent_category_id, is_active) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error: Unable to prepare the statement. " . $conn->error);
}

$stmt->bind_param('ssii', $name, $description, $parent_category_id, $is_active);

if ($stmt->execute()) {
    header("Location: index.php?page=categories&success=1");
} else {
    die("Error: Unable to execute the statement. " . $stmt->error);
}

$conn->close();
