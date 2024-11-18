<?php
include BASE_PATH . '/backend/connection.php';

$product = [
    'product_id' => '',
    'name' => '',
    'description' => '',
    'price' => '',
    'category_id' => '',
    'is_featured' => 0,
];

if ($_GET['action'] === 'edit' && isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}
?>

<h1 class="text-xl font-bold mb-4">
    <?php echo $_GET['action'] === 'edit' ? 'Edit Produk' : 'Tambah Produk Baru'; ?>
</h1>
<form action="/E-Commerce-Project/index.php?page=productController&action=<?php echo $_GET['action']; ?>" method="POST" class="bg-white p-6 rounded shadow-md">
    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
    <div class="mb-4">
        <label for="name" class="block text-gray-700">Nama Produk</label>
        <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required value="<?php echo htmlspecialchars($product['name']); ?>">
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700">Deskripsi</label>
        <textarea name="description" id="description" class="w-full px-4 py-2 border rounded" required><?php echo htmlspecialchars($product['description']); ?></textarea>
    </div>
    <div class="mb-4">
        <label for="price" class="block text-gray-700">Harga</label>
        <input type="number" name="price" id="price" class="w-full px-4 py-2 border rounded" required value="<?php echo htmlspecialchars($product['price']); ?>">
    </div>
    <div class="mb-4">
        <label for="category_id" class="block text-gray-700">Kategori</label>
        <select name="category_id" id="category_id" class="w-full px-4 py-2 border rounded" required>
            <?php
            $categories = $conn->query("SELECT category_id, name FROM categories");
            while ($row = $categories->fetch_assoc()) {
                $selected = $row['category_id'] == $product['category_id'] ? 'selected' : '';
                echo "<option value='{$row['category_id']}' $selected>{$row['name']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">
            <input type="checkbox" name="is_featured" id="is_featured" class="mr-2" <?php echo $product['is_featured'] ? 'checked' : ''; ?>> Tandai sebagai "Featured"
        </label>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        <?php echo $_GET['action'] === 'edit' ? 'Update' : 'Simpan'; ?>
    </button>
</form>