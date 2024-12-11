<?php
include BASE_PATH . '/backend/connection.php';

function render_decsripsi($section_name, $product)
{
    include BASE_PATH . "Frontend/user/component/$section_name.php";
}

if (!isset($_GET['id'])) {
    die("Produk tidak ditemukan.");
}

$id = intval($_GET['id']); // Sanitasi ID untuk keamanan

// Query untuk mengambil data produk berdasarkan ID
$query = "
    SELECT 
        product_id, 
        name, 
        description, 
        price, 
        image_url, 
        is_featured, 
        tags 
    FROM 
        products 
    WHERE 
        product_id = ?
";

$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Query Error: " . $conn->error);
}

// Bind parameter ID dan eksekusi
$stmt->bind_param("i", $id);
$stmt->execute();

// Ambil hasil query
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// Periksa apakah produk ditemukan
if (!$product) {
    die("Produk dengan ID $id tidak ditemukan.");
}

echo "Session ID: " . session_id(); // Debugging

// Tutup statement
$stmt->close();

// Tutup koneksi jika sudah tidak diperlukan
$conn->close();


include BASE_PATH . 'Frontend/assets/usernavbar.php';
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
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
                </div>
            </li>
        </ol>
    </nav>
    <div class="self-stretch relative grid grid-cols-12 auto-rows-[80px] gap-2 grid-auto-flow-row" style="grid-auto-flow: row;">
        <?php

        render_decsripsi('ImageProduct', $product);
        render_decsripsi('ActionDescryption', $product);
        render_decsripsi('commentDescryption', $product);

        ?>
    </div>
</div>

<?php
include BASE_PATH . 'Frontend/assets/footer.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btnDecrease = document.getElementById('btn-decrease');
        const btnIncrease = document.getElementById('btn-increase');
        const quantityElement = document.getElementById('quantity');
        const stockTotalElement = document.getElementById('stock-total');
        const subtotalElement = document.getElementById('subtotal');

        const addToCartButton = document.getElementById('add-to-cart');
        const productId = <?= $product['product_id']; ?>; // Product ID dari PHP

        const productPrice = <?= $product['price']; ?>; // Harga produk dari PHP
        const stockTotal = parseInt(stockTotalElement.textContent, 10); // Total stok dari PHP

        let quantity = 1; // Jumlah awal

        function updateUI() {
            // Update quantity dan subtotal
            quantityElement.textContent = quantity;
            subtotalElement.textContent = `Rp ${Intl.NumberFormat('id-ID').format(productPrice * quantity)}`;

            // Enable/disable buttons
            btnDecrease.disabled = quantity <= 1;
            btnIncrease.disabled = quantity >= stockTotal;
        }

        // Event listeners untuk tombol
        btnDecrease.addEventListener('click', () => {
            if (quantity > 1) {
                quantity--;
                updateUI();
            }
        });

        btnIncrease.addEventListener('click', () => {
            if (quantity < stockTotal) {
                quantity++;
                updateUI();
            }
        });

        // Inisialisasi UI
        updateUI();

        addToCartButton.addEventListener('click', () => {
            const quantity = parseInt(quantityElement.textContent, 10); // Ambil quantity dari UI

            // Redirect ke productOrder dengan parameter dinamis
            const url = `index.php?page=productOrder&product_id=${productId}&quantity=${quantity}&price=${productPrice}`;
            window.location.href = url;
        });
    });
</script>