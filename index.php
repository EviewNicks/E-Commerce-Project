<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Project</title>
    <link href="src/output.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <header class="bg-blue-600 text-white py-4">
        <h1 class="text-4xl font-bold text-center">E-Commerce Project</h1>
    </header>

    <main class="container mx-auto p-4">
        <?php
        // Array of products with sample data
        $products = [
            ["name" => "Product 1", "price" => 100, "description" => "Description for Product 1"],
            ["name" => "Product 2", "price" => 200, "description" => "Description for Product 2"],
            ["name" => "Product 3", "price" => 300, "description" => "Description for Product 3"]
        ];
        ?>

        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($products as $product) : ?>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-2xl font-semibold mb-2"><?php echo $product['name']; ?></h2>
                    <p class="text-gray-700 mb-4"><?php echo $product['description']; ?></p>
                    <p class="text-lg font-bold text-blue-600 mb-4">$<?php echo $product['price']; ?></p>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add to Cart
                    </button>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; <?php echo date("Y"); ?> E-Commerce Project. All rights reserved.</p>
    </footer>
</body>

</html>