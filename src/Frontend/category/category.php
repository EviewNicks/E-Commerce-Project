<?php
include BASE_PATH . '/backend/connection.php';

$success = isset($_GET['success']) ? intval($_GET['success']) : null;
if ($success) {
    $messages = [
        1 => 'Kategori berhasil ditambahkan.',
        2 => 'Kategori berhasil diperbarui.',
        3 => 'Kategori berhasil dihapus.',
    ];
    echo "<p class='bg-green-100 text-green-600 p-2 rounded-md'>{$messages[$success]}</p>";
}


// Query untuk mengambil data kategori
$sql = "SELECT c.category_id, c.name, c.description, p.name AS parent_name, c.is_active 
        FROM categories c 
        LEFT JOIN categories p ON c.parent_category_id = p.category_id";
$result = $conn->query($sql);
if (!$result) {
    die("Query error: " . $conn->error);
}


// Menampilkan data kategori
if ($result->num_rows > 0) {
    echo "
    <div class='flex justify-between items-center mb-4'>
        <h2 class='text-xl font-semibold'>Daftar Kategori</h2>
        <a href='index.php?page=editCategory' class='bg-blue-600 text-white px-4 py-2 rounded-md'>Tambah Kategori</a>
    </div>
    
    <div class='overflow-x-auto'>
        <table class='min-w-full border-collapse border border-gray-300 shadow-md rounded-lg text-sm'>
        <thead class='bg-blue-600 text-white'>
            <tr>
                <th class='px-4 py-2 border border-gray-300'>ID</th>
                <th class='px-4 py-2 border border-gray-300'>Name</th>
                <th class='px-4 py-2 border border-gray-300'>Description</th>
                <th class='px-4 py-2 border border-gray-300'>Parent Category</th>
                <th class='px-4 py-2 border border-gray-300'>Status</th>
                <th class='px-4 py-2 border border-gray-300'>Action</th>
            </tr>
        </thead>
        <tbody class='bg-white'>";

    // Looping data dari database
    while ($row = $result->fetch_assoc()) {
        $parent = $row["parent_name"] ? $row["parent_name"] : "None";
        $status = $row["is_active"] ? "<span class='text-green-600'>Active</span>" : "<span class='text-red-600'>Inactive</span>";
        echo "
            <tr class='border border-gray-300 hover:bg-gray-100'>
                <td class='px-4 py-2 text-center'>" . $row["category_id"] . "</td>
                <td class='px-4 py-2'>" . $row["name"] . "</td>
                <td class='px-4 py-2'>" . $row["description"] . "</td>
                <td class='px-4 py-2'>" . $parent . "</td>
                <td class='px-4 py-2 text-center'>" . $status . "</td>
                <td class='px-4 py-2 text-center'>
                    <a href='index.php?page=editCategory&id={$row['category_id']}' class='text-blue-600'>Edit</a>
                    <a href='" . BASE_PATH . "backend/category/deleteCategory.php?id=" . $row['category_id'] . "' class='text-red-600' onclick='return confirm(\"Apakah Anda yakin ingin menghapus kategori ini?\")'>Hapus</a>
                </td>
            </tr>";
    }

    echo "
        </tbody>
        </table>
    </div>";
} else {
    echo "<p class='text-gray-600'>Tidak ada data kategori ditemukan.</p>";
}

$conn->close(); // Menutup koneksi
