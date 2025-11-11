# Laporan Modul 5: Model dan Laravel Eloquent

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

Praktikum 1: Menggunakan Model Untuk Binding Form Dan Displayz

- Langkah 1: Buat dan Buka Proyek laravel
  laravel new model-app
  cd model-app
  code .

- Langkah 2: Membuat Model Data Sederhana (POCO)
Buat folder ViewModels di dalam direktori app untuk menyimpan kelas model kit:
mkdir app/ViewModels
Selanjutnya Buat ProductViewModel.php
Di dalam Direktori app/viewModels. kemudian isi dengan code berikut
  ![ProductViewModel](gambar/FormController.png)
  
- Langkah 3: Buat Controller
php artisan make:controller ProductController
Kemudian Edit Controller Tersebut:
  ![ProductController](gambar/Form.blade.1.png)

- Langkah 4: Definisikan Rute
Edit Routes/Web.php
Isi Dengan Code Berikut
  ![Web.php1](gambar/Form.blade.1.png)

- Langkah 5: Buat Tampilan (Views) Dengan Boostrap 
Buat direktori product di dalam resources/views:
mkdir resources/views/product
Kemudian buat dua file: create.blade.php dan result.blade.php.

Berikut adalah konten dari masing-masing file:
![Tampilan 1](Gambar/Hasil.Result.1.png)
![Tampilan 2](Gambar/Hasil.Result.1.png)

- Jalankan Aplikasi Dengan cara :
Jalankan php artisan serve di terminal,
Kunjungi http://localhost:8000/product/create
Isi formulir dan kirim. Anda akan melihat hasilnya ditampilkan di halaman baru tanpa menyimpan ke database.
  ![Hasil Result](Gambar/Hasil.Result.1.png)


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
  ![ProductDTO.php](Gambar/RegisterController.png)  

- Langkah 3: Buat Service Layer
Buat folder Services di dalam app:
mkdir app/Services
Buat file app/Services/ProductService.php:
Kemudian isi dengan Code Berikut:
  ![ProductService.php](Gambar/Register.Blade.png)   

- Langkah 4: Buat Controller
Buat controller dengan perintah berikut:
php artisan make:controller ProductController
Kemudian Edit:
![ProductController.php](Gambar/Register.Blade.png) 

- Langkah 5: Definisikan Rute
Isi Dengan Code Berikut ini:
![Web.php](Gambar/Register.Blade.png) 

- Langkah 6: Buat Tampilan (Views) Dengan Boostrap
Buat Direktori Product di dalam resources/views:
mkdir resources/views/product
Setelah membuat direktori, buat dua file: create.blade.php dan result.blade.php.
Kemudian Isi Dengan Code Berikut
![Create.Blade.php](Gambar/Register.Blade.png) 
![Result.Blade.php](Gambar/Register.Blade.png)  

- Jalankan Dan uji Aplikasi
Setelah menyelesaikan langkah-langkah di atas, jalankan aplikasi dengan perintah berikut:
php artisan serve

Kunjungi: http://localhost:8000/product/create
Isi formulir → Submit → Lihat hasil yang diteruskan melalui DTO dan service


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
  ![Create_todos_table.php](Gambar/app.blade.3.png) 
Jalankan artisan migrate

- Langkah 3:Buat Seeder Untuk
  Buka File routes/web.php dan definisikan routes untuk setiap langkah form:  
  Isikan Kode Berikut
  ![Web.php](Gambar/web.php.3.png.png)       
    
- Langkah 4: Buat Controller 
  Jalankan Perintah ini di dalam terminal:
  php artisan make:controller MultiStepFormController
  Kemudian Isi dengan code berikut
  ![MultiController](Gambar/MultiStepController.png)

- Langkah 5: Buat view untuk Setiap Step
  Buat direktori resources/views/multistep
- Step 1 - Informasi Pribadi
  resources/views/multistep/step1.blade.php
  Dan Isi dengan Code Berikut:
  ![Step1.blade.php](Gambar/step1.blade.php)
- Step 2 - Informasi Pendidikan:
  resources/views/multistep/step2.blade.php
  Dan Isi dengan Code Berikut:
  ![Step2.blade.php](Gambar/step2.blade.php)
- Step 3 - Pengalaman Kerja:
  resources/views/multistep/step3.blade.php
  Dan Isi dengan Code Berikut:
  ![Step3.blade.php](Gambar/step3.blade.php)
  
  Summary - Ringkasan:
  resources/views/multistep/summary.blade.php
  Dan Isi dengan Code Berikut:
  ![Summary.blade.php](Gambar/summary.blade.png)

  Complete - Selesai:
  resources/views/multistep/complete.blade.php
  Dan Isi dengan Code Berikut:
  ![complete.blade.php](Gambar/complete.png)

- Langkah 6: Jalankan Aplikasi
Setelah Menyelesaikan Langkah - langkah di 👆
Jalankan php artisan serve di terminal Dan
Kunjungi http://localhost:8000/multistep dan ikuti langkah-langkah form:

Step 1: Isi informasi pribadi (nama, email, telepon, alamat)
Step 2: Isi informasi pendidikan (tingkat pendidikan, institusi, tahun lulus, jurusan)
Step 3: Isi pengalaman kerja (pekerjaan saat ini, perusahaan, pengalaman, keahlian)
Summary: Lihat ringkasan data dan konfirmasi
Complete: Tampilan sukses
![Step1](Gambar/HasilStep1.png)
![Step2](Gambar/HasilStep2.png)
![Step3](Gambar/HasilStep3.png)
![Summary](Gambar/HasilStep4.png)
![Complete](Gambar/HasilComplete.png)

---

## 3. Hasil dan Pembahasan


---

## 4. Kesimpulan


---

## 5. Referensi
- https://hackmd.io/@mohdrzu/HJWzYp7Reg
- Chatgpt.com
- Laravel Documentation — https://laravel.com/docs/12.x/validation
- SantriKoding — Belajar Laravel: Validasi Data di Laravel — https://santrikoding.com/

---
