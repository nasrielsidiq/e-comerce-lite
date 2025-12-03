<?php
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Produk</title>
</head>

<body>
    <h3>Create Produk</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="nama" id=""></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori" id="">
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>
                    <textarea name="deskripsi" id=""></textarea>
                </td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>
                    <input type="number" name="jumlah" id="">
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="number" name="harga" id="">
                </td>
            </tr>
            <tr>
                <td>Upload Gambar</td>
                <td>
                    <input type="file" name="gambar" id="" accept="image/*">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="SIMPAN" name="simpan"></td>
            </tr>
        </table>
    </form>
    <?php
    // Proses penyimpanan data produk baru
    if (isset($_POST['simpan'])) {
        // Include koneksi database
        include "../koneksi.php";
        
        // Sanitasi semua input dari form
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
        $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
        $jumlah = mysqli_real_escape_string($koneksi, $_POST['jumlah']);
        $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

        // Proses upload gambar
        $gambar = $_FILES['gambar'];
        $nama_gambar = $gambar['name'];
        $size_gambar = $gambar['size'];
        $target_file = '../products/' . $nama_gambar; // Simpan ke folder products

        // Validasi ukuran file (maksimal 3MB)
        if ($size_gambar < 3000000) {
            // Upload file gambar
            if (move_uploaded_file($gambar['tmp_name'], $target_file)) {
                // Insert data ke database
                $sql = "INSERT INTO produk VALUES('', '$nama', '$kategori', '$deskripsi', '$jumlah', '$harga', '$nama_gambar')";
                $query = mysqli_query($koneksi, $sql);
                if ($query) {
                    echo "<div style='color: green;'>Data berhasil disimpan!</div>";
    ?>
                    <a href="index.php?page=produk">Lihat semua data</a>
    <?php
                } else {
                    echo "<div style='color: red;'>Gagal menyimpan ke database!</div>";
                }
            } else {
                echo "<div style='color: red;'>Data gagal disimpan dikarenakan gambar gagal di upload</div>";
            }
        } else {
            echo "<div style='color: red;'>Mohon maaf ukuran gambar terlalu besar (maksimal 3MB)</div>";
        }
    }
    ?>
</body>

</html>