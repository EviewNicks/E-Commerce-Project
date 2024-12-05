<?php include BASE_PATH . '/backend/connection.php';

if (isset($_GET['error']) || isset($_GET['add_error'])) {
    $error = $_GET['error'] ?? $_GET['add_error']; // Gunakan parameter yang sesuai
    switch ($error) {
        case 'password_mismatch':
            echo "<p class='text-red-500'>Password baru dan konfirmasi tidak cocok.</p>";
            break;
        case 'invalid_old_password':
            echo "<p class='text-red-500'>Password lama salah.</p>";
            break;
        case 'username_taken':
            echo "<p class='text-red-500'>Username sudah digunakan oleh admin lain.</p>";
            break;
        case 'update_failed':
            echo "<p class='text-red-500'>Terjadi kesalahan saat memperbarui data. Coba lagi nanti.</p>";
            break;
        case 'invalid_password':
            echo "<p class='text-red-500'>Password harus minimal 8 karakter dan mengandung huruf besar, huruf kecil, angka, dan karakter spesial.</p>";
            break;
        case 'add_failed':
            echo "<p class='text-red-500'>Terjadi kesalahan saat menambahkan admin baru. Coba lagi nanti.</p>";
            break;
        case 'username_invalid':
            echo "Username tidak valid. Gunakan 3-20 karakter (huruf, angka, atau underscore).";
            break;
    }
}

if (isset($_GET['success'])) {
    echo "<p class='text-green-500'>Akun admin berhasil diperbarui.</p>";
}

if (isset($_GET['add_success'])) { // Tambahkan ini
    echo "<p class='text-green-500'>Akun admin baru berhasil ditambahkan.</p>";
}
?>

<div class="bg-gray-50 shadow-md rounded-md p-6 mb-6 max-w-lg mx-auto">
    <h2 class="text-xl font-bold mb-4">Tambah Admin Baru</h2>
    <form action="?page=addNewAdmin" method="POST" class="space-y-4">
        <!-- Username -->
        <div>
            <label for="new_username" class="block text-gray-700">Username</label>
            <input type="text" id="new_username" name="new_username" class="w-full border-gray-300 rounded px-4 py-2" required>
        </div>
        <!-- Password -->
        <div>
            <label for="new_password" class="block text-gray-700">Password</label>
            <input type="password" id="new_password" name="new_password" class="w-full border-gray-300 rounded px-4 py-2" required>
        </div>
        <!-- Konfirmasi Password -->
        <div>
            <label for="confirm_new_password" class="block text-gray-700">Konfirmasi Password</label>
            <input type="password" id="confirm_new_password" name="confirm_new_password" class="w-full border-gray-300 rounded px-4 py-2" required>
        </div>
        <!-- Submit -->
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">
            Tambahkan Admin
        </button>
    </form>
</div>


<div class="bg-white shadow-md rounded-md p-6 max-w-lg mx-auto">
    <h2 class="text-xl font-bold mb-4">Manajemen Akun Admin</h2>
    <form action="?page=updateAdminAction" method="POST" class="space-y-4">
        <!-- Username -->
        <div>
            <label for="username" class="block text-gray-700">Username Baru</label>
            <input type="text" id="username" name="username" class="w-full border-gray-300 rounded px-4 py-2" required>
        </div>
        <!-- Password Lama -->
        <div>
            <label for="old_password" class="block text-gray-700">Password Lama</label>
            <input type="password" id="old_password" name="old_password" class="w-full border-gray-300 rounded px-4 py-2" required>
        </div>
        <!-- Password Baru -->
        <div>
            <label for="new_password" class="block text-gray-700">Password Baru</label>
            <input type="password" id="new_password" name="new_password" class="w-full border-gray-300 rounded px-4 py-2" required>
        </div>
        <!-- Konfirmasi Password -->
        <div>
            <label for="confirm_password" class="block text-gray-700">Konfirmasi Password Baru</label>
            <input type="password" id="confirm_password" name="confirm_password" class="w-full border-gray-300 rounded px-4 py-2" required>
        </div>
        <!-- Submit -->
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
            Simpan Perubahan
        </button>
    </form>
</div>