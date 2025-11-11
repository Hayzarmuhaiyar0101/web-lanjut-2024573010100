# Laporan Modul 6: Model dan Laravel Eloquent

**Mata Kuliah:** Workshop Web Lanjut  
**Nama:** Hayzar Muhaiyar
**NIM:** 2024573010100
**Kelas:** TI-2C

---

## Abstrak
Pada praktikum ini mahasiswa mempelajari konsep Model dalam framework Laravel serta penerapan Laravel Eloquent ORM untuk mengelola data secara efisien di dalam aplikasi web. Praktikum mencakup tiga bagian utama, yaitu penanganan request dan response pada view menggunakan model sederhana, validasi kustom dengan pesan error, serta implementasi multi-step form dengan penyimpanan data menggunakan session. Melalui kegiatan ini, mahasiswa memahami alur data dari form ke controller, model, hingga view dalam arsitektur MVC Laravel.

---

## 1. Dasar Teori

Laravel menggunakan arsitektur MVC (Model-View-Controller) untuk memisahkan logika bisnis, tampilan, dan pengelolaan data.
Beberapa konsep penting dalam modul ini antara lain:

- Model
Model adalah representasi data yang digunakan untuk berinteraksi dengan basis data atau untuk mengelola data sementara dari form. Dalam Laravel, model dapat berupa:

- POCO (Plain Old Class Object): Model sederhana tanpa database.
- Eloquent Model: Model yang terhubung dengan tabel di database.

- Eloquent ORM (Object Relational Mapping)
Eloquent menyediakan cara mudah untuk berinteraksi dengan database menggunakan sintaks PHP berorientasi objek.

Contohnya:
$users = User::all();
$todo = Todo::find(1);
$todo->delete();

- Request dan Response
Laravel menyediakan Request untuk menangkap input dari user dan Response untuk mengirimkan data atau tampilan kembali ke browser.

- Validation
Validasi berfungsi untuk memastikan data yang dikirimkan pengguna sesuai dengan aturan tertentu sebelum diproses atau disimpan.

- Session
Session digunakan untuk menyimpan data sementara antar halaman, seperti pada multi-step form.

---

## 2. Langkah-Langkah Praktikum

##Praktikum 1: Menggunakan Model Untuk Binding Form Dan Displayz

- Langkah 1: Buat dan Buka Proyek laravel
  laravel new model-app
  cd model-app
  code .

- Langkah 2: Membuat Model Data Sederhana (POCO)
Buat folder ViewModels di dalam direktori app untuk menyimpan kelas model kit:
mkdir app/ViewModels
Selanjutnya Buat ProductViewModel.php
Di dalam Direktori app/viewModels. kemudian isi dengan code berikut
  ![ProductViewModel](gambar/ProductViewModel.png)
  
- Langkah 3: Buat Controller
php artisan make:controller ProductController
Kemudian Edit Controller Tersebut:
  ![ProductController](gambar/ProductController.png)

- Langkah 4: Definisikan Rute
Edit Routes/Web.php
Isi Dengan Code Berikut
  ![Web.php1](gambar/Web.php1.png)

- Langkah 5: Buat Tampilan (Views) Dengan Boostrap 
Buat direktori product di dalam resources/views:
mkdir resources/views/product
Kemudian buat dua file: create.blade.php dan result.blade.php.

Berikut adalah konten dari masing-masing file:
![Create.blade1](Gambar/Create.blade.png)
![Result.blade1](Gambar/Result.blade.png)

- Jalankan Aplikasi Dengan cara :
Jalankan php artisan serve di terminal,
Kunjungi http://localhost:8000/product/create
Isi formulir dan kirim. Anda akan melihat hasilnya ditampilkan di halaman baru tanpa menyimpan ke database.
  ![Hasil Create](Gambar/HasilCreate.png)
  ![Hasil Result](Gambar/HasilResult.png)


## Praktikum 2: Menggunakan DTO (Data Transfer Object)

- Langkah 1: Buat Dan Buka Proyek Laravel
Ketik  Ini Di terminal
laravel new dto-app
cd dto-app
code .
      
- Langkah 2: Buat Kelas DTO
  Buat folder DTO di dalam app:
  mkdir app/DTO
  Kemudian Buat File app/DTO/ProductDTO.php:
  Dan isi dengan Code Berikut
  ![ProductDTO.php](Gambar/ProductDTO.png)  

- Langkah 3: Buat Service Layer
Buat folder Services di dalam app:
mkdir app/Services
Buat file app/Services/ProductService.php:
Kemudian isi dengan Code Berikut:
  ![ProductService.php](Gambar/ProductService.png)   

- Langkah 4: Buat Controller
Buat controller dengan perintah berikut:
php artisan make:controller ProductController
Kemudian Edit:
![ProductController.php](Gambar/ProductController2.png) 

- Langkah 5: Definisikan Rute
Isi Dengan Code Berikut ini:
![Web.php](Gambar/Web.php2.png) 

- Langkah 6: Buat Tampilan (Views) Dengan Boostrap
Buat Direktori Product di dalam resources/views:
mkdir resources/views/product
Setelah membuat direktori, buat dua file: create.blade.php dan result.blade.php.
Kemudian Isi Dengan Code Berikut
![Create.Blade.php](Gambar/CreateDTO.png) 
![Result.Blade.php](Gambar/ResultDTO.png)  

- Jalankan Dan uji Aplikasi
Setelah menyelesaikan langkah-langkah di atas, jalankan aplikasi dengan perintah berikut:
php artisan serve

Kunjungi: http://localhost:8000/product/create
Isi formulir → Submit → Lihat hasil yang diteruskan melalui DTO dan service
![HasilCreate](Gambar/HasilCreate2.png)
![HasilDTO](Gambar/HasilResult2.png)


##Praktikum 3: Membangun Aplikasi Web Todo Sederhana dengan Laravel 12, Eloquent ORM, dan MySQL

- Langkah 1: Buat Project Laravel baru
 laravel new todo-app-mysql
 cd todo-app-mysql
 code .

- Pastikan MySQL Berjalan Dan Buat Database:    
CREATE DATABASE tododb;

- Install dependency MySQL:
composer require doctrine/dbal

- Konfigurasi MySQL:
Edit file .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tododb
DB_USERNAME=<username database anda>
DB_PASSWORD=<password database anda jika ada>

Bersihkan Config:clear

- Langkah 2: Buat Migration Untuk Tabel Todos
Jalankan Perintah Migrasi:
php artisan make:migration create_todos_table
Buka file yang dihasilkan di database/migrations/YYYY_MM_DD_create_todos_table.php dan perbarui:
  ![Create_todos_table.php](Gambar/Create_todos.png) 
Jalankan artisan migrate

- Langkah 3:Buat Seeder Untuk Data Dummy
 Jalankan Perintah Ini Untuk membuat seeder:
 php artisan make:seeder TodoSeeder

  Isikan Kode Berikut
  ![TodoSeeder.php](Gambar/TodoSeeder.png)

  Jalankan Seeder Untuk Mengisi Database:
  php artisan db:seed --class=TodoSeeder

- Langkah 4: Buat Model Todo
Jalankan :
php artisan make:model Todo
Buka file yang dihasilkan di app/Models/Todo.php dan perbarui:
![Todo.php](Gambar/TodoApp.png)

Jalankan :
php artisan make:controller TodoController
buka app/Http/Controllers/TodoController.php dan perbarui:
![TodoController](Gambar/TodoController.png)

- Langkah 5: Definisikan Rute Web
  Edit routes/web.php
  ![Web.php](Gambar/Web.php3.png)

- Langkah 6: Buat Folder Layouts
Buat file di resources/view dan buat file resources/views/layouts/app.blade.php 
![app.blade.php](Gambar/app.blade3.png)
Kemudian di dalam views bikin file 
- Index.blade.php
- Create.blade.php
- edit.blade.php
- show.blade.php

isi dengan code berikut:
![index.blade.php](Gambar/index.blade3.png)
![create.blade.php](Gambar/create.blade3.png)
![edit.blade.php](Gambar/edit.blade3.png)
![show.blade.php](Gambar/show.blade3.png)

- langkah 7: Jalankan Dan Uji Aplikasi
jalankan Perintah :
php artisan serve
kemudian,kunjungi link http://127.0.0.1:8000

lakukan ujicoba berikut:
Klik Tambah Task Baru untuk membuat task baru
Klik Detail untuk melihat detail task
Klik Edit untuk memperbarui task
Klik Hapus untuk menghapus task
Klik Kembali ke Daftar untuk kembali ke daftar Todo

![Hasil](Gambar/Hasilindex3.png)
![Create](Gambar/HasilCreate3.png)
![edit](Gambar/HasilEdit3.png)
![show](Gambar/HasilDetail3.png)
![Delete](Gambar/HasilDelete3.png)

---

## 3. Hasil dan Pembahasan

Dari ketiga praktikum yang dilakukan, diperoleh hasil sebagai berikut:

Praktikum 1:
Sistem dapat menampilkan form input data dan menampilkan hasilnya di halaman baru menggunakan Request dan Response View. Tidak ada database yang digunakan karena model hanya berfungsi sebagai penampung data sementara.

Praktikum 2:
Aplikasi berhasil menerapkan validasi kustom menggunakan Form Request dan menampilkan pesan error di halaman view. Fitur ini penting agar data yang masuk ke sistem terjamin validitasnya.

Praktikum 3:
Implementasi multi-step form berjalan dengan baik. Setiap langkah form menyimpan data ke dalam session sehingga pengguna dapat mengisi data bertahap hingga proses selesai. Hasil akhirnya menampilkan ringkasan data yang sudah dimasukkan sebelumnya.

Secara keseluruhan, ketiga praktikum ini memperkuat pemahaman mahasiswa terhadap alur kerja MVC Laravel, pengelolaan data melalui model, serta penerapan Eloquent ORM dan session untuk kebutuhan aplikasi web yang dinamis.

---

## 4. Kesimpulan

Dari hasil praktikum dapat disimpulkan bahwa:
- Model berfungsi sebagai penghubung antara controller dan data, baik yang berasal dari form maupun database.
- Laravel Eloquent memudahkan proses interaksi dengan database menggunakan konsep ORM tanpa perlu menulis query SQL secara manual.
- Validasi data sangat penting untuk menjaga keakuratan input pengguna sebelum disimpan.
- Multi-step form dengan session memberikan pengalaman input data yang lebih terstruktur dan interaktif.
- Secara keseluruhan, penerapan Model dan Eloquent ORM di Laravel membantu pengembangan aplikasi web menjadi lebih efisien, terorganisir, dan mudah dikembangkan.

---

## 5. Referensi

- HackMD.io — Modul Laravel Model
- ChatGPT (chat.openai.com)
- Laravel Documentation — Validation
- SantriKoding — Validasi Data di Laravel

---
