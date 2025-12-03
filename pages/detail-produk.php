<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <h1>Toko Online</h1>
        </div>
    </div>

    <div class="menu">
        <div class="container">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../products.php">Products</a></li>
                <li><a href="../admin/index.php">Admin</a></li>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="detail-product">
                    <?php
                    // Include koneksi database
                    include "../koneksi.php";
                    
                    // Ambil ID produk dari parameter URL
                    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
                    
                    // Query untuk mengambil detail produk berdasarkan ID
                    $sql = "SELECT * FROM produk WHERE id = '$id'";
                    $query = mysqli_query($koneksi, $sql);
                    $data = mysqli_fetch_array($query);
                    
                    // Jika produk tidak ditemukan, redirect ke halaman utama
                    if (!$data) {
                        echo "<script>alert('Produk tidak ditemukan!'); window.location.href='../index.php';</script>";
                        exit();
                    }
                    ?>
                    <!-- Gambar produk -->
                    <img class="img-product" src="../products/<?= $data['gambar'] ?>" alt="<?= $data['nama'] ?>">
                    
                    <!-- Detail informasi produk -->
                    <div class="deskripsi">
                        <!-- Nama produk -->
                        <h1><?= $data['nama'] ?></h1>
                        
                        <!-- Informasi stok -->
                        <h3>Stok: <?= $data['jumlah'] ?> pcs</h3>
                        
                        <!-- Harga produk dengan format rupiah -->
                        <h3>Harga: Rp. <?= number_format($data['harga'], 0, ',', '.') ?></h3>
                        
                        <!-- Kategori produk -->
                        <h4>Kategori: <?= ucfirst($data['kategori']) ?></h4>
                        
                        <br>
                        
                        <!-- Deskripsi produk -->
                        <p><?= nl2br($data['deskripsi']) ?></p>

                        <br>
                        
                        <!-- Tombol untuk menambah ke keranjang (belum berfungsi) -->
                        <button onclick="alert('Fitur keranjang belum tersedia!')">Tambah ke keranjang</button>
                        
                        <!-- Tombol kembali -->
                        <br><br>
                        <a href="../products.php" style="text-decoration: none;">
                            <button style="background-color: #ccc;">Kembali ke Produk</button>
                        </a>
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