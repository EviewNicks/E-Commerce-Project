<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ambil data dari URL dan pastikan tipe data integer
$product_id = (int) filter_var($_GET['product_id'], FILTER_SANITIZE_NUMBER_INT);
$quantity = (int) filter_var($_GET['quantity'], FILTER_SANITIZE_NUMBER_INT);
$price = (float) filter_var($_GET['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

// Validasi angka positif
if ($product_id <= 0 || $quantity <= 0 || $price <= 0) {
    die("Invalid product data.");
}

// Tambahkan ke keranjang
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['product_id'] === $product_id) { // Gunakan === untuk memastikan kesamaan tipe data
        $item['quantity'] += $quantity;
        $found = true;
        break;
    }
}
if (!$found) {
    $_SESSION['cart'][] = [
        'product_id' => $product_id, // Pastikan integer
        'quantity' => $quantity,    // Pastikan integer
        'price' => $price           // Pastikan float
    ];
}

// Redirect ke halaman keranjang
header("Location: index.php?page=keranjang");
exit();
