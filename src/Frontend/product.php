<?php
include __DIR__ .  '/../backend/connection.php'; // Menghubungkan database

// Query untuk mengambil data produk
$sql = "SELECT product_id, name, price, description FROM products";
$result = $conn->query($sql);

// Menampilkan data produk
if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
    </tr>";
    // Looping data dari database
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["product_id"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>Rp " . number_format($row["price"], 0, ',', '.') . "</td>
        <td>" . $row["description"] . "</td>
      </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data yang ditemukan.";
}
$conn->close(); // Menutup koneksi
