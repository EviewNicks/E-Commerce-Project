<?php
include __DIR__ . '/../backend/connection.php'; // Menghubungkan database

// Query untuk mengambil data promosi
$sql = "SELECT promotion_id, name, discount, start_date, end_date FROM promotions";
$result = $conn->query($sql);

// Menampilkan data promosi
if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Discount</th>
        <th>Start Date</th>
        <th>End Date</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["promotion_id"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["discount"] . "%</td>
        <td>" . $row["start_date"] . "</td>
        <td>" . $row["end_date"] . "</td>
      </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada promosi ditemukan.";
}
$conn->close(); // Menutup koneksi
?>
