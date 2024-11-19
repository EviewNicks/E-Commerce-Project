<?php
include BASE_PATH . 'backend/connection.php';

$isEdit = isset($_GET['id']);
if ($isEdit) {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : null;
    if (!$id) {
        die("ID kategori tidak valid.");
    }
    $sql = "SELECT * FROM categories WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();
} else {
    $category = [
        'name' => '',
        'description' => '',
        'parent_category_id' => '',
        'is_active' => 1,
        'image_url' => '',
    ];
}

$parentCategories = $conn->query("SELECT category_id, name FROM categories WHERE is_active = 1");
if (!$parentCategories) {
    echo "Error: " . $conn->error;
}
?>

<form method="POST" action="<?= $isEdit ? BASE_PATH . 'backend/category/editCategory.php?id=' . $id : BASE_PATH . 'backend/category/addCategory.php' ?>" class="space-y-4 bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8') ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nama kategori..." maxlength="255" required>
    </div>
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" maxlength="500"><?= htmlspecialchars($category['description'], ENT_QUOTES, 'UTF-8') ?></textarea>
    </div>
    <div>
        <label for="parent_category_id" class="block text-sm font-medium text-gray-700">Parent Category</label>
        <select name="parent_category_id" id="parent_category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="">-- None --</option>
            <?php
            while ($parentRow = $parentCategories->fetch_assoc()) {
                // Pastikan kategori induk tidak dapat memilih dirinya sendiri
                if ($isEdit && $parentRow['category_id'] == $id) {
                    continue;
                }
                $selected = $parentRow['category_id'] == $category['parent_category_id'] ? 'selected' : '';
                echo "<option value='{$parentRow['category_id']}' {$selected}>{$parentRow['name']}</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label for="image_url" class="block text-sm font-medium text-gray-700">Gambar (Opsional)</label>
        <input type="file" name="image_url" id="image_url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        <?php if ($category['image_url']): ?>
            <p class="text-sm text-gray-500 mt-1">Gambar saat ini: <a href="<?= htmlspecialchars($category['image_url'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" class="text-blue-600 underline">Lihat Gambar</a></p>
        <?php endif; ?>
    </div>
    <div>
        <label for="is_active" class="block text-sm font-medium text-gray-700">Status</label>
        <select name="is_active" id="is_active" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="1" <?= $category['is_active'] ? 'selected' : '' ?>>Active</option>
            <option value="0" <?= !$category['is_active'] ? 'selected' : '' ?>>Inactive</option>
        </select>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
</form>