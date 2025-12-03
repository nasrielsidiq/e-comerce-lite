<!-- Form login administrator -->
<br>
<h3>LOGIN ADMINISTRATOR</h3>
<br>
<form action="" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" id="" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id="" required></td>
        </tr>
        <tr>
            <td><input type="submit" value="LOGIN" name="login"></td>
        </tr>
    </table>
</form>
<?php
// Proses login administrator
if (isset($_POST['login'])) {
    // Include koneksi database
    include "../koneksi.php";
    
    // Sanitasi input untuk mencegah SQL injection
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    // Hash password dengan SHA1 (sesuai dengan yang tersimpan di database)
    $password = mysqli_real_escape_string($koneksi, sha1($_POST['password']));
    
    // Query untuk cek username dan password
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($koneksi, $sql);
    
    // Jika data ditemukan (login berhasil)
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        // Simpan data user ke session
        $_SESSION['username'] = $data['username'];
        $_SESSION['name'] = $data['name'];
        // Redirect ke halaman produk
        header("location:index.php?page=produk");
    } else {
        // Jika login gagal
        echo "<div style='color: red;'>Login anda gagal! Periksa username dan password.</div>";
    }
}
?>