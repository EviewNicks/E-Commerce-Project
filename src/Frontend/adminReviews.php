<?php
include BASE_PATH . '/backend/connection.php';

// Ambil daftar produk untuk filter
$sql_products = "SELECT product_id, name FROM products";
$product_result = $conn->query($sql_products);
$products = [];
while ($row = $product_result->fetch_assoc()) {
    $products[] = $row;

    // Ambil ulasan berdasarkan produk yang dipilih atau tampilkan semua ulasan
    $product_id = $_GET['product_id'] ?? null;
    $sql_reviews = "SELECT r.review_id, r.rating, r.comment, r.created_at, p.name AS product_name, u.username
                FROM reviews r
                JOIN products p ON r.product_id = p.product_id
                JOIN users u ON r.user_id = u.user_id";

    if ($product_id) {
        $sql_reviews .= " WHERE r.product_id = $product_id"; // Filter berdasarkan produk yang dipilih
    }
}

$reviews_result = $conn->query($sql_reviews);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Produk</title>
    <link href="./../../output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Daftar Ulasan Produk</h2>

        <!-- Filter Produk -->
        <form action="" method="GET" class="mb-4">
            <label for="product_id" class="mr-2">Pilih Produk:</label>
            <select id="product_id" name="product_id" class="p-2 border rounded">
                <option value="">Semua Produk</option>
                <?php foreach ($products as $product) : ?>
                    <option value="<?= $product['product_id'] ?>" <?= isset($product_id) && $product_id == $product['product_id'] ? 'selected' : '' ?>>
                        <?= $product['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">Filter</button>
        </form>

        <!-- Tabel Ulasan -->
        <table class="min-w-full border-collapse border border-gray-300 shadow-md rounded-lg text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 border">Produk</th>
                    <th class="px-4 py-2 border">Username</th>
                    <th class="px-4 py-2 border">Rating</th>
                    <th class="px-4 py-2 border">Komentar</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php while ($review = $reviews_result->fetch_assoc()) : ?>
                    <tr class="border border-gray-300 hover:bg-gray-100">
                        <td class="px-4 py-2"><?= $review['product_name'] ?></td>
                        <td class="px-4 py-2"><?= $review['username'] ?></td>
                        <td class="px-4 py-2"><?= $review['rating'] ?></td>
                        <td class="px-4 py-2"><?= $review['comment'] ?></td>
                        <td class="px-4 py-2"><?= $review['created_at'] ?></td>
                        <td class="px-4 py-2 text-center">
                            <a href="deleteReview.php?id=<?= $review['review_id'] ?>" class="text-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
$conn->close(); // Menutup koneksi
?>