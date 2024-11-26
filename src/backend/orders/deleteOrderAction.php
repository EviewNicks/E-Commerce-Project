<?php
include BASE_PATH . '/backend/connection.php';

header('Content-Type: application/json'); // Mengatur respons sebagai JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['order_id'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid input.']);
        exit;
    }

    $order_id = intval($data['order_id']);

    // Validasi status pesanan
    $stmt = $conn->prepare("SELECT status FROM orders WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(['success' => false, 'message' => 'Pesanan tidak ditemukan.']);
        exit;
    }

    $order = $result->fetch_assoc();
    if ($order['status'] !== 'canceled') {
        echo json_encode(['success' => false, 'message' => 'Hanya pesanan dengan status "Canceled" yang dapat dihapus.']);
        exit;
    }

    // Hapus pesanan
    $delete_stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ?");
    $delete_stmt->bind_param("i", $order_id);

    if ($delete_stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Pesanan berhasil dihapus.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus pesanan.']);
    }

    $delete_stmt->close();
    $stmt->close();
    $conn->close();
    exit;
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}
