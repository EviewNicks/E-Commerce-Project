<?php
include __DIR__ . '/../backend/connection.php'; // Menghubungkan database

// Query untuk mengambil data promosi
$sql = "SELECT promotion_id, name, discount, start_date, end_date FROM promotions";
$result = $conn->query($sql);

// Menampilkan data promosi
if ($result->num_rows > 0) {
    echo "
    <div class='overflow-x-auto'>
        <table class='min-w-full border-collapse border border-gray-300 shadow-md rounded-lg'>
        <thead class='bg-blue-600 text-white'>
            <tr>
                <th class='px-4 py-2 border border-gray-300'>Promotion ID</th>
                <th class='px-4 py-2 border border-gray-300'>Name</th>
                <th class='px-4 py-2 border border-gray-300'>Discount</th>
                <th class='px-4 py-2 border border-gray-300'>Start Date</th>
                <th class='px-4 py-2 border border-gray-300'>End Date</th>
            </tr>
        </thead>
        <tbody class='bg-white'>";
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr class='border border-gray-300 hover:bg-gray-100'>
                <td class='px-4 py-2 text-center'>" . $row["promotion_id"] . "</td>
                <td class='px-4 py-2'>" . $row["name"] . "</td>
                <td class='px-4 py-2 text-right'>" . $row["discount"] . "%</td>
                <td class='px-4 py-2 text-center'>" . date('d-m-Y', strtotime($row["start_date"])) . "</td>
                <td class='px-4 py-2 text-center'>" . date('d-m-Y', strtotime($row["end_date"])) . "</td>
            </tr>";
    }
    echo "
        </tbody>
        </table>
    </div>";
} else {
    echo "<p class='text-gray-600'>Tidak ada promosi ditemukan.</p>";
}
$conn->close(); // Menutup koneksi
