# Aplikasi Toko Online

Aplikasi web sederhana untuk toko online yang dibangun menggunakan PHP dan MySQL. Aplikasi ini memiliki fitur untuk menampilkan produk kepada pengunjung dan panel admin untuk mengelola produk.

## 📋 Fitur Aplikasi

### Frontend (Pengunjung)
- **Halaman Beranda**: Menampilkan banner dan produk best seller
- **Halaman Produk**: Menampilkan semua produk yang tersedia
- **Detail Produk**: Menampilkan informasi lengkap produk (nama, harga, stok, deskripsi, kategori)
- **Navigasi Responsif**: Menu hamburger untuk tampilan mobile

### Backend (Admin Panel)
- **Login Admin**: Sistem autentikasi untuk administrator
- **Dashboard Produk**: Menampilkan daftar semua produk dalam bentuk tabel
- **CRUD Produk**: 
  - ✅ Create (Tambah produk baru)
  - ✅ Read (Lihat daftar produk)
  - ✅ Update (Edit produk)
  - ✅ Delete (Hapus produk)
- **Upload Gambar**: Fitur upload gambar produk
- **Pencarian Produk**: Cari produk berdasarkan nama atau kategori
- **Session Management**: Sistem login/logout admin

## 🗂️ Struktur File

```
latihanskillpassport/
├── admin/                      # Panel administrasi
│   ├── index.php              # Halaman utama admin dengan routing
│   ├── login.php              # Form dan proses login admin
│   ├── logout.php             # Proses logout admin
│   ├── produk.php             # Daftar produk dan pencarian
│   ├── create-produk.php      # Form tambah produk baru
│   ├── edit-produk.php        # Form edit produk
│   └── delete-produk.php      # Proses hapus produk
├── pages/                      # Halaman frontend
│   └── detail-produk.php      # Halaman detail produk
├── css/                        # File stylesheet
│   └── style.css              # CSS untuk styling
├── images/                     # Gambar banner
│   └── banner.webp            # Banner utama
├── products/                   # Folder penyimpanan gambar produk
│   ├── 1.jpeg                 # Contoh gambar produk
│   ├── 2.jpeg
│   └── 3.jpeg
├── index.php                   # Halaman beranda
├── products.php                # Halaman semua produk
├── koneksi.php                 # Konfigurasi koneksi database
├── dummy_data.sql              # Data dummy untuk testing
└── README.md                   # Dokumentasi aplikasi
```

## 🗄️ Database

### Nama Database: `db_toko_online`

### Tabel yang Dibutuhkan:

#### 1. Tabel `users` (Admin)
```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
);
```

#### 2. Tabel `produk` (Produk)
```sql
CREATE TABLE produk (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    kategori ENUM('makanan', 'minuman', 'elektronik') NOT NULL,
    deskripsi TEXT,
    jumlah INT NOT NULL DEFAULT 0,
    harga DECIMAL(10,2) NOT NULL,
    gambar VARCHAR(255)
);
```

## ⚙️ Instalasi dan Setup

### 1. Persiapan Environment
- **Web Server**: Apache/Nginx
- **PHP**: Versi 7.4 atau lebih baru
- **Database**: MySQL 5.7 atau MariaDB
- **Browser**: Chrome, Firefox, Safari, Edge

### 2. Konfigurasi Database
1. Buat database baru dengan nama `db_toko_online`
2. Import file `dummy_data.sql` untuk data contoh
3. Sesuaikan konfigurasi database di `koneksi.php`:
   ```php
   $koneksi = mysqli_connect("localhost", "username", "password", "db_toko_online");
   ```

### 3. Setup File dan Folder
1. Upload semua file ke web server
2. Pastikan folder `products/` memiliki permission write (755 atau 777)
3. Pastikan folder `images/` dapat diakses

### 4. Data Login Admin
**Username**: `admin`  
**Password**: `hello`

**Username**: `manager`  
**Password**: `secret`

## 🚀 Cara Penggunaan

### Untuk Pengunjung:
1. Akses `index.php` untuk melihat halaman beranda
2. Klik menu "Products" untuk melihat semua produk
3. Klik produk untuk melihat detail lengkap

### Untuk Admin:
1. Akses `admin/index.php` atau klik menu "Admin"
2. Login menggunakan username dan password admin
3. Kelola produk melalui menu yang tersedia:
   - Lihat daftar produk
   - Tambah produk baru
   - Edit produk yang ada
   - Hapus produk
   - Cari produk

## 🔧 Fitur Teknis

### Keamanan:
- **SQL Injection Protection**: Menggunakan `mysqli_real_escape_string()`
- **Session Management**: Validasi login admin
- **File Upload Validation**: Validasi ukuran dan tipe file
- **Input Sanitization**: Pembersihan input user

### Validasi:
- **Form Validation**: Required fields pada form
- **File Size Limit**: Maksimal 3MB untuk upload gambar
- **Image Format**: Mendukung format gambar umum
- **Data Validation**: Validasi data sebelum insert/update

### Responsive Design:
- **Mobile Friendly**: Menu hamburger untuk mobile
- **Flexible Layout**: Layout yang menyesuaikan ukuran layar
- **Cross Browser**: Kompatibel dengan browser modern

## 📝 Catatan Pengembangan

### Teknologi yang Digunakan:
- **Backend**: PHP (Procedural Style)
- **Database**: MySQL dengan MySQLi
- **Frontend**: HTML5, CSS3, JavaScript
- **Session**: PHP Native Session

### Pattern yang Digunakan:
- **MVC-like Structure**: Pemisahan logic dan view
- **Include/Require**: Modular file structure
- **GET/POST Routing**: Simple routing system
- **CRUD Operations**: Complete database operations

### Limitasi Saat Ini:
- Belum ada sistem keranjang belanja
- Belum ada sistem pembayaran
- Belum ada manajemen user customer
- Belum ada sistem kategori yang kompleks
- Password menggunakan SHA1 (sebaiknya gunakan password_hash())

## 🔄 Pengembangan Selanjutnya

Fitur yang bisa ditambahkan:
- [ ] Sistem keranjang belanja
- [ ] Checkout dan pembayaran
- [ ] Registrasi customer
- [ ] Sistem review produk
- [ ] Manajemen kategori
- [ ] Dashboard analytics
- [ ] Export/Import data
- [ ] Email notifications

## 📞 Support

Jika ada pertanyaan atau masalah dalam penggunaan aplikasi ini, silakan hubungi developer atau buat issue di repository.

---
**Dibuat untuk keperluan pembelajaran PHP dan MySQL**