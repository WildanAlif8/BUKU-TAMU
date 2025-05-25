# Aplikasi Buku Tamu Digital

Aplikasi buku tamu sederhana yang dibuat menggunakan CodeIgniter 3 dengan fitur lengkap untuk mengelola pesan pengunjung.

## Fitur Utama

### ✅ Fitur Wajib
- **Form Input Buku Tamu** - Siapa saja bisa mengisi nama, email, dan pesan
- **Daftar Pesan Admin** - Halaman khusus admin untuk melihat semua pesan (tanpa login)
- **Database Storage** - Data tersimpan dengan aman di database MySQL
- **Validasi Form** - Menggunakan CodeIgniter Form Validation

### 🚀 Fitur Tambahan
- **Filter Berdasarkan Tanggal** - Admin dapat memfilter pesan berdasarkan tanggal
- **Export CSV** - Ekspor data tamu ke format CSV
- **Detail Pesan** - Halaman detail untuk melihat pesan secara lengkap
- **Responsive Design** - Tampilan yang mobile-friendly
- **Statistik Real-time** - Jumlah pengunjung dan analisis pesan

## Persyaratan Sistem

- PHP 7.4 atau lebih baru
- MySQL 5.7 atau lebih baru
- Apache Web Server dengan mod_rewrite
- XAMPP (untuk development)

## Cara Instalasi di XAMPP

### 1. Persiapan File
1. Download dan ekstrak semua file aplikasi
2. Copy folder aplikasi ke `C:\xampp\htdocs\buku-tamu\`

### 2. Setup Database
1. Buka phpMyAdmin (`http://localhost/phpmyadmin`)
2. Buat database baru dengan nama `buku_tamu`
3. Import file `buku_tamu.sql` yang sudah disediakan
4. Atau jalankan query SQL berikut:

```sql
CREATE DATABASE IF NOT EXISTS buku_tamu;
USE buku_tamu;

CREATE TABLE tamu (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pesan TEXT NOT NULL,
    tanggal_dibuat DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
```

### 3. Konfigurasi Database
Edit file `application/config/database.php` jika diperlukan:

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',  // Kosongkan jika tidak ada password
    'database' => 'buku_tamu',
    // ... konfigurasi lainnya
);
```

### 4. Menjalankan Aplikasi
1. Start Apache dan MySQL di XAMPP Control Panel
2. Buka browser dan akses: `http://localhost/buku-tamu/`
3. Untuk halaman admin: `http://localhost/buku-tamu/admin`

## Struktur File

```
buku-tamu/
├── application/
│   ├── config/
│   │   ├── autoload.php
│   │   ├── database.php
│   │   └── routes.php
│   ├── controllers/
│   │   ├── Admin.php
│   │   └── BukuTamu.php
│   ├── models/
│   │   └── Tamu_model.php
│   └── views/
│       ├── admin/
│       │   ├── daftar_tamu.php
│       │   └── detail_tamu.php
│       ├── buku_tamu/
│       │   └── form_tamu.php
│       └── templates/
│           ├── header.php
│           └── footer.php
├── system/ (CodeIgniter core files)
├── .htaccess
├── index.php
├── buku_tamu.sql
```

## Panduan Penggunaan

### Untuk Pengunjung
1. Buka halaman utama aplikasi
2. Isi form dengan:
   - Nama lengkap (minimal 3 karakter)
   - Email yang valid
   - Pesan (minimal 10 karakter, maksimal 500 karakter)
3. Klik tombol "Kirim Pesan"
4. Pesan akan tersimpan dan muncul notifikasi sukses

### Untuk Admin
1. Akses halaman admin (`/admin`)
2. Lihat semua pesan yang masuk
3. Gunakan filter tanggal untuk mencari pesan spesifik
4. Klik "Lihat Detail" untuk melihat pesan lengkap
5. Export data ke CSV dengan tombol "Export CSV"
6. Hapus pesan yang tidak diinginkan

## Fitur Keamanan

- **Input Validation** - Semua input divalidasi sebelum disimpan
- **XSS Protection** - Output di-escape untuk mencegah XSS
- **SQL Injection Prevention** - Menggunakan Active Record CodeIgniter
- **File Access Control** - .htaccess melindungi file sistem

## Teknologi yang Digunakan

- **Backend**: PHP dengan CodeIgniter 3
- **Database**: MySQL
- **Frontend**: Bootstrap 5, HTML5, CSS3, JavaScript
- **Icons**: Font Awesome 6
- **Styling**: Custom CSS dengan gradient dan animasi

## Troubleshooting

### Error: Page Not Found
- Pastikan mod_rewrite Apache aktif
- Cek file .htaccess sudah ada di root folder
- Periksa konfigurasi base_url di `config.php`

### Database Connection Error
- Cek username/password database di `config/database.php`
- Pastikan MySQL service berjalan
- Verifikasi nama database sudah benar

### Form Validation Error
- Pastikan semua field required diisi
- Cek format email valid
- Pesan minimal 10 karakter

## Kredits

Aplikasi ini dibuat menggunakan:
- CodeIgniter 3 Framework
- Bootstrap 5 CSS Framework
- Font Awesome Icons
- Custom CSS animations

## Support

Jika mengalami masalah dalam instalasi atau penggunaan, pastikan:
1. Semua file telah di-copy dengan benar
2. Database sudah dibuat dan dikonfigurasi
3. Apache dan MySQL berjalan normal
4. PHP versi 7.4+

---

**Selamat menggunakan Aplikasi Buku Tamu Digital!** 🎉
