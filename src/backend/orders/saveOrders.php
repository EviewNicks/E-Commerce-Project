<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    include BASE_PATH . '/backend/connection.php';

    // Debugging
    error_log('Formulir POST diterima');
    error_log('Data POST: ' . print_r($_POST, true)); // Debugging

    // Fungsi Helper untuk Redirect
    function redirectTo($page, $params = [])
    {
        $query = http_build_query(array_merge(['page' => $page], $params));
        header("Location: ?$query");
        exit;
    }

    // Data dari session
    $user_id = $_SESSION['user_id'] ?? null;
    $address_id = $_SESSION['address_id'] ?? null;

    $cart_items = $_SESSION['cart_items'] ?? [];


    $promo_id = $_SESSION['promo_id'] ?? null;
    $total_price = $_SESSION['total_price'] ?? 0;
    $shipping_cost = $data['shipping_cost'];
    $discount_value = $data['discount_value'];

    // Data dari input
    $payment_method = $_POST['payment-method'] ?? null;

    // Debug: Tampilkan nilai yang diterima oleh server
    var_dump($_POST['payment-method']);

    // Validasi metode pembayaran
    $valid_methods = ['dana', 'ovo', 'gopay'];

    // Debugging untuk memeriksa payment-method
    if (!$payment_method) {
        error_log('Error: Metode pembayaran tidak dikirim');
        redirectTo('Delivery', ['error' => 'Metode pembayaran tidak ditemukan.']);
    }

    // Validasi metode pembayaran
    $valid_methods = ['dana', 'ovo', 'gopay'];
    if (!in_array($payment_method, $valid_methods, true)) {
        error_log('Error: Metode pembayaran tidak valid. Value: ' . $payment_method);
        redirectTo('Delivery', ['error' => 'Metode pembayaran tidak valid.']);
    }

    // Validasi lainnya
    if (!$user_id) {
        error_log('Error: Data pesanan tidak lengkap.');
        redirectTo('Delivery', ['error' => 'user_ID tidak ada ']);
    }

    error_log('Session address_id: ' . ($_SESSION['address_id'] ?? 'NULL'));

    // Validasi lainnya
    if (!$address_id) {
        error_log('Error: Data pesanan tidak lengkap.');
        redirectTo('Delivery', ['error' => 'Address ID tidak ada']);
    }


    error_log('Session cart_items: ' . print_r($_SESSION['cart_items'], true));

    // Validasi lainnya
    if (empty($cart_items)) {
        error_log('Error: Keranjang kosong.');
        redirectTo('Delivery', ['error' => 'Keranjang kosong.']);
    }


    // Validasi lainnya
    if (!$user_id || !$address_id || empty($cart_items)) {
        error_log('Error: Data pesanan tidak lengkap.');
        redirectTo('Delivery', ['error' => 'Validasi gagal, lengkapi data pesanan.']);
    }

    // Debugging sukses
    error_log("Metode pembayaran valid: $payment_method");



    try {
        include BASE_PATH . '/backend/connection.php';

        // Mulai transaksi
        $conn->begin_transaction();

        $promo_applied = $promo_id ? $discount_value : NULL;

        // Simpan ke tabel orders
        $stmt = $conn->prepare("INSERT INTO orders (user_id, address_id, status, total_price, shipping_cost, promo_applied) VALUES (?, ?, 'pending', ?, ?, ?)");
        $stmt->bind_param(
            'iidds',
            $user_id,
            $address_id,
            $total_price,
            $shipping_cost,
            $promo_applied // Ini bisa null jika tidak ada promo
        );
        $stmt->execute();
        $order_id = $conn->insert_id; // Gunakan insert_id bukan lastInsertId()


        // Log Error
        error_log('Total Price: ' . $total_price);
        error_log('Shipping Cost: ' . $shipping_cost);
        error_log('Promo Applied: ' . $promo_applied);

        // Simpan ke tabel order_items
        $stmt_items = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($cart_items as $item) {
            $stmt_items->bind_param('iids', $order_id, $item['product_id'], $item['quantity'], $item['price']);
            $stmt_items->execute();
        }

        if (!$stmt->execute()) {
            error_log('Order insert failed: ' . $stmt->error);
        }

        // Simpan promo jika ada
        if ($promo_id) {
            $stmt_promo = $conn->prepare("INSERT INTO promotion_orders (promotion_id, order_id) VALUES (?, ?)");
            $stmt_promo->bind_param('ii', $promo_id, $order_id);
            $stmt_promo->execute();
        }

        // Simpan ke tabel payment
        $stmt_payment = $conn->prepare("INSERT INTO payment (order_id, amount, method, status) VALUES (?, ?, ?, 'pending')");
        $stmt_payment->bind_param('ids', $order_id, $total_price, $payment_method);
        $stmt_payment->execute();

        // Commit transaksi
        $conn->commit();

        // Redirect ke halaman home
        redirectTo('Delivery', ['success' => 'Pesanan berhasil dibuat!']);

        // Hapus seluruh data cart setelah order
        unset(
            $_SESSION['cart'],
            $_SESSION['cart_items'],
            $_SESSION['total_price'],
            $_SESSION['promo_id'],
            $_SESSION['address_id']
        );
    } catch (Exception $e) {
        // Rollback jika ada error
        $conn->rollBack();

        // Catat error ke log
        error_log($e->getMessage());

        // Redirect dengan pesan error umum
        redirectTo('Delivery', ['error' => 'Terjadi kesalahan saat memproses pesanan.']);
    }
} else {
    // Jika bukan metode POST, redirect ke home
    header('Location: ?page=Delivery');
    exit;
}



echo "<p>Alamat pengiriman utama Anda tidak ditemukan. Silakan tambahkan alamat di <a href='?page=addressPage'>halaman alamat</a>.</p>";
exit();
