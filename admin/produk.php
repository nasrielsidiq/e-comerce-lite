<?php
// Cek apakah user sudah login
// Jika belum login, redirect ke halaman login
if (!isset($_SESSION['username'])) {
  header("location:index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk</title>
  <style>
    table tr th {
      background-color: green;

    }

    table tr td {
      background-color: silver;
    }
  </style>
</head>

<body>
  <!-- Form pencarian produk -->
  <form action="" method="get">
    <!-- Hidden input untuk mempertahankan parameter page -->
    <input type="hidden" name="page" value="produk">
    <input type="search" name="cari" id="" placeholder="Cari nama produk atau kategori...">
    <input type="submit" value="Cari">
  </form>
  <br>
  <a href="index.php?page=create-produk">
    <button>Tambah Data Produk</button>
  </a>
  <br>
  <br>
  <table border=1>
    <tr>
      <th>No</th>
      <th>Nama Produk</th>
      <th>Kategori</th>
      <th>Deskripsi</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
    <?php
    // Include koneksi database
    include "../koneksi.php";
    
    // Cek apakah ada parameter pencarian
    if (isset($_GET['cari'])) {
      // Sanitasi input pencarian
      $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
      // Query pencarian berdasarkan nama atau kategori produk
      $sql = "SELECT*FROM produk WHERE nama LIKE '%$cari%' OR kategori LIKE '%$cari%'";
    } else {
      // Jika tidak ada pencarian, tampilkan semua produk
      $sql = "SELECT*FROM produk";
    }

    // Eksekusi query
    $query = mysqli_query($koneksi, $sql);
    $no = 1; // Nomor urut untuk tabel
    
    // Loop untuk menampilkan data produk
    while ($data = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['kategori'] ?></td>
        <td><?= $data['deskripsi'] ?></td>
        <td><?= $data['jumlah'] ?></td>
        <td><?= $data['harga'] ?></td>
        <td>
          <?php
          // Cek apakah file gambar ada
          if (file_exists('../products/' . $data['gambar'])) {
          ?>
            <img src="<?= '../products/' . $data['gambar'] ?>" alt="<?= $data['nama'] ?>" width="50" height="50">
          <?php
          } else {
            echo "No Image";
          }
          ?>
        </td>
        <td>
          <!-- Link untuk hapus produk dengan konfirmasi -->
          <a href="delete-produk.php?id=<?= $data['id'] ?>" onclick="return confirm('Yakin hapus data ini?')" style="color: red;">Hapus</a> |
          <!-- Link untuk edit produk -->
          <a href="index.php?page=edit-produk&id=<?= $data['id'] ?>" style="color: blue;">Edit</a>
        </td>
      </tr>
    <?php
    }
    ?>

</body>

</html>