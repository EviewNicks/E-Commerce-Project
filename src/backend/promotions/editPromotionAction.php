<?php
include BASE_PATH . 'backend/connection.php'; // Menghubungkan database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $promotion_id = $_POST['promotion_id'];
    $name = $_POST['name'];
    $discount = $_POST['discount'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Validasi input
    if (empty($name) || empty($discount) || empty($start_date) || empty($end_date)) {
        echo "<p class='text-red-500'>Semua kolom harus diisi!</p>";
        exit;
    }

    // Query untuk memperbarui promosi
    $sql = "UPDATE promotions
            SET name = ?, discount = ?, start_date = ?, end_date = ?
            WHERE promotion_id = ?";

    // Persiapkan query untuk mencegah SQL injection
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "<p class='text-red-500'>Error: " . $conn->error . "</p>";
        exit;
    }

    // Bind parameter dan eksekusi
    $stmt->bind_param("ssssi", $name, $discount, $start_date, $end_date, $promotion_id);

    if ($stmt->execute()) {
        // Redirect ke halaman promosi setelah berhasil
        header('Location: ?page=promotions');
        exit;
    } else {
        echo "<p class='text-red-500'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p class='text-red-500'>Request tidak valid!</p>";
}
