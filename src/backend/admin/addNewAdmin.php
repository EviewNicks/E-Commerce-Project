<?php
include BASE_PATH . '/backend/connection.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $email = trim($_POST['new_email']);
    $username = trim($_POST['new_username']);
    $password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_new_password']);

    // Validasi sederhana
    if (empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        header('Location: ?page=addAdmin&error=Semua kolom wajib diisi');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ?page=addAdmin&error=Format email tidak valid');
        exit;
    }

    if (strlen($password) < 6) {
        header('Location: ?page=addAdmin&error=Password minimal 6 karakter');
        exit;
    }

    if ($password !== $confirm_password) {
        header('Location: ?page=addAdmin&error=Password tidak cocok');
        exit;
    }

    // Cek apakah email sudah ada
    $checkEmailQuery = $conn->prepare("SELECT COUNT(*) FROM admin WHERE email = ?");
    $checkEmailQuery->bind_param("s", $email);
    $checkEmailQuery->execute();
    $checkEmailQuery->bind_result($emailExists);
    $checkEmailQuery->fetch();
    $checkEmailQuery->close();

    if ($emailExists) {
        header('Location: ?page=addAdmin&error=Email sudah digunakan');
        exit;
    }

    // Cek apakah username sudah ada
    $checkUsernameQuery = $conn->prepare("SELECT COUNT(*) FROM admin WHERE username = ?");
    $checkUsernameQuery->bind_param("s", $username);
    $checkUsernameQuery->execute();
    $checkUsernameQuery->bind_result($userExists);
    $checkUsernameQuery->fetch();
    $checkUsernameQuery->close();

    if ($userExists) {
        header('Location: ?page=addAdmin&error=Username sudah digunakan');
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Simpan admin baru ke database
    $insertAdminQuery = $conn->prepare("INSERT INTO admin (email, username, password, created_at) VALUES (?, ?, ?, NOW())");
    $insertAdminQuery->bind_param("sss", $email, $username, $hashedPassword);

    if ($insertAdminQuery->execute()) {
        $insertAdminQuery->close();
        header('Location: ?page=adminManagement&success=Admin baru berhasil ditambahkan');
        exit;
    } else {
        error_log("Query Error: " . $insertAdminQuery->error);
        $insertAdminQuery->close();
        header('Location: ?page=adminManagement&error=Pesan kesalahan yang relevan');
        exit;
    }
} else {
    header('Location: ?page=addAdmin&error=Metode request tidak valid');
    exit;
}
