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
    <?php
    define('BASE_PATH', __DIR__ . '/../src/');

    include __DIR__ . '/../src/Frontend/assets/navbar.php';

    ?>

    <!-- Main Content -->
    <div class="container mx-auto p-4">
        <?php
        // Routing sederhana
        $page = $_GET['page'] ?? 'products'; // Default ke products jika parameter page tidak ada

        switch ($page) {
            case 'products':
                include BASE_PATH . 'Frontend/product/product.php';
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
            case 'productController':
                include BASE_PATH . 'backend/product/productController.php';
                break;
            case 'formProduct':
                include BASE_PATH . 'Frontend/product/formProduct.php';
                break;
            case 'categories':
                include BASE_PATH . 'Frontend/category/category.php';
                break;
            case 'addCategory':
                include BASE_PATH . 'Frontend/category/formCategory.php';
            case 'editCategory':
                include BASE_PATH . 'Frontend/category/formCategory.php';
            default:
                echo "<p>Page not found.</p>";
        }
        ?>
    </div>
</body>

</html>