<?php include BASE_PATH . '/backend/connection.php'; 

if (isset($_GET['error'])) {
    switch ($_GET['error']) {
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
    }
}

if (isset($_GET['success'])) {
    echo "<p class='text-green-500'>Akun admin berhasil diperbarui.</p>";
}
?>

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