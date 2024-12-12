<?php

include BASE_PATH . '/backend/connection.php';
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    echo "Anda belum login!";
    exit;
}

// Ambil user_id dari session
$user_id = $_SESSION['user_id'];

// Query untuk mendapatkan shipping address utama (is_primary = 1)
$query_shipping = "SELECT sa.address_id, sa.address, sa.city, sa.postal_code, u.username 
                   FROM shipping_address sa 
                   JOIN users u ON sa.user_id = u.user_id 
                   WHERE sa.user_id = ? AND sa.is_primary = 1";

$stmt = $conn->prepare($query_shipping);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Jika data ditemukan, ambil datanya
if ($result->num_rows > 0) {
    $shipping = $result->fetch_assoc();
    $_SESSION['address_id'] = $shipping['address_id']; // Simpan address_id ke session
    $address = $shipping['address'];
    $city = $shipping['city'];
    $postal_code = $shipping['postal_code'];
    $username = $shipping['username'];
} else {
    // Jika tidak ada data shipping address
    $_SESSION['address_id'] = null; // Pastikan address_id null jika tidak ada data
    $address = "Alamat tidak ditemukan";
    $city = "-";
    $postal_code = "-";
    $username = $_SESSION['username']; // Default ambil dari session
}


// Periksa apakah keranjang kosong
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>Keranjang Anda kosong. <a href='index.php?page=homePageUser'>Belanja sekarang</a></p>";
    exit();
} else {
    error_log('Keranjang ditemukan: ' . print_r($_SESSION['cart'], true));
}


// Proses data keranjang untuk mendapatkan informasi produk
$cart = $_SESSION['cart'];
$product_ids = array_column($cart, 'product_id');
$quantities = array_column($cart, 'quantity');
// Query untuk mendapatkan detail produk
$placeholders = implode(',', array_fill(0, count($product_ids), '?'));


$stmt = $conn->prepare("SELECT product_id, name, price, image_url FROM products WHERE product_id IN ($placeholders)");
$stmt->bind_param(str_repeat('i', count($product_ids)), ...$product_ids);
$stmt->execute();
$result = $stmt->get_result();

$productPayments = [];
$total_price = 0;

$productPayments = [];
while ($row = $result->fetch_assoc()) {
    $product_id = $row['product_id'];
    $quantity = $cart[array_search($product_id, $product_ids)]['quantity'];
    $subtotal = $row['price'] * $quantity; // Kalkulasi subtotal harga berdasarkan jumlah
    $total_price += $subtotal; // Tambahkan ke total harga

    $productPayments[] = [
        'product_name' => $row['name'],
        'image_url' => $row['image_url'],
        'price' => $subtotal,
        'quantity' => $quantity,
        'estimated_arrival' => '14 - 19 Nov',
        'insurance_cost' => 800 * $quantity // Sesuaikan biaya proteksi
    ];
}

error_log('Session cart: ' . print_r($_SESSION['cart'], true));


// Hitung Ongkos Kirim
$total_items = array_sum($quantities);
$shipping_cost = min(100000, $total_items * 10000);

// Hitung Diskon
$current_date = date('Y-m-d');
$query_promotions = "SELECT discount FROM promotions WHERE start_date <= ? AND end_date >= ?";
$stmt = $conn->prepare($query_promotions);
$stmt->bind_param('ss', $current_date, $current_date);
$stmt->execute();
$result = $stmt->get_result();


$discount_percentage = 0;
if ($result->num_rows > 0) {
    $promotion = $result->fetch_assoc();
    $discount_percentage = $promotion['discount'];
}
$discount_value = ($discount_percentage / 100) * $total_price;

// Hitung Total Akhir
$service_fee = 1000;
$insurance_total = array_sum(array_column($productPayments, 'insurance_cost'));
$grand_total = $total_price + $shipping_cost + $insurance_total + $service_fee - $discount_value;

$_SESSION['cart_items'] = $_SESSION['cart'];

// Siapkan Data
$data = [
    'address' => $address,
    'city' => $city,
    'postal_code' => $postal_code,
    'username' => $username,
    'productPayments' => $productPayments,
    'total_price' => $total_price,
    'shipping_cost' => $shipping_cost,
    'insurance_total' => $insurance_total,
    'discount_value' => $discount_value,
    'grand_total' => $grand_total
];

// Tutup statement dan koneksi
$stmt->close();
$conn->close();

?>



<?php

function render_decsripsi($section_name, $data)
{
    if (is_array($data)) {
        extract($data); // Ubah array menjadi variabel agar mudah digunakan di child component
    }
    include BASE_PATH . "Frontend/user/component/$section_name.php";
}

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
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Descryption
                        Product</a>
                </div>
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
                        purchase</a>
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
                        Delivery</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="self-stretch relative grid grid-cols-12 auto-rows-[80px] gap-[8px] h-auto">
        <?php
        render_decsripsi('alamatCard', $data);
        render_decsripsi('totalBelanja',  $data);
        render_decsripsi('payment',  $data);
        render_decsripsi('productPayment',  $data);
        ?>
    </div>

</div>

<?php
include BASE_PATH . 'Frontend/assets/footer.php';
?>


<?php if (isset($_GET['error']) || isset($_GET['success'])): ?>
    <div id="popup-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 right-0 left-0 z-50 hidden justify-center items-center w-full h-screen">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <div class="p-6 text-center">
                    <?php if (isset($_GET['error'])): ?>
                        <h3 class="mb-5 text-lg font-normal text-red-500">
                            <?= htmlspecialchars($_GET['error']); ?>
                        </h3>
                    <?php elseif (isset($_GET['success'])): ?>
                        <h3 class="mb-5 text-lg font-normal text-green-500">
                            Transaksi berhasil! Anda akan diarahkan ke halaman utama.
                        </h3>
                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                setTimeout(() => {
                                    window.location.href = '?page=Delivery';
                                }, 3000);
                            });
                        </script>
                    <?php endif; ?>
                    <a href="?page=Delivery" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5">Tutup</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Modal handling
        const modal = document.getElementById('popup-modal');
        if (window.location.search.includes('error') || window.location.search.includes('success')) {
            modal.classList.remove('hidden');
        }

        const closeModalButtons = document.querySelectorAll('[data-modal-hide="popup-modal"]');
        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        });

        // Payment method handling
        const paymentRadios = document.querySelectorAll('input[name="payment-method"]');
        const selectedPaymentInput = document.getElementById('selected-payment-method');
        const paymentForm = document.getElementById('payment-form');

        // Perbarui nilai hidden input saat radio button berubah
        paymentRadios.forEach(radio => {
            radio.addEventListener('change', () => {
                selectedPaymentInput.value = radio.value;
                console.log(`Metode pembayaran dipilih: ${radio.value}`); // Debugging
            });
        });

        // Pastikan hidden input memiliki nilai saat formulir dikirim
        paymentForm.addEventListener('submit', (event) => {
            if (!selectedPaymentInput.value) {
                event.preventDefault(); // Cegah pengiriman formulir jika tidak valid
                console.error("Error: Metode pembayaran belum dipilih.");
                alert("Silakan pilih metode pembayaran.");
            }
        });
    });
</script>