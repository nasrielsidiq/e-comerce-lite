<?php
// File untuk menghapus produk berdasarkan ID

// Cek apakah parameter ID ada
if(isset($_GET['id'])){
    // Include koneksi database
    include "../koneksi.php";
    
    // Sanitasi ID untuk keamanan
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    // Query untuk menghapus produk berdasarkan ID
    $sql = "DELETE FROM produk WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
    
    // Cek apakah penghapusan berhasil
    if($query){
        // Jika berhasil, tampilkan pesan dan redirect
        echo "<script>alert('Data dengan ID $id berhasil dihapus!'); window.location.href='index.php?page=produk';</script>";
    }else{
        // Jika gagal, tampilkan pesan error
        echo "<script>alert('Data gagal dihapus!'); window.location.href='index.php?page=produk';</script>";
    }
}else{
    // Jika tidak ada parameter ID
    echo "<h1>Error: ID tidak ditemukan!</h1>";
    echo "<a href='index.php?page=produk'>Kembali ke daftar produk</a>";
}