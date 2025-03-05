
# Deskripsi Proyek  
Mini-projek ini adalah aplikasi tabungan sederhana yang dibuat dengan PHP. Aplikasi ini memungkinkan pengguna untuk menyimpan, menarik, dan melihat saldo tabungan mereka.

# Tahapan commit 

1. Commit pertama: Hanya folder dan file kosong sesuai struktur proyek, tanpa kode.
2. Commit kedua : Setup database serta konfigurasinya : config/database.php (Konfigurasi database), database.sql, .htaccess 
3. Commit ketiga : Menambahkan routing dasar pada index.php dan atur routing di web.php
4. Commit keempat : Menambahkan controller logika aplikasi dasar untuk autentikasi, home dan saving 
5. Commit kelima : Tambah Middleware untuk Keamanan dan autentikasi AuthMiddleware.php ,memastikan user sudah login sebelum mengakses fitur tertentu.
6. Commit keenam :  Tambah Model untuk Menghubungkan ke Database. menambahkan models/User.php untuk menangani data pengguna, dan models/Saving.php untuk mengelola data tabungan user, serta menghubungkan model dengan database untuk operasi CRUD.
7. Commit ketujuh : Tambah View untuk Tampilan UI. Menambahkan tampilan halaman login, register, home, dan save, berserta css nya di file masing-masing. Css terpisah tidak digunakan. 