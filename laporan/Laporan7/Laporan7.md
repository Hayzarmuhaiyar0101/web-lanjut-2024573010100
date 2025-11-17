# Laporan Modul 7: Eloquent Relationship & Pagination

**Mata Kuliah:** Workshop Web Lanjut  
**Nama:** Hayzar Muhaiyar
**NIM:** 2024573010100
**Kelas:** TI-2C

---

## Abstrak

Laporan ini membahas penerapan Eloquent Relationship dan Pagination pada Laravel. Eloquent Relationship digunakan untuk menghubungkan tabel dalam database seperti One-to-One, One-to-Many, dan Many-to-Many, sehingga data dapat dikelola dengan lebih efisien. Pagination digunakan untuk membatasi jumlah data yang ditampilkan dalam satu halaman, agar tampilan lebih rapi dan performa aplikasi tetap optimal. Praktikum ini bertujuan memberikan pemahaman langsung mengenai konsep relasi dan cara menampilkannya pada aplikasi web berbasis Laravel.

---

## 1. Dasar Teori

1. Eloquent ORM

Eloquent adalah ORM (Object Relational Mapping) bawaan Laravel yang memungkinkan developer bekerja dengan database menggunakan model PHP tanpa perlu menulis query SQL secara manual.

2. Jenis–Jenis Relasi Eloquent

One-to-One
Relasi satu data pada tabel A berhubungan dengan satu data pada tabel B.
Contoh: User memiliki satu Profile.

One-to-Many
Relasi satu data pada tabel A mempunyai banyak data pada tabel B.
Contoh: Satu User memiliki banyak Post.

Many-to-Many
Relasi banyak data pada tabel A terhubung dengan banyak data pada tabel B melalui tabel pivot.
Contoh: Post memiliki banyak Tag, dan satu Tag dimiliki oleh banyak Post.

3. Pagination

Pagination adalah proses membagi data menjadi beberapa halaman agar tampilan data lebih terstruktur dan menghindari overload pada browser. Laravel menyediakan metode pagination seperti:

paginate()

simplePaginate()

links() untuk menampilkan navigasi halaman.

---

## 2. Langkah-Langkah Praktikum

##Praktikum 1: Eloquent ORM Relationships: One-to-One, One-to-Many, Many-to-Many

- Langkah 1: Buat dan Buka Proyek Laravel :
  Kita akan membuat proyek Laravel baru.

 laravel new complex-relationships
 cd complex-relationships
 code .

Selanjutnya Bikin Database Baru dengan nama : eloquentrelation_db
Kemudian Konfigurasi MySQL:
Edit file .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eloquentrelation_db
DB_USERNAME=<username database anda>
DB_PASSWORD=<password database anda jika ada>

- Langkah 2 : Buat Migrasi Untuk Skema Database

Jalankan Perintah Berikut di dalam Terminal :
php artisan make:migration create_profiles_table
php artisan make:migration create_posts_table
php artisan make:migration create_tags_table
php artisan make:migration create_post_tag_table

- Edit database/migrations/YYYY_MM_DD_create_profiles_table.php
- Kemudian Isi Dengan Code Berikut :
![Create.Profiles](Gambar/Create_profile_tables.png)       
- Edit database/migrations/YYYY_MM_DD_create_posts_table.php:
![Create.Posts](Gambar/Create_posts_tables.png)
- Edit database/migrations/YYYY_MM_DD_create_tags_table.php:
- ![Create.Tags](Gambar/Create_tags_tables.png)
 Kemudian Jalankan Perintah Berikut :
 php artisan migrate

 Langkah 3: Mendefinisikan Model Eloquent

Jalankan Perintah berikut untuk membuat model:

- php artisan make:model Profile
- php artisan make:model Post
- php artisan make:model Tag

Kemudian Edit file app/model/User. tambahkan method profile() dan post():
- ![User.php](Gambar/User.php.png)

Edit File app/model/Profile.php:
- ![Profile.php](Gambar/Profile.php.png)

Edit File app/Model/Post.php
- ![Post.php](Gambar/Posts.php.png)

Edit File app/model/Tag.php
- ![Tag.php](Gambar/Tag.php.png)


Langkah 4 : Membuat Seeder

Jalankan Perintah :
- php artisan make:seeder DatabaseSeeder
Selanjutnya Perbarui file DatabaseSeeder.php dan method run():
- ![DataBaseSeeder](Gambar/Databaseseeder.png)

Kemudian Jalankan Seeder untuk mengisi database dengan perintah berikut:
- php artisan db:seed

Langkah 5: Membuat Controller

- Jalankan Perintah Berikut :
- php artisan make:controller UserController
- php artisan make:controller PostController

- Edit app/Http/Controlers/UserController.php :
- ![UserController.php](Gambar/UserController.png)

- Edit app/Htpp/Controller/postController.php
- ![PostController.php](Gambar/Postscontroller.png)

Langkah 6: Mendefinisikan Web Routes:
- Buka routes/web.php dan perbarui:
- ![Web.php](Gambar/Web.php.png)

Langkah 7: Membuat View Menggunakan Boostrap

Buat Layout Base :
- - Buat Folder layouts di resources/view dan buat file resources/view/layouts/app.blade.php Kemudian isi dengan code berikut:
- ![app.blade.php](Gambar/App.blade.png)

Buat Views untuk users
- - Buat Folder users di resources/view dan buat file index.blade.php dan isi dengan code berikut:
- ![Index.blade.php](Gambar/index.blade.png)

- - Buat file show.blade.php di resources/views/users/ dan isi dengan code berikut:
- ![show.blade.php](Gambar/Show.blade.png)

Buat Views untuk posts
- - bikin folder posts di resources/views dan buat file index.blade.php
- ![Posts.Index.blade.php](Gambar/index.blade.post.png)

- - buat file show.blade.php di resources/view/posts/show.blade.php kemudian isi dengan code berikut:
- ![Show.Blade.Posts](Gambar/Show.blade.posts.png)

Langkah 8: Testing Aplikasi
Setelah menyelesaikan semua langkah demi langkah tersebut, jalankan perintah:
- php artisan serve
Kunjungi http://127.0.0.1:8000/users atau http://127.0.0.1:8000/posts

- ![HasilUsers](Gambar/HasilUsers.png)
- ![HasilPosts](Gambar/HasilPosts.png)


##Praktikum 2: Paginasi dengan Eloquent ORM

- Langkah 1: Membuat Proyek Laravel Baru

 laravel new productpagination
 cd productpagination
 code.

- Langkah 2: Konfigurasi Dan Buat database

 - create DATABASE pagination_db;

Install dependecy MySQL:
- composer require doctrine/dbal

konfigurasi MySQL: 
Edit File .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pagination_db
DB_USERNAME=<username database anda>
DB_PASSWORD=<password database anda jika ada>

Bersihkan Config Cache:
 - php artisan config:clear

Langkah 3: Membuat Model Dan Migrasi Product 

Jalankan Perintah Berikut untuk membuat model Product dan migrasi:
 - php artisan make:model Product -m
Perbarui file migrasi database/migration/xxx_create_products_table.php:
dengan code berikut:
- ![product_table.php2](Gambar/Create.product.table.png)
Kemudian Jalankan migrasi dengan cara ketik perintah ini di terminal:
 - php artisan migrate

Membuat Seeder untuk Data Dummy 
Jalankan Perintah berikut di terminal:
 - php artisan make:seeder ProductSeeder
 Kemudian buka file yang di hasilkan dan Perbarui:
 - ![ProductSeeder.php2](Gambar/ProductSeeder.png)

Kemudian Update file product.php buka file app/Models/product.php dan perbarui:
 - ![Product.php](Gambar/Product.php.png)

Buat factory untuk model Product dengan menjalankan perintah berikut:
 - php artisan make:factory ProductFactory --model=Product 

kemudian buka file yang dihasilkan dan perbarui:
- ![ProductFactory.php](Gambar/ProductFactory.png)

Selanjutnya modifikasi file DatabaseSeeder.php 
- ![Databaseseeder](Gambar/DataBaseSeeder2.png)
dan jalankan perintah:
 - php artisan db:seed

Langkah 5: Membuat Controller Untuk Paginasi

Jalankan Perintah ini di terminal untuk membuat Controller:
 - php artisan make:controller ProductCotroller
Kemudian Edit file ProductController.php dengan isi code berikut:
- ![ProductController](Gambar/ProductController.png)

Langkah 6: Definisikan Route
Buka File routes/web.php dan tambahkan code berikut:
- ![HasilPosts](Gambar/Web.php2.png)

Langkah 7: Membuat View Untuk Daftar Produk dengan Paginasi
 Buat Folder Product di resources/view dan bikin file baru di dalam folder Product dengan nama index.blade.php
 isi dengan code berikut:
 - ![Index.blade.php2](Gambar/Index.blade.2.png)

Langkah 8: Menjalankan Dan Menguji 
Setelah menyelesaikan seluruh langkah - langkah tersebut, Kemudian kita jalankan perintah berikut
 - php artisan serve
 dan kunjungi:
- http://localhost:8000/products

- ![HasilProduct](Gambar/HasilProducts.png)

---

## 3. Hasil dan Pembahasan

Pada praktikum ini, relasi antar model berhasil dibuat dan diuji. Penggunaan One-to-One, One-to-Many, dan Many-to-Many memungkinkan data saling terhubung tanpa query SQL yang kompleks.

Selain itu, pagination berhasil diterapkan untuk membatasi jumlah data post yang ditampilkan per halaman. Dengan paginate(5) dan links(), aplikasi menampilkan navigasi halaman secara otomatis, sehingga data lebih rapi dan mudah dibaca.

Hasilnya, relasi dan pagination berjalan sesuai fungsinya, dan tampilan menjadi lebih terstruktur serta efisien

---

## 4. Kesimpulan

Modul ini memberikan pemahaman komprehensif tentang dua konsep fundamental dalam pengembangan aplikasi Laravel, yaitu Eloquent Relationship dan Pagination. Eloquent Relationship memungkinkan developer untuk mendefinisikan hubungan antar tabel database dengan cara yang intuitif dan mudah dipahami, tanpa harus menulis query SQL yang kompleks. Modul ini mencakup tiga jenis relationship utama: One-to-One (seperti hubungan user dan profile), One-to-Many (seperti hubungan category dan post), serta Many-to-Many (seperti hubungan students dan courses) yang memerlukan tabel pivot. Melalui praktikum yang disajikan, developer dapat mempelajari cara implementasi masing-masing relationship mulai dari pembuatan migrasi, model, seeder, controller, hingga view dengan antarmuka yang user-friendly menggunakan Bootstrap.

---

## 5. Referensi

- https://hackmd.io/@mohdrzu/r1RPvWaCxx#Praktikum-1---Eloquent-ORM-Relationships-One-to-One-One-to-Many-Many-to-Many
- chatgpt.

---
