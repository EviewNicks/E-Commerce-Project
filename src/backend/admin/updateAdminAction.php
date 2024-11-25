<?php
include BASE_PATH . '/backend/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $old_password = trim($_POST['old_password']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);
    $admin_id = 1; // Admin ID untuk admin1

    // Validasi password baru dan konfirmasi
    if ($new_password !== $confirm_password) {
        header('Location: ?page=adminManagement&error=password_mismatch');
        exit;
    }

    // Periksa apakah username sudah digunakan
    $username_check_query = "SELECT COUNT(*) FROM admin WHERE username = ? AND admin_id != ?";
    $check_stmt = $conn->prepare($username_check_query);
    $check_stmt->bind_param("si", $username, $admin_id);
    $check_stmt->execute();
    $check_stmt->bind_result($count);
    $check_stmt->fetch();
    $check_stmt->close();

    if ($count > 0) {
        header('Location: ?page=adminManagement&error=username_taken');
        exit;
    }

    // Ambil password lama untuk verifikasi
    $query = "SELECT password FROM admin WHERE admin_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Validasi password lama
    if (password_verify($old_password, $hashed_password)) {
        $is_valid_password = true;
    } else {
        $is_valid_password = false;
    }

    error_log("Debug: Input Old Password: $old_password");
    error_log("Debug: Hashed Password from DB: $hashed_password");
    error_log("Debug: Is Password Valid: " . ($is_valid_password ? "Yes" : "No"));

    if (!$is_valid_password) {
        header('Location: ?page=adminManagement&error=invalid_old_password');
        exit;
    }

    // Hash password baru
    $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Update username dan password
    $update_query = "UPDATE admin SET username = ?, password = ? WHERE admin_id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssi", $username, $new_hashed_password, $admin_id);

    if ($update_stmt->execute()) {
        header('Location: ?page=adminManagement&success=1');
        exit;
    } else {
        header('Location: ?page=adminManagement&error=update_failed');
        exit;
    }
}

error_log("Debug: Request received to update admin.");
