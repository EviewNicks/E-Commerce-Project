<?php
define('BASE_PATH', __DIR__ . '/../src/');

var_dump($_GET['page']); // Pastikan nilainya 'addProductAction'

// Routing sederhana
$page = $_GET['page'] ?? 'products';

// File khusus proses (tanpa HTML)
$process_pages = ['addProductAction', 'updateFeatured', 'editProductAction', 'deleteProductAction'];

if (in_array($page, $process_pages)) {
    $file_path = BASE_PATH . "backend/product/$page.php";
    if (file_exists($file_path)) {
        include $file_path;
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Page not found']);
    }
    exit;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="./../src/output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Include Navbar -->
    <?php include __DIR__ . '/../src/Frontend/assets/navbar.php'; ?>

    <!-- Main Content -->
    <div class="container mx-auto p-4">
        <?php
        switch ($page) {
            case 'products':
                include BASE_PATH . 'Frontend/product/product.php';
                break;
            case 'formProduct':
                include BASE_PATH . 'Frontend/product/formProduct.php';
                break;
            case 'categories':
                include BASE_PATH . 'Frontend/category/category.php';
                break;
            case 'orders':
                include BASE_PATH . 'Frontend/orders.php';
                break;
            case 'orderItems':
                include BASE_PATH . 'Frontend/orderItems.php';
                break;
            case 'promotions':
                include BASE_PATH . 'Frontend/promotions.php';
                break;
            default:
                http_response_code(404);
                echo "<p>Halaman yang Anda cari tidak ditemukan. Silakan cek URL Anda.</p>";
                break;
        }
        ?>
    </div>
</body>

</html>