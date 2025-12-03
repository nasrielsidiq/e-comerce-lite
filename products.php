<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Toko Online</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <h1>Toko Online</h1>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="admin/index.php">Admin</a></li>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="best-seller">
                    <h2>All Products</h2>
                    <div class="products">
                        <?php
                        // Include koneksi database
                        include "koneksi.php";
                        
                        // Query untuk mengambil semua produk
                        $sql = "SELECT*FROM produk ORDER BY id DESC";
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
                                    <!-- Harga produk dengan format rupiah -->
                                    <div class="price-product">Rp. <?= number_format($data['harga'], 0, ',', '.') ?></div>
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

    <div class="footer">
        <div class="container">
            <p>&copy; 2024 Toko Online</p>
        </div>
    </div>
</body>

</html>