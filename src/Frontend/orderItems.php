<?php
include __DIR__ . '/../backend/connection.php'; // Menghubungkan database

// Query untuk mengambil data item dalam pesanan
$sql = "SELECT order_item_id, order_id, product_id, quantity, price, total_price FROM order_items";
$result = $conn->query($sql);

// Menampilkan data item pesanan
if ($result->num_rows > 0) {
    echo "
    <div class='overflow-x-auto'>
        <table class='min-w-full border-collapse border border-gray-300 shadow-md rounded-lg'>
        <thead class='bg-blue-600 text-white'>
            <tr>
                <th class='px-4 py-2 border border-gray-300'>Order Item ID</th>
                <th class='px-4 py-2 border border-gray-300'>Order ID</th>
                <th class='px-4 py-2 border border-gray-300'>Product ID</th>
                <th class='px-4 py-2 border border-gray-300'>Quantity</th>
                <th class='px-4 py-2 border border-gray-300'>Price</th>
                <th class='px-4 py-2 border border-gray-300'>Total Price</th>
            </tr>
        </thead>
        <tbody class='bg-white'>";
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr class='border border-gray-300 hover:bg-gray-100'>
                <td class='px-4 py-2 text-center'>" . $row["order_item_id"] . "</td>
                <td class='px-4 py-2 text-center'>" . $row["order_id"] . "</td>
                <td class='px-4 py-2 text-center'>" . $row["product_id"] . "</td>
                <td class='px-4 py-2 text-center'>" . $row["quantity"] . "</td>
                <td class='px-4 py-2 text-right'>Rp " . number_format($row["price"], 0, ',', '.') . "</td>
                <td class='px-4 py-2 text-right'>Rp " . number_format($row["total_price"], 0, ',', '.') . "</td>
            </tr>";
    }
    echo "
        </tbody>
        </table>
    </div>";
} else {
    echo "<p class='text-gray-600'>Tidak ada item pesanan ditemukan.</p>";
}
$conn->close(); // Menutup koneksi
