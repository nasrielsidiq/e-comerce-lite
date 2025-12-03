-- Database: db_toko_online
-- Data dummy untuk aplikasi toko online

-- Data untuk tabel users (admin)
INSERT INTO users (username, password, name) VALUES
('admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Administrator'),
('manager', '8cb2237d0679ca88db6464eac60da96345513964', 'Manager Toko');

-- Data untuk tabel produk
INSERT INTO produk (nama, kategori, deskripsi, jumlah, harga, gambar) VALUES
('Nasi Gudeg', 'makanan', 'Nasi gudeg khas Yogyakarta dengan ayam dan telur', 25, 15000.00, '1.jpeg'),
('Sate Ayam', 'makanan', 'Sate ayam bakar dengan bumbu kacang spesial', 30, 20000.00, '2.jpeg'),
('Rendang Daging', 'makanan', 'Rendang daging sapi khas Padang yang gurih dan pedas', 15, 35000.00, '3.jpeg'),
('Es Teh Manis', 'minuman', 'Es teh manis segar untuk menemani makan', 50, 5000.00, '1.jpeg'),
('Jus Jeruk', 'minuman', 'Jus jeruk segar tanpa pengawet', 40, 8000.00, '2.jpeg'),
('Kopi Hitam', 'minuman', 'Kopi hitam robusta pilihan dengan aroma khas', 35, 7000.00, '3.jpeg'),
('Smartphone Android', 'elektronik', 'Smartphone Android RAM 4GB storage 64GB', 10, 2500000.00, '1.jpeg'),
('Laptop Gaming', 'elektronik', 'Laptop gaming dengan spesifikasi tinggi', 5, 8500000.00, '2.jpeg'),
('Headphone Bluetooth', 'elektronik', 'Headphone wireless dengan kualitas suara jernih', 20, 350000.00, '3.jpeg'),
('Mie Ayam', 'makanan', 'Mie ayam dengan topping lengkap dan kuah gurih', 40, 12000.00, '1.jpeg');

-- Password untuk user:
-- admin: password = 'hello' (SHA1: f865b53623b121fd34ee5426c792e5c33af8c227)
-- manager: password = 'secret' (SHA1: 8cb2237d0679ca88db6464eac60da96345513964)