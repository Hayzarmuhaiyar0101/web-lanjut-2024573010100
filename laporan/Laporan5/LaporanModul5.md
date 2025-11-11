# Laporan Modul 5: Form Submission & Data Validation

**Mata Kuliah:** Workshop Web Lanjut  
**Nama:** Hayzar Muhaiyar
**NIM:** 2024573010100
**Kelas:** TI-2C

---

## Abstrak

Pada praktikum ini, mahasiswa mempelajari proses pengiriman data melalui form (Form Submission) dan penerapan validasi data (Data Validation) pada framework Laravel. Form submission digunakan untuk mengirimkan data dari pengguna ke server menggunakan metode HTTP seperti POST, sedangkan validasi data berfungsi untuk memastikan data yang dikirim memenuhi aturan tertentu sebelum disimpan ke dalam database. Laravel menyediakan fitur validasi yang efisien melalui method bawaan seperti $request->validate() maupun penggunaan Form Request Class. Dengan penerapan kedua konsep ini, aplikasi web menjadi lebih aman, terstruktur, dan mampu mencegah kesalahan input data dari pengguna.

---

## 1. Dasar Teori

1. Form Submission
Form submission adalah proses pengiriman data dari pengguna melalui form HTML ke server untuk diproses. Dalam Laravel, form digunakan untuk mengirimkan data menggunakan metode HTTP seperti POST atau GET.
Laravel menyediakan fitur CSRF (Cross-Site Request Forgery) protection yang memastikan keamanan data form dengan menggunakan @csrf token di setiap form. Data yang dikirimkan dari form akan diterima oleh controller untuk diolah, disimpan ke database, atau ditampilkan kembali sesuai kebutuhan aplikasi.
 
 Contoh : <form action="{{ route('user.store') }}" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Masukkan Nama">
    <button type="submit">Simpan</button>
</form>

2. Data Validation
Data validation adalah proses pemeriksaan data yang dikirim pengguna agar sesuai dengan aturan atau format yang telah ditentukan. Validasi penting untuk menjaga keamanan, konsistensi, dan integritas data dalam aplikasi.

3. Form Request Validation
Selain menggunakan validasi langsung di controller, Laravel juga menyediakan cara yang lebih terstruktur melalui Form Request Validation.

Dengan menggunakan perintah:
php artisan make:request StoreUserRequest

Pengembang dapat memisahkan logika validasi dari controller, sehingga kode menjadi lebih rapi dan mudah dikelola.

4. Keamanan Form (CSRF Protection)
Laravel secara otomatis melindungi setiap form dari serangan Cross-Site Request Forgery (CSRF). Setiap form wajib menyertakan token @csrf agar server dapat memverifikasi bahwa permintaan berasal dari sumber yang sah.

---

## 2. Langkah-Langkah Praktikum

Praktikum 1: Menangani Request Dan Response View Di laravel 12

- Langkah 1: Buat dan Buka Proyek laravel
  laravel new form-app
  cd form-app
  code .

- Langkah 2: Setup Routes
  Buka Routes/Web.php Dan isi dengan code berikut
  ![Web.php](Gambar/Web.php1.png)

- Langkah 3: Buat Controller
  Jalankan Perintah Berikut Di terminal:
  php artisan make:controller FormController
  Isi Dengan Code Berikut
  ![FormController](gambar/FormController.png)

- Langkah 4: Buat View Form
  Buat File Baru di Direktori resources/views/form.blade.php:
  Isi Dengan Code Berikut
  ![Form.blade.php](gambar/Form.blade.1.png)

- Langkah 5: Buat View Hasil
  Pada Direktori resources/view buat file bernama Result.blade.php
  ![result.blade.php](Gambar/Result.blade.1.png)

- Jalankan Aplikasi Dengan cara :
  Jalankan php artisan serve di terminal,
  Kemudian Kunjungi: http://localhost:8000/form dan test formnya.
  Hasil Form
  ![Hasil Form](Gambar/Hasil.Form.1.png)
  Hasil Result
  ![Hasil Result](Gambar/Hasil.Result.1.png)

Praktikum 2: Validasi Kustom dan Pesan Error di Laravel 12

- Langkah 1: Tambahkan route baru
  Buka routes/web.php dan tambahkan:
  ![Web.php](Gambar/Web.php1.png)      

- Langkah 2: Buat Sebuah Controller Baru
  Jalankan Ini di terminal:
  php artisan make:controller RegisterController
  Kemudian Isi dengan Code Berikut:
  ![RegisterController.php](Gambar/RegisterController.png)  


- Langkah 3: Buat Blade View
  Buat file view Di direktori resources/views/Register.blade.php:
  Kemudian Isi Dengan Code Berikut:
  ![Register.blade.php](Gambar/Register.Blade.png)   

- Langkah 4: Jalankan Aplikasi
  Jalankan Server Pengembangan Dengan jalankan ini di terminal:
  php artisan serve  

  Akses aplikasi di:
  http://127.0.0.1:8000/register untuk test form. 
  ![Hasil](Gambar/Hasil.Register.2.png)

Praktikum 3: Multi-Step Form Submission dengan Session Data

- Langkah 1: Buat Project Laravel baru
  laravel new multistep-form-app
  cd multistep-form-app
  code .

- Langkah 2: Buat Layout Dasar
  Buka Direktori resources/view/layouts Bikin file bernama app.blade.php Kemudian isi dengan code berikut:
  ![app.blade.php](Gambar/app.blade.3.png)      

- Langkah 3:Buat Routes
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

Dari praktikum ini diperoleh hasil bahwa proses form submission di Laravel dapat berjalan dengan baik menggunakan metode POST dan ditangani oleh controller untuk menampilkan data ke view.
Penerapan validasi data berhasil mencegah input yang tidak sesuai dengan aturan, serta menampilkan pesan error secara otomatis di halaman form.
Pada percobaan multi-step form, data berhasil disimpan antar langkah menggunakan session, dan ditampilkan kembali pada halaman ringkasan sebelum dikirim.
Secara keseluruhan, praktikum ini menunjukkan bahwa Laravel menyediakan fitur lengkap untuk menangani form, validasi, dan keamanan data dengan efisien.

---

## 4. Kesimpulan
Dari praktikum Modul 5: Form Submission & Data Validation, dapat disimpulkan bahwa proses pengiriman data melalui form dan validasi merupakan bagian penting dalam pembuatan aplikasi web berbasis Laravel.
Melalui praktikum ini, mahasiswa memahami bagaimana:
- Membuat form HTML yang terhubung dengan route dan controller pada Laravel.
- Menggunakan metode HTTP seperti POST untuk mengirimkan data ke server.
- Menerapkan validasi data menggunakan $request->validate() agar data yang diterima sesuai dengan aturan yang ditentukan.
- Menggunakan Form Request Validation untuk memisahkan logika validasi dari controller sehingga kode menjadi lebih bersih dan     mudah dikelola.
- Memanfaatkan CSRF Protection guna menjaga keamanan form dari serangan berbahaya.
- Menerapkan multi-step form dengan session untuk mengelola data dari beberapa tahap input pengguna.

Dengan penerapan konsep-konsep tersebut, aplikasi web menjadi lebih aman, terstruktur, user-friendly, dan efisien dalam memproses data dari pengguna.

---

## 5. Referensi
- https://hackmd.io/@mohdrzu/HJWzYp7Reg
- Chatgpt.com
- Laravel Documentation — https://laravel.com/docs/12.x/validation
- SantriKoding — Belajar Laravel: Validasi Data di Laravel — https://santrikoding.com/

---
