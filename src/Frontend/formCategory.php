<?php
include BASE_PATH . '/backend/connection.php';
include __DIR__ . '/../src/Frontend/assets/navbar.php'; 

$action = $_GET['action'] ?? 'add'; // Default adalah 'add'
$category_id = $_GET['id'] ?? null;

$category = [
    'name' => '',
    'description' => '',
    'parent_category_id' => '',
    'is_active' => 1, // Default aktif
    'image_url' => ''
];

// Jika edit, ambil data kategori dari database
if ($action === 'edit' && $category_id) {
    $stmt = $conn->prepare("SELECT * FROM categories WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
    }
    $stmt->close();
}

if ($action === 'add') {
    $category_id = 0; // Pastikan selalu ada nilai
}



// Ambil kategori induk
$sql = "SELECT category_id, name FROM categories WHERE is_active = 1 AND category_id != ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();
$parent_categories = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $parent_categories[] = $row;
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link href="./../../output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4"><?= $action === 'edit' ? 'Edit' : 'Tambah' ?> Kategori</h2>

        <form action="?page=<?= $action === 'edit' ? 'editCategoryAction' : 'addCategoryAction' ?>" method="POST" enctype="multipart/form-data">
            <? error_log("Debug: Form submitted to addCategoryAction"); ?>

            <input type="hidden" name="category_id" value="<?= $category_id ?>"> <!-- Untuk Edit -->

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Nama Kategori</label>
                <input type="text" id="name" name="name" value="<?= $category['name'] ?>" required class="w-full p-2 border border-gray-300 rounded">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="w-full p-2 border border-gray-300 rounded"><?= $category['description'] ?></textarea>
            </div>

            <div class="mb-4">
                <label for="parent_category_id" class="block text-sm font-medium">Kategori Induk (Opsional)</label>
                <select id="parent_category_id" name="parent_category_id" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">Pilih Kategori Induk</option>
                    <?php foreach ($parent_categories as $cat) : ?>
                        <option value="<?= $cat['category_id'] ?>" <?= $cat['category_id'] == $category['parent_category_id'] ? 'selected' : '' ?>>
                            <?= $cat['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium">Gambar (Opsional)</label>
                <input type="file" id="image" name="image" class="w-full p-2 border border-gray-300 rounded">
                <?php if (!empty($category['image_url'])) : ?>
                    <img src="<?= $category['image_url'] ?>" alt="Category Image" class="h-16 w-16 mt-2">
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="is_active" class="inline-flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1" <?= $category['is_active'] ? 'checked' : '' ?> class="form-checkbox h-5 w-5 text-blue-600">
                    <span class="ml-2 text-sm">Aktifkan Kategori</span>
                </label>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                <?= $action === 'edit' ? 'Update' : 'Tambah' ?>
            </button>
        </form>
    </div>

    <script>
        document.querySelector('#form-category').addEventListener('submit', async function(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const response = await fetch('?page=editCategoryAction', {
                method: 'POST',
                body: formData,
            });
            const data = await response.json();
            console.log('Server Response:', data);
        });
    </script>
</body>

</html>