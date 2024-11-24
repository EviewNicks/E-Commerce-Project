<?php
define('BASE_PATH', __DIR__ . '/../src/');


// Routing sederhana
$page = $_GET['page'] ?? 'products';

// File khusus proses (tanpa HTML)
$product_pages = [
    'addProductAction',
    'updateFeatured',
    'editProductAction',
    'deleteProductAction'
];

$category_pages = [
    'addCategoryAction',
    'editCategoryAction',
    'deleteCategoryAction'
];

$promotion_pages = [
    'addPromotionAction',
    'editPromotionAction',
    'deletePromotionAction'
];

$order_pages = [
    'updateOrderStatusAction',
    'deleteOrderAction'
];

if (in_array($page, $product_pages)) {
    $file_path = BASE_PATH . "backend/product/$page.php";
} elseif (in_array($page, $category_pages)) {
    $file_path = BASE_PATH . "backend/category/$page.php";
} elseif (in_array($page, $promotion_pages)) {
    $file_path = BASE_PATH . "backend/promotions/$page.php";
} elseif (in_array($page, $order_pages)) {
    $file_path = BASE_PATH . "backend/orders/$page.php";
} else {
    $file_path = null;
}


if ($file_path && file_exists($file_path)) {
    include $file_path;
    exit;
} elseif ($file_path === null) {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Page not found']);
}


var_dump($_GET['page']); // Pastikan nilainya 'addProductAction'
error_log("Debug: Page value is " . $_GET['page']); // Log ke file
error_log("Debug: File path for process is $file_path"); // Log jalur file

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
                include BASE_PATH . 'Frontend/product.php';
                break;
            case 'formProduct':
                include BASE_PATH . 'Frontend/formProduct.php';
                break;
            case 'categories':
                include BASE_PATH . 'Frontend/category.php';
                break;
            case 'formCategory':
                include BASE_PATH . 'Frontend/formCategory.php';
                break;
            case 'orders':
                include BASE_PATH . 'Frontend/orders.php';
                break;
            case 'ordersDetails':
                include BASE_PATH . 'Frontend/orderDetails.php';
                break;
            case 'promotions':
                include BASE_PATH . 'Frontend/promotions.php';
                break;
            case 'formPromotion':
                include BASE_PATH . 'Frontend/formPromotions.php';
                break;
            case 'reviews':
                include BASE_PATH . 'Frontend/adminReviews.php';
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