<?php
include BASE_PATH . 'backend/connection.php'; // Menghubungkan database

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    error_log("Debug: Form submitted to addPromotionAction");

    $name = $_POST['name'];
    $discount = $_POST['discount'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Validasi data
    if (empty($name) || empty($discount) || empty($start_date) || empty($end_date)) {
        echo json_encode(['success' => false, 'message' => 'Semua field harus diisi.']);
        exit;
    }

    if ($discount < 1 || $discount > 100) {
        echo json_encode(['success' => false, 'message' => 'Diskon harus antara 1% dan 100%.']);
        exit;
    }

    if (strtotime($start_date) >= strtotime($end_date)) {
        echo json_encode(['success' => false, 'message' => 'Tanggal mulai harus lebih kecil dari tanggal berakhir.']);
        exit;
    }

    // Simpan data ke database
    $sql = "INSERT INTO promotions (name, discount, start_date, end_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdds", $name, $discount, $start_date, $end_date);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Promosi berhasil ditambahkan.']);
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menambahkan promosi.']);
    }
}
