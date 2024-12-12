<?php
session_start();

// Periksa apakah ada `product_id` yang diberikan
if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']); // Ambil ID produk yang akan dihapus

    foreach ($_SESSION['cart'] as $item) {
        echo "product_id in cart: " . $item['product_id'] . " (type: " . gettype($item['product_id']) . ")<br>";
    }
    echo "product_id to delete: $product_id (type: " . gettype($product_id) . ")<br>";


    // Debugging: Tampilkan keranjang sebelum penghapusan
    echo "Sebelum Penghapusan: ";
    print_r($_SESSION['cart']);
    echo "<br><br>";

    // Periksa apakah keranjang tersedia dan tidak kosong
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Filter keranjang untuk menghapus produk yang sesuai dengan ID
        $_SESSION['cart'] = array_values(array_filter($_SESSION['cart'], function ($item) use ($product_id) {
            return intval($item['product_id']) !== $product_id; // Gunakan perbandingan dengan intval
        }));

        // Debugging: Cek keranjang setelah penghapusan
        echo "Setelah Penghapusan: ";
        print_r($_SESSION['cart']);
        echo "<br><br>";
    }

    // Simpan session dan redirect ke halaman keranjang
    session_write_close();
    // header('Location: ?page=keranjang');
    exit();
} else {
    // Jika `product_id` tidak valid, kembali ke halaman keranjang
    header('Location: ?page=keranjang');
    exit();
}
