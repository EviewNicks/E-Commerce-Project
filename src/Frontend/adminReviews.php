<?php
include BASE_PATH . '/backend/connection.php';
include __DIR__ . '/../src/Frontend/assets/navbar.php'; 

// Ambil daftar produk untuk filter
$sql_products = "SELECT product_id, name FROM products";
$product_result = $conn->query($sql_products);
$products = [];
while ($row = $product_result->fetch_assoc()) {
    $products[] = $row;
}

// Ambil ulasan berdasarkan produk yang dipilih atau tampilkan semua ulasan
$product_id = $_GET['product_id'] ?? null;
$sql_reviews = "SELECT r.review_id, r.rating, r.comment, r.created_at, p.name AS product_name, u.username
                FROM reviews r
                JOIN products p ON r.product_id = p.product_id
                JOIN users u ON r.user_id = u.user_id";

if ($product_id) {
    $sql_reviews .= " WHERE r.product_id = $product_id"; // Filter berdasarkan produk yang dipilih
}

$reviews_result = $conn->query($sql_reviews);
?>


<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Daftar Ulasan Produk</h2>

    <!-- Filter Produk -->
    <form id="filter-reviews-form" class="mb-4">
        <select name="product_id" id="product-select" class="border rounded px-2 py-1">
            <option value="">Semua Produk</option>
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['product_id'] ?>">
                    <?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
            <!-- Tambahkan opsi produk dari database -->
        </select>
        <select name="rating" id="rating-select" class="border rounded px-2 py-1">
            <option value="">Semua Rating</option>
            <option value="5">5 Bintang</option>
            <option value="4">4 Bintang</option>
            <option value="3">3 Bintang</option>
            <option value="2">2 Bintang</option>
            <option value="1">1 Bintang</option>
        </select>
        <input type="date" name="start_date" class="border rounded px-2 py-1" />
        <input type="date" name="end_date" class="border rounded px-2 py-1" />
        <button type="button" onclick="applyFilter()" class="bg-blue-500 text-white px-3 py-2 rounded">
            Filter
        </button>
        <button type="button" onclick="resetFilter()" class="bg-gray-500 text-white px-3 py-2 rounded">
            Reset
        </button>
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
        <tbody id="reviews-body" class="bg-white">
            <?php while ($review = $reviews_result->fetch_assoc()) : ?>
                <tr class="border border-gray-300 hover:bg-gray-100">
                    <td class="px-4 py-2"><?= $review['product_name'] ?></td>
                    <td class="px-4 py-2"><?= $review['username'] ?></td>
                    <td class="px-4 py-2"><?= $review['rating'] ?></td>
                    <td class="px-4 py-2"><?= $review['comment'] ?></td>
                    <td class="px-4 py-2"><?= $review['created_at'] ?></td>
                    <td class="px-4 py-2 text-center">
                        <button onclick="deleteReview(<?= $review['review_id'] ?>)" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
    async function deleteReview(reviewId) {
        const confirmed = confirm('Apakah Anda yakin ingin menghapus ulasan ini?');
        if (!confirmed) return;

        try {
            const response = await fetch(`?page=deleteReview&id=${reviewId}`, {
                method: 'GET',
            });

            const result = await response.json();

            if (result.success) {
                alert(result.message);
                // Refresh halaman setelah berhasil menghapus
                location.reload();
            } else {
                alert('Gagal menghapus ulasan: ' + result.message);
            }
        } catch (error) {
            console.error('Fetch error:', error);
            alert('Terjadi kesalahan saat mencoba menghapus ulasan.');
        }
    }

    async function applyFilter() {
        const form = document.getElementById('filter-reviews-form');
        const formData = new FormData(form);

        try {
            const response = await fetch('?page=filterReviews', {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                throw new Error(`HTTP Error: ${response.status}`);
            }

            const data = await response.json();
            console.log('Response:', data); // Debug respons

            if (data.success) {
                renderReviews(data.reviews); // Render ulasan
            } else {
                alert('Gagal memuat ulasan: ' + data.message);
            }
        } catch (error) {
            console.error('Error:', error); // Debug error
            alert('Terjadi kesalahan saat memuat ulasan.');
        }
    }


    function resetFilter() {
        // Reset form filter dan panggil ulang API
        document.getElementById('filter-reviews-form').reset();
        applyFilter(); // Muat ulang semua ulasan
    }

    function renderReviews(reviews) {
        const reviewsBody = document.getElementById('reviews-body');
        if (reviews.length === 0) {
            reviewsBody.innerHTML = `<tr><td colspan="6" class="text-center">Tidak ada ulasan ditemukan.</td></tr>`;
            return;
        }

        let html = reviews
            .map(
                (review) => `
                <tr class="border border-gray-300 hover:bg-gray-100">
                    <td class="px-4 py-2">${review.product_name}</td>
                    <td class="px-4 py-2">${review.username}</td>
                    <td class="px-4 py-2">${review.rating}</td>
                    <td class="px-4 py-2">${review.comment}</td>
                    <td class="px-4 py-2">${review.created_at}</td>
                    <td class="px-4 py-2 text-center">
                        <button onclick="deleteReview(${review.review_id})" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </td>
                </tr>
            `
            )
            .join('');

        reviewsBody.innerHTML = html;
    }

    // Muat data ulasan saat halaman pertama kali dimuat
    applyFilter();
</script>

<?php
$conn->close(); // Menutup koneksi
?>