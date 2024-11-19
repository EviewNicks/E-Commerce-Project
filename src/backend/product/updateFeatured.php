<?php
include BASE_PATH . '/backend/connection.php'; // Koneksi database

header('Content-Type: application/json'); // Mengatur respons sebagai JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['product_id'], $data['is_featured'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid input.']);
        exit;
    }

    $product_id = $data['product_id'];
    $is_featured = $data['is_featured'];

    // Validasi data
    if (!is_numeric($product_id) || !is_numeric($is_featured)) {
        echo json_encode(['success' => false, 'message' => 'Invalid input format.']);
        exit;
    }

    // Update status featured
    $stmt = $conn->prepare("UPDATE products SET is_featured = ? WHERE product_id = ?");
    $stmt->bind_param("ii", $is_featured, $product_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update database.']);
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}
