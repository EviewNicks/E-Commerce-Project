<?php
include BASE_PATH . '/backend/connection.php'; // Koneksi database

// Cek mode (add atau edit)
$action = $_GET['action'] ?? 'add';
$product = null;

if ($action === 'edit') {
    // Ambil ID produk dari parameter
    $product_id = $_GET['id'] ?? null;

    if ($product_id) {
        // Query untuk mendapatkan data produk
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
    }
}


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
        <h2 class="text-2xl font-bold mb-4">
            <?= $action === 'edit' ? 'Edit Produk' : 'Tambah Produk' ?>
        </h2>

        <form action="?page=<?= $action === 'edit' ? 'editProductAction' : 'addProductAction' ?>" method="POST" enctype="multipart/form-data">
            <!-- Input Produk -->
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?? '' ?>">

            <!-- Nama Produk -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Nama Produk</label>
                <input type="text" id="name" name="name" required
                    class="w-full p-2 border border-gray-300 rounded" value="<?= $product['name'] ?? '' ?>">
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium">Kategori</label>
                <select id="category" name="category_id" required class="w-full p-2 border border-gray-300 rounded">
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['category_id'] ?>"
                            <?= isset($product['category_id']) && $product['category_id'] == $category['category_id'] ? 'selected' : '' ?>>
                            <?= $category['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full p-2 border border-gray-300 rounded">
                    <?= $product['description'] ?? '' ?>
                </textarea>
            </div>

            <!-- Harga -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium">Harga</label>
                <input type="number" id="price" name="price" required step="0.01"
                    class="w-full p-2 border border-gray-300 rounded"
                    value="<?= $product['price'] ?? '' ?>">
            </div>

            <!-- Gambar -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium">Gambar Produk</label>
                <input type="file" id="image" name="image"
                    class="w-full p-2 border border-gray-300 rounded">
                <?php if ($action === 'edit' && $product['image_url']) : ?>
                    <p class="mt-2 text-sm text-gray-600">Gambar saat ini:</p>
                    <img src="<?= $product['image_url'] ?>" alt="Product Image"
                        class="mt-2 h-16 w-16 object-cover rounded">
                <?php endif; ?>
            </div>

            <!-- Produk Unggulan -->
            <div class="mb-4">
                <label for="featured" class="inline-flex items-center">
                    <input type="checkbox" id="featured" name="is_featured" value="1"
                        class="form-checkbox h-5 w-5 text-blue-600" <?= isset($product['is_featured']) && $product['is_featured'] ? 'checked' : '' ?>>
                    <span class="ml-2 text-sm">Tandai sebagai produk unggulan</span>
                </label>
            </div>

            <!-- Tags -->
            <div class="mb-4">
                <label for="tags" class="block text-sm font-medium">Tags (Opsional)</label>
                <input type="text" id="tags" name="tags" placeholder="Contoh: fashion, pakaian"
                    class="w-full p-2 border border-gray-300 rounded" value="<?= $product['tags'] ?? '' ?>">
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                <?= $action === 'edit' ? 'Update Produk' : 'Tambah Produk' ?>
            </button>
        </form>
    </div>
</body>

</html>