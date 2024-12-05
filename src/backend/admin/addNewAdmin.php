<?php
include BASE_PATH . '/backend/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['new_username']);
    $password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_new_password'];

    // Validasi sederhana untuk username (panjang minimum 3 karakter)
    if (strlen($username) < 3) {
        header("Location: ?page=adminManagement&add_error=username_invalid");
        exit;
    }

    // Validasi sederhana untuk password (panjang minimum 6 karakter)
    if (strlen($password) < 6) {
        header("Location: ?page=adminManagement&add_error=password_too_short");
        exit;
    }

    // Validasi konfirmasi password
    if ($password !== $confirm_password) {
        header("Location: ?page=adminManagement&add_error=password_mismatch");
        exit;
    }

    // Cek apakah username sudah ada
    $stmt = $conn->prepare("SELECT admin_id FROM admin WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        header("Location: ?page=adminManagement&add_error=username_taken");
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert admin baru ke database
    $stmt = $conn->prepare("INSERT INTO admin (username, password, created_at, updated_at) VALUES (?, ?, NOW(), NOW())");
    $stmt->bind_param('ss', $username, $hashed_password);

    if ($stmt->execute()) {
        header("Location: ?page=adminManagement&add_success=1");
    } else {
        header("Location: ?page=adminManagement&add_error=add_failed");
    }

    $stmt->close();
    $conn->close();
}
