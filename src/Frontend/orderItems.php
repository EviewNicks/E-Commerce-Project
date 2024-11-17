<?php
include __DIR__ . '/../backend/connection.php'; // Menghubungkan database

// Query untuk mengambil data item dalam pesanan
$sql = "SELECT order_item_id, order_id, product_id, quantity, price, total_price FROM order_items";
$result = $conn->query($sql);

// Menampilkan data item pesanan
if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>Order Item ID</th>
        <th>Order ID</th>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total Price</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["order_item_id"] . "</td>
        <td>" . $row["order_id"] . "</td>
        <td>" . $row["product_id"] . "</td>
        <td>" . $row["quantity"] . "</td>
        <td>Rp " . number_format($row["price"], 0, ',', '.') . "</td>
        <td>Rp " . number_format($row["total_price"], 0, ',', '.') . "</td>
      </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada item pesanan ditemukan.";
}
$conn->close(); // Menutup koneksi
