•	Deskripsi:
Aplikasi pendataan produk menggunakan Laravel untuk membuat proses create, read, update, dan delete (CRUD) sederhana. CRUD merupakan proses standar yang biasa ditemukan pada sebuah sistem aplikasi web. 

•	Data:
* [✅] Data Barang: [
    Nama barang,
    Deskripsi,
    Jenis barang,
    Stock barang,
    Harga Beli,
    Harga Jual ,
    Gambar barang,
] 
* [✅] Data pembeli: [
    Nama ,
    TTL,
    Jenis kelamin,
    Alamat,
    Foto KTP,
    User,
    Password,
    Retype Password,
]
* [✅] Data Staff: [
    Nama ,
    Jenis kelamin,
    user,
    Password,
    Retype Password,
]

•	Aturan:
* [✅] Sebelum menggunakan aplikasi setiap user harus login terlebih dahulu
* [✅] Staff dapat memasukan data pembeli pada aplikasi sehingga pembeli dapat masuk kedalam aplikasi
* [✅] Staff dapat memasukkan, mengedit dan menghapus data barang
* [✅] Admin dapat memasukkan, mengedit, menghapus data obat dan user 
* [✅] Ketika pembeli selesai membeli barang maka staff memvalidasinya dan jika staff klik “submit” pada data penjualan maka stock barang akan berkurang.

•	Menjalankan:

Install Composer
```bash
composer install
```

Salin `.env`, lalu sesuaikan `DB_DATABASE` dan lainnya
```bash
cp .env.example .env
```

Buat kunci
```bash
php artisan key:generate
```

Migrasi
```bash
php artisan migrate
```

Seeder
```bash
php artisan make:seeder UsersTableSeeder
```

Symlink
```bash
php artisan storage:link
```

Jalankan
```bash
php artisan serve
```
