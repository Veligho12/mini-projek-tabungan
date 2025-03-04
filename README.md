
# Deskripsi Proyek  
Mini-projek ini adalah aplikasi tabungan sederhana yang dibuat dengan PHP. Aplikasi ini memungkinkan pengguna untuk menyimpan, menarik, dan melihat saldo tabungan mereka.

# Struktur Proyek  
mini-projek-tabungan
┣ app
┃ ┣ controllers (Berisi logic utama seperti autentikasi dan transaksi)
┃ ┃ ┣ AuthController.php
┃ ┃ ┣ HomeController.php
┃ ┃ ┗ SavingController.php
┃ ┣ helpers (Berisi middleware untuk otorisasi)
┃ ┃ ┗ AuthMiddleware.php
┃ ┣ models (Berisi model untuk database tabungan & user)
┃ ┃ ┣ Saving.php
┃ ┃ ┗ user.php
┃ ┣ views (Berisi tampilan halaman user dan admin)
┃ ┃ ┣ admin.php
┃ ┃ ┣ home.php
┃ ┃ ┣ login.php
┃ ┃ ┣ logout.php
┃ ┃ ┣ register.php
┃ ┃ ┗ save.php
┣ config
┃ ┗ database.php (Konfigurasi database)
┣ public/css
┃ ┗ style.css (File CSS untuk styling)
┣ routes
┃ ┗ web.php (Routing aplikasi)
┣ .htaccess
┣ database.sql (File SQL untuk inisialisasi database)
┣ index.php (Entry point aplikasi)
┗ README.md


# Tahapan commit 

1. Commit pertama: Hanya folder dan file kosong sesuai struktur proyek, tanpa kode.
2. Commit kedua : Setup konfigurasi : config/database.php (Konfigurasi database), database.sql, .htaccess 

