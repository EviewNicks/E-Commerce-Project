<?php
session_start();

// Hapus semua item dalam keranjang
unset($_SESSION['cart']);

// Redirect kembali ke halaman keranjang
header('Location: ?page=keranjang');
exit();
