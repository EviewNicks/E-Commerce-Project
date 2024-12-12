<?php
include BASE_PATH . '/backend/connection.php';
session_start();

// Periksa apakah keranjang kosong
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>Keranjang Anda kosong. <a href='index.php?page=homePageUser'>Belanja sekarang</a></p>";
    exit();
}



// Query untuk mendapatkan data produk berdasarkan ID
$cart = $_SESSION['cart'];
$product_ids = array_column($cart, 'product_id');



// Validasi apakah product_ids ada
if (empty($product_ids)) {
    die("Keranjang Anda kosong. <a href='index.php?page=products'>Belanja sekarang</a>");
}

$placeholders = implode(',', array_fill(0, count($product_ids), '?'));

// Periksa koneksi database
if (!$conn) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT product_id, name, price, image_url FROM products WHERE product_id IN ($placeholders)");
if (!$stmt) {
    die("Query gagal: " . $conn->error);
}

$stmt->bind_param(str_repeat('i', count($product_ids)), ...$product_ids);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[$row['product_id']] = $row;
}

$total = 0; // Inisialisasi total
// Format total harga


// echo "<h3>Total: Rp " . number_format($total, 2, ',', '.') . "</h3>";
// echo "<a href='index.php?page=checkout'>Lanjut ke Pembayaran</a>";

$data = [
    'cart' => $cart,
    'products' => $products,
    'total' => $total,
];

$productCount = count($cart);


function render_chart($section_name, $data)
{
    // Pastikan variabel yang akan digunakan di dalam komponen tersedia
    if (is_array($data)) {
        extract($data); // Mengubah array menjadi variabel
    }

    include BASE_PATH . "Frontend/user/component/$section_name.php";
}




$stmt->close();
$conn->close();
?>

<?php



include BASE_PATH . 'Frontend/assets/userNavbar.php';
?>


<div class="col-span-12 gap-2 flex flex-col items-start content-start pt-[88px] w-[1120px] mx-auto">

    <!-- BreadCrumb -->
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="#"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Descryption
                        Product</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Daftar
                        Belanjaan</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="self-stretch flex  items-start gap-2">
        <?php

        render_chart('list-keranjang', $data);
        render_chart('ringkasan-belanja', $data);

        ?>
    </div>


</div>

<?php
include BASE_PATH . 'Frontend/assets/footer.php';
?>

<script>
    // Hapus produk tertentu
    function deleteProduct(productId) {
        console.log("ID Produk yang akan dihapus:", productId); // Debug
        if (confirm("Apakah Anda yakin ingin menghapus produk ini dari keranjang?")) {
            window.location.href = "?page=deleteProduct&product_id=" + productId;
        }
    }

    // Hapus semua produk
    function deleteAllProducts() {
        if (confirm("Apakah Anda yakin ingin menghapus semua produk dari keranjang?")) {
            window.location.href = "?page=deleteAllProducts";
        }
    }

    document.addEventListener('DOMContentLoaded', async () => {
        try {
            // Ambil promo dari server
            const response = await fetch('promo-api.php'); // Ubah ke path PHP yang sesuai
            const data = await response.json();

            const promoContainer = document.getElementById('promo-container');
            const promotions = data.promotions;

            // Bersihkan kontainer
            promoContainer.innerHTML = '';

            if (promotions.length > 0) {
                promotions.forEach(promo => {
                    const promoHTML = `
                    <div class="flex items-center justify-between p-[6px_12px] w-full rounded-[12px] border border-Secondary bg-Secondary-Colors-4">
                        <div class="flex items-center gap-[14px]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[32px] h-[32px]" viewBox="0 0 32 32" fill="none">
                                <!-- SVG Content -->
                            </svg>
                            <p class="text-Primary font-quicksand text-body-medium">
                                Kamu Dapat ${promo.name}
                            </p>
                        </div>
                    </div>
                `;
                    promoContainer.insertAdjacentHTML('beforeend', promoHTML);
                });
            } else {
                promoContainer.innerHTML = `
                <div class="flex items-center justify-between p-[6px_12px] w-full rounded-[12px] border border-Secondary bg-Secondary-Colors-4">
                    <p class="text-Primary font-quicksand text-body-medium">Makin Hemat pakai promo</p>
                </div>`;
            }
        } catch (error) {
            console.error('Error fetching promotions:', error);
        }
    });
</script>