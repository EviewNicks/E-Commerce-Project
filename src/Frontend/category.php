<?php
include __DIR__ . '/../backend/connection.php'; // Menghubungkan database

// Query untuk mengambil data kategori
$sql = "SELECT category_id, name, description, parent_category_id, is_active FROM categories";
$result = $conn->query($sql);

// Menampilkan data kategori
if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Parent Category</th>
        <th>Is Active</th>
    </tr>";
    // Looping data dari database
    while ($row = $result->fetch_assoc()) {
        $parent = $row["parent_category_id"] ? $row["parent_category_id"] : "None";
        $status = $row["is_active"] ? "Active" : "Inactive";
        echo "<tr>
        <td>" . $row["category_id"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["description"] . "</td>
        <td>" . $parent . "</td>
        <td>" . $status . "</td>
      </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data kategori ditemukan.";
}
$conn->close(); // Menutup koneksi
