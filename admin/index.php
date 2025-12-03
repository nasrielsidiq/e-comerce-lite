<?php
// Memulai session untuk mengelola login admin
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <h1>Online Shop</h1>
        </div>
    </div>

    <div class="menu">
        <div class="container">
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </label>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="index.php?page=produk">Products</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <?php
                // Sistem routing untuk halaman admin
                // Menggunakan parameter GET 'page' untuk menentukan halaman yang ditampilkan
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch ($page) {
                        case 'produk':
                            // Halaman daftar produk
                            include "produk.php";
                            break;
                        case 'create-produk':
                            // Halaman tambah produk baru
                            include 'create-produk.php';
                            break;
                        case 'edit-produk':
                            // Halaman edit produk
                            include 'edit-produk.php';
                            break;
                        default:
                            // Default ke halaman login
                            include "login.php";
                            break;
                    }
                } else {
                    // Jika tidak ada parameter page, tampilkan login
                    include "login.php";
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>