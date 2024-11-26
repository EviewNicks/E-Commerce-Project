<?php
include BASE_PATH . '/backend/connection.php';

header('Content-Type: application/json');

// Cek apakah admin sudah login (opsional)
// session_start();
// if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
//     echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
//     exit;
// }

// Ambil review_id dari URL
$review_id = intval($_GET['id'] ?? 0);

if ($review_id === 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid review ID']);
    exit;
}

// Validasi apakah ulasan ada di database
$stmt_check = $conn->prepare("SELECT review_id FROM reviews WHERE review_id = ?");
$stmt_check->bind_param("i", $review_id);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Review not found']);
    exit;
}

// Hapus ulasan
$stmt_delete = $conn->prepare("DELETE FROM reviews WHERE review_id = ?");
$stmt_delete->bind_param("i", $review_id);

if ($stmt_delete->execute()) {
    echo json_encode(['success' => true, 'message' => 'Review successfully deleted']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete review']);
}

$stmt_check->close();
$stmt_delete->close();
$conn->close();
