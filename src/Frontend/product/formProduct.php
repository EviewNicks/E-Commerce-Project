<?php
include BASE_PATH . '/backend/connection.php'; // Koneksi database

// Ambil kategori dari tabel categories
$sql = "SELECT category_id, name FROM categories WHERE is_active = 1";
$result = $conn->query($sql);
$categories = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="./../../output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Tambah Produk</h2>

        <form action="src/backend/product/addProductAction.php" method="POST" enctype="multipart/form-data">
            <!-- Nama Produk -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Nama Produk</label>
                <input type="text" id="name" name="name" required
                    class="w-full p-2 border border-gray-300 rounded">
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium">Kategori</label>
                <select id="category" name="category_id" required class="w-full p-2 border border-gray-300 rounded">
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['category_id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full p-2 border border-gray-300 rounded"></textarea>
            </div>

            <!-- Harga -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium">Harga</label>
                <input type="number" id="price" name="price" required step="0.01"
                    class="w-full p-2 border border-gray-300 rounded">
            </div>

            <!-- Gambar -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium">Gambar Produk</label>
                <input type="file" id="image" name="image" required
                    class="w-full p-2 border border-gray-300 rounded">
            </div>

            <!-- Produk Unggulan -->
            <div class="mb-4">
                <label for="featured" class="inline-flex items-center">
                    <input type="checkbox" id="featured" name="is_featured" value="1"
                        class="form-checkbox h-5 w-5 text-blue-600">
                    <span class="ml-2 text-sm">Tandai sebagai produk unggulan</span>
                </label>
            </div>

            <!-- Tags -->
            <div class="mb-4">
                <label for="tags" class="block text-sm font-medium">Tags (Opsional)</label>
                <input type="text" id="tags" name="tags" placeholder="Contoh: fashion, pakaian"
                    class="w-full p-2 border border-gray-300 rounded">
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Produk</button>
        </form>
    </div>
</body>

</html>