<p align="center"><image src="boom.png" width="400"></p>

# Requirements

* Laragon
* phpMyAdmin
* Composer

# Getting Started

### 1. Clone Repository
Buka folder `C:\laragon\www` kemudian clone repository dengan command berikut.
```
git clone https://github.com/AndhikaRei/Cent.git
cd cent
```
Sebelum melakukan ini pastikan kamu sudah menginstall git di di pc. Setelah melakukan ini file hasil dari github mestinya sudah ada di pc mu.

#### 2. Install Composer dan npm dependency

Untuk windows, dapat mendownload composer pada [link](https://getcomposer.org/download/) ini, kemudian ikuti langkah-langkahnya. Setelah terinstall, pindah ke directory project `cent` dan jalankan command berikut.
```
composer install
npm install
```
Apabila menggunakan laragon maka tidak perlu menginstall composer

#### 3. Copy file .env

`.env.example` hanyalah sampel dari `.env` sehingga perlu di-copy untuk digunakan.
```
copy .env.example .env
```
Command diatas akan meng-copy `.env.example` menjadi `.env`

#### 4. Generate encryption key

Laravel memerlukan kode enkripsi pada file `.env`. Command berikut akan menambah `APP_KEY` pada file `.env`.
```
php artican key:generate
```

#### 5. Buat database baru

Buka browser kemudian buka login page phpmyadmin atau `localhost/phpmyadmin`. Login dengan username root (jika masih default), kemudian tambah database baru dengan nama `{project_name}` atau `cent`.

#### 6. Tambahkan info database di .env file

Buka file `.env` kemudian ganti `DB_DATABASE` menjadi `{project_name}` atau `cent`.

#### 7. Migrasi database

Buka terminal di folder `cent` kemudian jalankan command berikut.
```
php artisan migrate
```
Command diatas akan memigrasi tabel ke database.

#### 8. Seed database

```
php artisan db:seed
```
Command diatas akan mengisi database dengan dummy data.

#### 9. Akses webpage

