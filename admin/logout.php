<?php
// File untuk logout admin
// Memulai session
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Redirect ke halaman login dengan pesan
echo "<script>alert('Anda telah logout!'); window.location.href='index.php';</script>";
?>