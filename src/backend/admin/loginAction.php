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

    // Ambil data pengguna berdasarkan email
    $stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Email tidak ditemukan
        header("Location: ?page=login&error=email_not_found");
        exit;
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
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['username'] = $user['username'];

    if ($stmt->execute()) {
        header("Location: ?page=login&success=1");
    } else {
        header("Location: ?page=login&error=add_failed");
    }
    exit;
}

$stmt->close();
$conn->close();
