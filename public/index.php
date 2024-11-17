<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Include Navbar -->
    <?php include __DIR__ . '/../src/Frontend/assets/navbar.php'; ?>

    <!-- Main Content -->
    <div class="container mx-auto p-4">
        <?php
        // Routing sederhana
        $page = $_GET['page'] ?? 'products'; // Default ke products jika parameter page tidak ada

        switch ($page) {
            case 'products':
                include __DIR__ . '/../src/Frontend/product.php';
                break;
            case 'categories':
                include __DIR__ . '/../src/Frontend/category.php';
                break;
            case 'orders':
                include __DIR__ . '/../src/Frontend/orders.php';
                break;
            case 'orderItems':
                include __DIR__ . '/../src/Frontend/orderItems.php';
                break;
            case 'promotions':
                include __DIR__ . '/../src/Frontend/promotions.php';
                break;
            default:
                echo "<p>Page not found.</p>";
        }
        ?>
    </div>
</body>

</html>