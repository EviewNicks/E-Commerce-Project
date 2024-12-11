<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ambil data dari URL
$product_id = filter_var($_GET['product_id'], FILTER_SANITIZE_NUMBER_INT);
$quantity = filter_var($_GET['quantity'], FILTER_SANITIZE_NUMBER_INT);
$price = filter_var($_GET['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);


// Validasi angka positif
if ($product_id <= 0 || $quantity <= 0 || $price <= 0) {
    die("Invalid product data.");
}


// Tambahkan ke keranjang
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['product_id'] == $product_id) {
        $item['quantity'] += $quantity;
        $found = true;
        break;
    }
}
if (!$found) {
    $_SESSION['cart'][] = [
        'product_id' => $product_id,
        'quantity' => $quantity,
        'price' => $price
    ];
}

header("Location: index.php?page=keranjang");


exit();
