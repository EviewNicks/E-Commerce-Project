<?php
include __DIR__ . '/../backend/connection.php'; // Menghubungkan database

// Query untuk mengambil data pesanan
$sql = "SELECT order_id, user_id, total_price, status, shipping_cost, promo_applied, created_at FROM orders";
$result = $conn->query($sql);

// Menampilkan data pesanan
if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Total Price</th>
        <th>Status</th>
        <th>Shipping Cost</th>
        <th>Promo Applied</th>
        <th>Created At</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        $promo = $row["promo_applied"] ? $row["promo_applied"] : "None";
        echo "<tr>
        <td>" . $row["order_id"] . "</td>
        <td>" . $row["user_id"] . "</td>
        <td>Rp " . number_format($row["total_price"], 0, ',', '.') . "</td>
        <td>" . ucfirst($row["status"]) . "</td>
        <td>Rp " . number_format($row["shipping_cost"], 0, ',', '.') . "</td>
        <td>" . $promo . "</td>
        <td>" . $row["created_at"] . "</td>
      </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada pesanan ditemukan.";
}
$conn->close(); // Menutup koneksi
