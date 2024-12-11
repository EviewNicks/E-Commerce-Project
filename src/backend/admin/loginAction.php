<?php
include BASE_PATH . '/backend/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ?page=login&error=invalid_email");
        exit;
    }

    // Pertama cek apakah email ada di tabel admin
    $stmt = $conn->prepare("SELECT admin_id AS id, username, password, 'admin' AS role FROM admin WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Jika tidak ditemukan di tabel admin, cek di tabel users
        $stmt = $conn->prepare("SELECT user_id AS id, username, password, 'user' AS role FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            // Email tidak ditemukan di kedua tabel
            header("Location: ?page=login&error=email_not_found");
            exit;
        }
    }

    $user = $result->fetch_assoc();
    $hashed_password = $user['password'];

    // Verifikasi password
    if (!password_verify($password, $hashed_password)) {
        header("Location: ?page=login&error=invalid_password");
        exit;
    }

    // Jika login berhasil, arahkan ke halaman dashboard atau berikan modal sukses
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // Tentukan halaman tujuan berdasarkan role
    if ($user['role'] === 'admin') {
        header("Location: ?page=products"); // Admin ke halaman produk
    } else {
        header("Location: ?page=homePageUser"); // User ke halaman beranda
    }
    exit;
}

$stmt->close();
$conn->close();
