<?php
include __DIR__ . '/../backend/connection.php'; // Menghubungkan database

// Query untuk mengambil data pesanan
$sql = "SELECT order_id, user_id, total_price, status, shipping_cost, promo_applied, created_at FROM orders";
$result = $conn->query($sql);

// Menampilkan data pesanan
if ($result->num_rows > 0) {
    echo "
    <div class='overflow-x-auto'>
        <table class='min-w-full border-collapse border border-gray-300 shadow-md rounded-lg'>
        <thead class='bg-blue-600 text-white'>
            <tr>
                <th class='px-4 py-2 border border-gray-300'>Order ID</th>
                <th class='px-4 py-2 border border-gray-300'>User ID</th>
                <th class='px-4 py-2 border border-gray-300'>Total Price</th>
                <th class='px-4 py-2 border border-gray-300'>Status</th>
                <th class='px-4 py-2 border border-gray-300'>Shipping Cost</th>
                <th class='px-4 py-2 border border-gray-300'>Promo Applied</th>
                <th class='px-4 py-2 border border-gray-300'>Created At</th>
            </tr>
        </thead>
        <tbody class='bg-white'>";
    while ($row = $result->fetch_assoc()) {
        $promo = $row["promo_applied"] ? $row["promo_applied"] : "None";
        $statusColor = $row["status"] === "completed" ? "text-green-600" : "text-red-600";
        echo "
            <tr class='border border-gray-300 hover:bg-gray-100'>
                <td class='px-4 py-2 text-center'>" . $row["order_id"] . "</td>
                <td class='px-4 py-2 text-center'>" . $row["user_id"] . "</td>
                <td class='px-4 py-2 text-right'>Rp " . number_format($row["total_price"], 0, ',', '.') . "</td>
                <td class='px-4 py-2 text-center " . $statusColor . "'>" . ucfirst($row["status"]) . "</td>
                <td class='px-4 py-2 text-right'>Rp " . number_format($row["shipping_cost"], 0, ',', '.') . "</td>
                <td class='px-4 py-2 text-center'>" . $promo . "</td>
                <td class='px-4 py-2 text-center'>" . $row["created_at"] . "</td>
            </tr>";
    }
    echo "
        </tbody>
        </table>
    </div>";
} else {
    echo "<p class='text-gray-600'>Tidak ada pesanan ditemukan.</p>";
}
$conn->close(); // Menutup koneksi
