<?php
include BASE_PATH . '/backend/connection.php'; // Menghubungkan database

if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        echo "<p class='text-green-500'>Produk berhasil ditambahkan!</p>";
    } elseif ($_GET['status'] === 'error') {
        echo "<p class='text-red-500'>Terjadi kesalahan saat menambahkan produk.</p>";
    }
}

if (isset($_GET['status'])) {
    if ($_GET['status'] === 'deleted') {
        echo "<p class='text-green-500'>Produk berhasil dihapus!</p>";
    } elseif ($_GET['status'] === 'error') {
        echo "<p class='text-red-500'>Terjadi kesalahan saat menghapus produk.</p>";
    }
}

echo "<div class='mb-4'>
        <a href='?page=addProduct&action=add' class='bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600'>
            Tambah Produk Baru
        </a>
      </div>";


// Query untuk mengambil data produk
$sql = "SELECT product_id, name, price, description, is_featured FROM products";
$result = $conn->query($sql);

// Menampilkan data produk
if ($result->num_rows > 0) {
    echo "
    <div class='overflow-x-auto'>
        <table class='min-w-full border-collapse border border-gray-300 shadow-md rounded-lg'>
        <thead class='bg-blue-600 text-white'>
            <tr>
                <th class='px-4 py-2 border border-gray-300'>ID</th>
                <th class='px-4 py-2 border border-gray-300'>Name</th>
                <th class='px-4 py-2 border border-gray-300'>Price</th>
                <th class='px-4 py-2 border border-gray-300'>Description</th>
                <th class='px-4 py-2 border border-gray-300'>Featured</th>
                <th class='px-4 py-2 border border-gray-300'>Actions</th>
            </tr>
        </thead>
        <tbody class='bg-white'>";
    while ($row = $result->fetch_assoc()) {
        $featured = $row["is_featured"] ? "Yes" : "No";
        echo "
            <tr class='border border-gray-300 hover:bg-gray-100'>
                <td class='px-4 py-2 text-center'>" . $row["product_id"] . "</td>
                <td class='px-4 py-2'>" . $row["name"] . "</td>
                <td class='px-4 py-2'>Rp " . number_format($row["price"], 0, ',', '.') . "</td>
                <td class='px-4 py-2'>" . $row["description"] . "</td>
                <td class='px-4 py-2 text-center'>" . $featured . "</td>
                <td class='px-4 py-2 text-center'>
                    <a href='editProduct.php?id=" . $row["product_id"] . "' class='text-blue-500 hover:underline'>Edit</a> |
                    <a href='deleteProduct.php?id=" . $row["product_id"] . "' class='text-red-500 hover:underline'>Delete</a>
                </td>
            </tr>";
    }
    echo "
        </tbody>
        </table>
    </div>";
} else {
    echo "<p class='text-gray-600'>Tidak ada data yang ditemukan.</p>";
}
$conn->close(); // Menutup koneksi
