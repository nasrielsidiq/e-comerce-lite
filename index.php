<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online - Beranda</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Header/Bagian atas website -->
    <div class="header">
        <div class="container">
            <h1>Toko Online</h1>
        </div>
    </div>

    <!-- Menu navigasi utama dengan hamburger menu untuk mobile -->
    <div class="menu">
        <div class="container">
            <!-- Checkbox untuk toggle hamburger menu -->
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </label>
            <!-- Daftar menu navigasi -->
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="admin/index.php">Admin</a></li>
            </ul>
        </div>
    </div>

    <!-- Konten utama halaman -->
    <div class="content">
        <div class="container">
            <!-- Bagian banner promosi -->
            <div class="row">
                <div class="banner">
                    <img class="img-banner" src="images/banner.webp" alt="Banner Toko Online">
                </div>
            </div>
            <!-- Bagian produk best seller -->
            <div class="row">
                <div class="best-seller" id="products">
                    <h2>Best Seller</h2>
                    <div class="products">
                        <?php
                        // Include file koneksi database
                        include "koneksi.php";
                        
                        // Query untuk mengambil semua data produk
                        $sql = "SELECT*FROM produk";
                        $query = mysqli_query($koneksi, $sql);
                        
                        // Loop untuk menampilkan setiap produk
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <!-- Link ke halaman detail produk -->
                            <a href="pages/detail-produk.php?id=<?= $data['id'] ?>">
                                <div class="product-item">
                                    <!-- Gambar produk -->
                                    <img class="img-product" src="products/<?= $data['gambar'] ?>" alt="<?= $data['nama'] ?>">
                                    <!-- Nama produk -->
                                    <div class="name-product"><?= $data['nama'] ?></div>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer/Bagian bawah website -->
    <div class="footer">
        <div class="container">
            <p>&copy; 2024 Toko Online</p>
        </div>
    </div>
</body>

</html>