<?php
include __DIR__ . '/../connection.php'; // Menghubungkan database

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $promotion_id = $_GET['id'];

    // Pastikan ID valid sebelum melakukan penghapusan
    if (is_numeric($promotion_id)) {
        // Query untuk menghapus promosi berdasarkan ID
        $sql = "DELETE FROM promotions WHERE promotion_id = ?";

        // Persiapkan query untuk mencegah SQL injection
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo "<p class='text-red-500'>Error: " . $conn->error . "</p>";
            exit;
        }

        // Bind parameter dan eksekusi
        $stmt->bind_param("i", $promotion_id);

        if ($stmt->execute()) {
            // Redirect kembali ke halaman promosi setelah berhasil dihapus
            header('Location: ?page=promotions&success=3'); // Tambahkan parameter sukses
            exit;
        } else {
            echo "<p class='text-red-500'>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p class='text-red-500'>ID promosi tidak valid.</p>";
    }

    $conn->close();
} else {
    echo "<p class='text-red-500'>Request tidak valid!</p>";
}
