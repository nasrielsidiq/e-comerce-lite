<?php
// File konfigurasi koneksi database MySQL
// Menggunakan mysqli untuk koneksi ke database
$koneksi = mysqli_connect("localhost", "phpaccess", "PhpDevelop", "db_toko_online");

// Cek koneksi database
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
