<?php
include BASE_PATH . '/backend/connection.php';
include __DIR__ . '/../src/Frontend/assets/navbar.php'; 

$order_id = intval($_GET['id'] ?? 0);
if (!$order_id) {
    echo "<p class='text-red-600'>Order ID tidak valid.</p>";
    exit;
}

// Query untuk mendapatkan detail pesanan
$sql_order = "
    SELECT o.*, u.username, u.email, sa.address, sa.city, sa.postal_code
    FROM orders o
    JOIN users u ON o.user_id = u.user_id
    JOIN shipping_address sa ON o.address_id = sa.address_id
    WHERE o.order_id = ?
";
$stmt = $conn->prepare($sql_order);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order_result = $stmt->get_result();

if ($order_result->num_rows === 0) {
    echo "<p class='text-red-600'>Pesanan tidak ditemukan.</p>";
    exit;
}

$order = $order_result->fetch_assoc();

// Query untuk mendapatkan item pesanan
$sql_items = "
    SELECT oi.*, p.name AS product_name
    FROM order_items oi
    JOIN products p ON oi.product_id = p.product_id
    WHERE oi.order_id = ?
";
$stmt_items = $conn->prepare($sql_items);
$stmt_items->bind_param("i", $order_id);
$stmt_items->execute();
$items_result = $stmt_items->get_result();
$order_items = $items_result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$stmt_items->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link href="./../../output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Detail Pesanan</h2>

        <!-- Informasi Pesanan -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">Informasi Pesanan</h3>
            <p><strong>Order ID:</strong> <?= $order['order_id'] ?></p>
            <p><strong>Username:</strong> <?= $order['username'] ?></p>
            <p><strong>Email:</strong> <?= $order['email'] ?></p>
            <p><strong>Status:</strong> <?= ucfirst($order['status']) ?></p>
            <p><strong>Total Price:</strong> Rp <?= number_format($order['total_price'], 0, ',', '.') ?></p>
            <p><strong>Shipping Cost:</strong> Rp <?= number_format($order['shipping_cost'], 0, ',', '.') ?></p>
            <p><strong>Promo Code:</strong> <?= $order['promo_applied'] ?? 'None' ?></p>
            <p><strong>Created At:</strong> <?= $order['created_at'] ?></p>
            <p><strong>Updated At:</strong> <?= $order['updated_at'] ?></p>
        </div>

        <!-- Item Pesanan -->
        <div class="bg-white shadow-md rounded-lg p-4 mt-4">
            <h3 class="text-lg font-semibold mb-2">Item Pesanan</h3>
            <table class="min-w-full border-collapse border border-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2 border">Product</th>
                        <th class="px-4 py-2 border">Quantity</th>
                        <th class="px-4 py-2 border">Price</th>
                        <th class="px-4 py-2 border">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach ($order_items as $item) : ?>
                        <tr class="border">
                            <td class="px-4 py-2"><?= $item['product_name'] ?></td>
                            <td class="px-4 py-2 text-center"><?= $item['quantity'] ?></td>
                            <td class="px-4 py-2 text-right">Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                            <td class="px-4 py-2 text-right">Rp <?= number_format($item['total_price'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> 
    </div>
</body>

</html>