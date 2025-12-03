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
    <title>Document</title>
</head>

<body>
    <?php
    // Validasi parameter ID
    if (isset($_GET['id']) == false) {
        // Jika tidak ada ID, redirect ke halaman produk
        echo "<script>window.location.href='index.php?page=produk';</script>";
        exit();
    }
    
    // Include koneksi database
    include "../koneksi.php";
    // Sanitasi ID untuk keamanan
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Proses update data produk
    if (isset($_POST['simpan'])) {
        // Sanitasi semua input dari form
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
        $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
        $jumlah = mysqli_real_escape_string($koneksi, $_POST['jumlah']);
        $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

        // Proses upload gambar (opsional)
        $gambar = $_FILES['gambar'];
        $nama_gambar = $gambar['name'];
        $size_gambar = $gambar['size'];
        $target_file = '../products/' . $nama_gambar;

        // Cek apakah ada file gambar baru yang diupload
        if (is_uploaded_file($gambar['tmp_name']) == false) {
            // Jika tidak ada gambar baru, update tanpa mengubah gambar
            $sql = "UPDATE produk SET nama ='$nama', kategori='$kategori', deskripsi='$deskripsi', jumlah='$jumlah', harga='$harga' WHERE id='$id'";
            $query = mysqli_query($koneksi, $sql);
            if ($query) {
                echo "<script>alert('Data berhasil diupdate!'); window.location.href='index.php?page=produk';</script>";
            }
        } else {
            // Jika ada gambar baru, validasi dan upload
            if ($size_gambar < 3000000) {
                if (move_uploaded_file($gambar['tmp_name'], $target_file)) {
                    // Update data beserta gambar baru
                    $sql = "UPDATE produk SET nama ='$nama', kategori='$kategori', deskripsi='$deskripsi', jumlah='$jumlah', harga='$harga', gambar='$nama_gambar' WHERE id='$id'";
                    $query = mysqli_query($koneksi, $sql);
                    if ($query) {
                        echo "<script>alert('Data berhasil diupdate!'); window.location.href='index.php?page=produk';</script>";
                    }
                } else {
                    echo "<div style='color: red;'>Data gagal disimpan dikarenakan gambar gagal di upload</div>";
                }
            } else {
                echo "<div style='color: red;'>Mohon maaf ukuran gambar terlalu besar (maksimal 3MB)</div>";
            }
        }
    }

    // Mengambil data produk berdasarkan ID untuk ditampilkan di form
    $sql = "SELECT*FROM produk WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    
    // Jika data tidak ditemukan, redirect ke halaman produk
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href='index.php?page=produk';</script>";
        exit();
    }
    ?>
    <h3>Edit Produk</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="nama" id="" value="<?= $data['nama'] ?>"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori" id="">
                        <option value="makanan" <?= $data['kategori'] == 'makanan' ? 'selected' : '' ?>>Makanan</option>
                        <option value="minuman" <?= $data['kategori'] == 'minuman' ? 'selected' : '' ?>>Minuman</option>
                        <option value="elektronik" <?= $data['kategori'] == 'elektronik' ? 'selected' : '' ?>>Elekronik</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>
                    <textarea name="deskripsi" id=""><?= $data['deskripsi'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>
                    <input type="number" name="jumlah" id="" value="<?= $data['jumlah'] ?>">
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="number" name="harga" id="" value="<?= $data['harga'] ?>">
                </td>
            </tr>
            <tr>
                <td>Upload Gambar</td>
                <td>
                    <?php
                    // Tampilkan gambar produk saat ini jika ada
                    if ($data['gambar'] != "") {
                    ?>
                        <img src="../products/<?= $data['gambar'] ?>" alt="<?= $data['nama'] ?>" width="100px">
                        <br><small>Gambar saat ini</small>
                    <?php
                    } else {
                        echo "<small>Gambar tidak tersedia</small>";
                    }
                    ?>
                    <br>
                    <input type="file" name="gambar" id="" accept="image/*">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="UBAH" name="simpan"></td>
            </tr>
        </table>
    </form>

</body>

</html>