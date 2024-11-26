<?php
include BASE_PATH . '/backend/connection.php';

header('Content-Type: application/json');

// Ambil parameter dari request
$product_id = intval($_POST['product_id'] ?? 0);
$rating = intval($_POST['rating'] ?? 0);
$start_date = $_POST['start_date'] ?? '';
$end_date = $_POST['end_date'] ?? '';

// Validasi parameter
$conditions = [];
$params = [];
$types = '';

// Filter berdasarkan produk
if ($product_id > 0) {
    $conditions[] = 'r.product_id = ?';
    $params[] = $product_id;
    $types .= 'i';
}

// Filter berdasarkan rating
if ($rating > 0) {
    $conditions[] = 'r.rating = ?';
    $params[] = $rating;
    $types .= 'i';
}

// Filter berdasarkan tanggal
if ($start_date) {
    $conditions[] = 'r.created_at >= ?';
    $params[] = $start_date;
    $types .= 's';
}
if ($end_date) {
    $conditions[] = 'r.created_at <= ?';
    $params[] = $end_date;
    $types .= 's';
}

// Bangun query SQL
$sql = "
    SELECT r.review_id, r.rating, r.comment, r.created_at, p.name AS product_name, u.username
    FROM reviews r
    JOIN products p ON r.product_id = p.product_id
    JOIN users u ON r.user_id = u.user_id
";
if ($conditions) {
    $sql .= ' WHERE ' . implode(' AND ', $conditions);
}

$stmt = $conn->prepare($sql);
if ($types) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
$reviews = $result->fetch_all(MYSQLI_ASSOC);

// Kirim respons
echo json_encode(['success' => true, 'reviews' => $reviews]);

$stmt->close();
$conn->close();
