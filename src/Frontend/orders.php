<?php
include BASE_PATH . '/backend/connection.php';
include __DIR__ . '/../src/Frontend/assets/navbar.php'; 

// Ambil data pesanan dari database
$sql = "
    SELECT 
        o.order_id, 
        u.username AS user_name, 
        sa.address AS shipping_address, 
        o.total_price, 
        o.shipping_cost, 
        o.status, 
        o.created_at 
    FROM 
        orders o
    JOIN 
        users u ON o.user_id = u.user_id
    LEFT JOIN 
        shipping_address sa ON o.address_id = sa.address_id
    ORDER BY 
        o.created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Orders</title>
    <link href="./../../output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Daftar Pesanan</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300 shadow-md rounded-lg">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">ID Pesanan</th>
                        <th class="px-4 py-2 border border-gray-300">Nama Pengguna</th>
                        <th class="px-4 py-2 border border-gray-300">Alamat Pengiriman</th>
                        <th class="px-4 py-2 border border-gray-300">Total Harga</th>
                        <th class="px-4 py-2 border border-gray-300">Status</th>
                        <th class="px-4 py-2 border border-gray-300">Tanggal</th>
                        <th class="px-4 py-2 border border-gray-300">Update Status</th>
                        <th class="px-4 py-2 border border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="border border-gray-300 hover:bg-gray-100">
                                <td class="px-4 py-2 text-center"><?= $row['order_id'] ?></td>
                                <td class="px-4 py-2"><?= $row['user_name'] ?></td>
                                <td class="px-4 py-2"><?= $row['shipping_address'] ?: 'Tidak Ada Alamat' ?></td>
                                <td class="px-4 py-2">Rp <?= number_format($row['total_price'], 0, ',', '.') ?></td>
                                <td class="px-4 py-2"><?= ucfirst($row['status']) ?></td>
                                <td class="px-4 py-2"><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                                <td class="px-4 py-2">
                                    <select
                                        data-id="<?= $row['order_id'] ?>"
                                        class="status-dropdown border border-gray-300 rounded">
                                        <option value="pending" <?= $row['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                        <option value="processing" <?= $row['status'] === 'processing' ? 'selected' : '' ?>>Processing</option>
                                        <option value="completed" <?= $row['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                                        <option value="canceled" <?= $row['status'] === 'canceled' ? 'selected' : '' ?>>Canceled</option>
                                    </select>
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <a href="?page=ordersDetails&id=<?= $row['order_id'] ?>" class="text-blue-600 hover:underline">Detail</a>
                                    |
                                    <button
                                        class="text-red-600 hover:underline delete-order-btn"
                                        data-id="<?= $row['order_id'] ?>"
                                        data-status="<?= $row['status'] ?>"
                                        onclick="confirmDelete(this)"> Hapus </button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center text-gray-600 py-4">Tidak ada pesanan ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.querySelectorAll('.status-dropdown').forEach((dropdown) => {
            dropdown.addEventListener('change', function() {
                const orderId = this.getAttribute('data-id');
                const newStatus = this.value;

                fetch('?page=updateOrderStatusAction', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            order_id: orderId,
                            status: newStatus
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Status berhasil diperbarui!');
                        } else {
                            alert('Terjadi kesalahan: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Error:', error);
                        alert('Terjadi kesalahan pada server.');
                    });
            });
        });


        function confirmDelete(button) {
            const orderId = button.getAttribute('data-id');
            const status = button.getAttribute('data-status');

            if (status !== 'canceled') {
                alert('Hanya pesanan dengan status "Canceled" yang dapat dihapus.');
                return;
            }

            if (confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) {
                fetch('?page=deleteOrderAction', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            order_id: orderId
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Pesanan berhasil dihapus!');
                            location.reload(); // Muat ulang halaman setelah penghapusan berhasil
                        } else {
                            alert('Gagal menghapus pesanan: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Error:', error);
                        alert('Terjadi kesalahan pada server.');
                    });
            }
        }
    </script>
</body>

</html>

<?php $conn->close(); ?>