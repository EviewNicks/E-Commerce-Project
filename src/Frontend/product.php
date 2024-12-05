<?php
include BASE_PATH . '/backend/connection.php'; // Menghubungkan database
include __DIR__ . '/../src/Frontend/assets/navbar.php';

// Menampilkan pesan status jika ada
if (isset($_GET['status'])) {
    $statusMessages = [
        'success' => "<p class='text-green-500'>Produk berhasil ditambahkan!</p>",
        'error' => "<p class='text-red-500'>Terjadi kesalahan saat menambahkan produk.</p>",
        'upload_error' => "<p class='text-yellow-500'>Gagal mengunggah gambar produk.</p>",
        'deleted' => "<p class='text-green-500'>Produk berhasil dihapus!</p>",
        'invalid' => "<p class='text-yellow-500'>Akses tidak valid.</p>",
    ];
    echo $statusMessages[$_GET['status']] ?? '';
}

// Tombol tambah produk
echo "<div class='mb-4'>
        <a href='?page=formProduct&action=add' class='bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600'>
            Tambah Produk Baru
        </a>
      </div>";

// Query untuk mengambil data produk
$sql = "
    SELECT p.product_id, p.name, p.price, p.image_url, p.is_featured, c.name AS category_name
    FROM products p
    JOIN categories c ON p.category_id = c.category_id
";
$result = $conn->query($sql);

// Menampilkan data produk
if ($result->num_rows > 0) {
    echo "
    <div class='overflow-x-auto'>
        <table class='min-w-full border-collapse border border-gray-300 shadow-md rounded-lg'>
        <thead class='bg-blue-600 text-white'>
            <tr>
                <th class='px-4 py-2 border border-gray-300'>No</th>
                <th class='px-4 py-2 border border-gray-300'>Image</th>
                <th class='px-4 py-2 border border-gray-300'>Name</th>
                <th class='px-4 py-2 border border-gray-300'>Category</th>
                <th class='px-4 py-2 border border-gray-300'>Price</th>
                <th class='px-4 py-2 border border-gray-300'>Featured</th>
                <th class='px-4 py-2 border border-gray-300'>Actions</th>
            </tr>
        </thead>
        <tbody class='bg-white'>";

    $no = 1; // Nomor urut
    while ($row = $result->fetch_assoc()) {
        $featured_checkbox = $row["is_featured"] ? "checked" : "";
        error_log("Image URL: " . $row["image_url"]);
        $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/E-Commerce-Project/public/";
        $image_html = $row["image_url"]
            ? "<img src='" . $base_url . $row["image_url"] . "' alt='Product Image'style='max-width: 80px; height: auto;' class='max-w-[80px] h-auto object-cover rounded '>"
            : "<span class='text-gray-500'>No Image</span>";
        echo "
            <tr class='border border-gray-300 hover:bg-gray-100'>
                <td class='px-4 py-2 text-center'>" . $no++ . "</td>
                <td class='px-4 py-2 text-center'>" . $image_html . "</td>
                <td class='px-4 py-2'>" . $row["name"] . "</td>
                <td class='px-4 py-2'>" . $row["category_name"] . "</td>
                <td class='px-4 py-2'>Rp " . number_format($row["price"], 0, ',', '.') . "</td>
                <td class='px-4 py-2 text-center'>
                <input 
                    type='checkbox' 
                    data-id='" . $row["product_id"] . "' 
                    class='featured-checkbox' 
                    $featured_checkbox 
                    onchange='toggleFeatured(this)'
                >
                </td>
                <td class='px-4 py-2 text-center'>
                    <a href='?page=formProduct&action=edit&id=" . $row["product_id"] . "' class='text-blue-500 hover:underline'>Edit</a>
                    <a href='?page=deleteProductAction&id=" . $row["product_id"] . "' class='text-red-500 hover:underline' onclick='return confirm(\"Yakin ingin menghapus produk ini?\");'>Delete</a>
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

// Menutup koneksi
$conn->close();
?>

<script>
    function toggleFeatured(checkbox) {
        const productId = checkbox.getAttribute('data-id');
        const isFeatured = checkbox.checked ? 1 : 0;

        fetch('?page=updateFeatured', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    product_id: productId,
                    is_featured: isFeatured
                }),
            })
            .then(response => {
                console.log('Response Status:', response.status); // Debug status respons
                return response.json(); // Parsing JSON
            })
            .then(data => {
                console.log('Response Data:', data); // Debug data dari server
                if (data.success) {
                    alert('Status Featured berhasil diperbarui!');
                } else {
                    alert('Terjadi kesalahan: ' + data.message);
                    checkbox.checked = !isFeatured;
                    checkbox.classList.add('border-red-500');
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                checkbox.checked = !isFeatured;
                checkbox.classList.add('border-red-500');
            });
    }
</script>