<?php
include BASE_PATH . '/backend/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi username (3-20 karakter, hanya huruf, angka, underscore)
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        header("Location: ?page=register&error=username_invalid");
        exit;
    }

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ?page=register&error=invalid_email");
        exit;
    }

    // Validasi panjang password (minimal 8 karakter)
    if (strlen($password) < 8) {
        header("Location: ?page=register&error=password_too_short");
        exit;
    }

    // Validasi password dan konfirmasi password
    if ($password !== $confirm_password) {
        header("Location: ?page=register&error=password_mismatch");
        exit;
    }

    // Cek apakah username atau email sudah ada
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        header("Location: ?page=register&error=username_or_email_taken");
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert pengguna baru ke database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, created_at, update_at, is_verified) VALUES (?, ?, ?, NOW(), NOW(), 0)");
    $stmt->bind_param('sss', $username, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: ?page=register&success=1");
    } else {
        header("Location: ?page=register&error=add_failed");
    }

    $stmt->close();
    $conn->close();
}
