<?php
include BASE_PATH . '/backend/connection.php';


// Query untuk mendapatkan promo yang berlaku
$current_date = date('Y-m-d'); // Tanggal saat ini
$query = "SELECT name FROM promotions WHERE start_date <= ? AND end_date >= ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $current_date, $current_date);
$stmt->execute();
$result = $stmt->get_result();

$promos = [];
while ($row = $result->fetch_assoc()) {
    $promos[] = $row['name'];
}


// Periksa apakah keranjang kosong
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $totalPrice = 0;
    $products = [];
} else {
    $cart = $_SESSION['cart'];
    $product_ids = array_column($cart, 'product_id');
    $quantities = array_column($cart, 'quantity');

    // Query untuk mendapatkan data produk
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));

    if (!$conn) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT product_id, name, price FROM products WHERE product_id IN ($placeholders)");
    if (!$stmt) {
        die("Query gagal: " . $conn->error);
    }

    $stmt->bind_param(str_repeat('i', count($product_ids)), ...$product_ids);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    $totalPrice = 0;

    while ($row = $result->fetch_assoc()) {
        $product_id = $row['product_id'];
        $quantity = $cart[array_search($product_id, $product_ids)]['quantity'];
        $subtotal = $row['price'] * $quantity;
        $totalPrice += $subtotal;

        $products[$product_id] = [
            'name' => $row['name'],
            'price' => $row['price'],
            'quantity' => $quantity,
            'subtotal' => $subtotal
        ];
    }

    $stmt->close();
}

// Format total harga
$formattedTotalPrice = "Rp " . number_format($totalPrice, 2, ',', '.');

// Tutup koneksi database
$conn->close();
?>



<div class="flex w-[368px] flex-col items-center rounded-[32px] bg-Primary-Colors-3">
    <!-- Container A -->
    <div
        class="flex flex-col items-center gap-3 p-0 pb-5 px-3 w-full rounded-t-[24px] border-b border-[#A6A5A5]">
        <!-- Container B -->
        <div
            class="flex h-[101px] flex-col justify-between items-start w-full py-3 border-b border-[#A6A5A5]">
            <!-- Header Container -->
            <div class="flex items-center gap-2.5 px-6 py-2.5 w-full">
                <p class="text-Third font-quicksand text-label-large">
                    Ringkasan Belanja
                </p>
            </div>
            <!-- Total Container -->
            <div class="flex justify-between items-end w-full">
                <p class="text-Third font-quicksand text-label-small">
                    Total
                </p>
                <span class="text-Third font-quicksand text-label-small">
                    <?php echo isset($formattedTotalPrice) ? $formattedTotalPrice : 'Rp 0,00'; ?>
                </span>
            </div>
        </div>

        <!-- Promo Container -->
        <?php if (!empty($promos)): ?>
            <?php foreach ($promos as $promo): ?>
                <div
                    class="flex items-center justify-between p-[6px_12px] w-full rounded-[12px] border border-Secondary bg-Secondary-Colors-4">
                    <div class="flex items-center gap-[14px]">
                        <!-- SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[32px] h-[32px]" viewBox="0 0 32 32"
                            fill="none">
                            <path
                                d="M5.33317 5.33333C4.62593 5.33333 3.94765 5.61428 3.44755 6.11438C2.94746 6.61448 2.6665 7.29275 2.6665 8V13.3333C3.37375 13.3333 4.05203 13.6143 4.55212 14.1144C5.05222 14.6145 5.33317 15.2928 5.33317 16C5.33317 16.7072 5.05222 17.3855 4.55212 17.8856C4.05203 18.3857 3.37375 18.6667 2.6665 18.6667V24C2.6665 24.7072 2.94746 25.3855 3.44755 25.8856C3.94765 26.3857 4.62593 26.6667 5.33317 26.6667H26.6665C27.3737 26.6667 28.052 26.3857 28.5521 25.8856C29.0522 25.3855 29.3332 24.7072 29.3332 24V18.6667C28.6259 18.6667 27.9476 18.3857 27.4476 17.8856C26.9475 17.3855 26.6665 16.7072 26.6665 16C26.6665 15.2928 26.9475 14.6145 27.4476 14.1144C27.9476 13.6143 28.6259 13.3333 29.3332 13.3333V8C29.3332 7.29275 29.0522 6.61448 28.5521 6.11438C28.052 5.61428 27.3737 5.33333 26.6665 5.33333H5.33317ZM20.6665 9.33333L22.6665 11.3333L11.3332 22.6667L9.33317 20.6667L20.6665 9.33333ZM11.7465 9.38667C13.0532 9.38667 14.1065 10.44 14.1065 11.7467C14.1065 12.3726 13.8579 12.9729 13.4153 13.4154C12.9727 13.858 12.3724 14.1067 11.7465 14.1067C10.4398 14.1067 9.3865 13.0533 9.3865 11.7467C9.3865 11.1208 9.63515 10.5205 10.0777 10.0779C10.5203 9.63531 11.1206 9.38667 11.7465 9.38667ZM20.2532 17.8933C21.5598 17.8933 22.6132 18.9467 22.6132 20.2533C22.6132 20.8792 22.3645 21.4795 21.9219 21.9221C21.4794 22.3647 20.8791 22.6133 20.2532 22.6133C18.9465 22.6133 17.8932 21.56 17.8932 20.2533C17.8932 19.6274 18.1418 19.0271 18.5844 18.5846C19.027 18.142 19.6273 17.8933 20.2532 17.8933Z"
                                fill="#2C3E50" />
                        </svg>
                        <p class="text-Primary font-quicksand text-body-medium">
                            Kamu Dapat <?= htmlspecialchars($promo) ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div
                class="flex items-center justify-between p-[6px_12px] w-full rounded-[12px] border border-Secondary bg-Secondary-Colors-4">
                <div class="flex items-center gap-[14px]">
                    <!-- SVG -->
                    <p class="text-Primary font-quicksand text-body-medium">
                        Tidak ada promo saat ini
                    </p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Button Container -->
    <div class="flex flex-col items-start gap-2.5 py-[18px] px-6 w-full">
        <button type="button" onclick="window.location.href='?page=Delivery'"
            class="flex justify-center items-center gap-2.5 py-2.5 px-12 w-full rounded-[12px] bg-[#E74C3C] transition-all duration-300 hover:shadow-md hover:-translate-y-1 active:translate-y-0 active:shadow-sm">
            <label class="text-Third font-quicksand text-label-medium">
                Beli (2)
            </label>
        </button>
    </div>

</div>