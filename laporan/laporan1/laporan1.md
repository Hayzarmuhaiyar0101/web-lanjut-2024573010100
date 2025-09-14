# Laporan Modul 1: Perkenalan Laravel
**Mata Kuliah:** Workshop Web Lanjut   
**Nama:** Hayzar Muhaiyar 
**NIM:** 2024573010100
**Kelas:** TI-2C

---

## Abstrak 
Tuliskan ringkasan singkat tentang isi laporan ini dan tujuan Anda membuat laporan.
Laporan ini membahas framework Laravel sebagai salah satu framework PHP modern yang menggunakan arsitektur MVC (Model-View-Controller). Tujuan dari laporan ini adalah untuk memperkenalkan konsep dasar Laravel, komponen utamanya, struktur folder proyek, serta kelebihan dan tantangan dalam penggunaannya. Dengan memahami hal ini, mahasiswa dan pelajar diharapkan dapat lebih mudah dalam membangun aplikasi web yang terstruktur, efisien, dan aman.

---

## 1. Pendahuluan
- Tuliskan teori perkenalan tentang laravel
Laravel adalah framework aplikasi web yang dirancang untuk mempermudah proses pengembangan web. Dengan starter kit yang lengkap, framework ini mudah digunakan, bahkan untuk pemula.
Meskipun pada dasarnya Laravel adalah framework back-end, Anda bisa menggunakannya untuk pengembangan full-stack dalam PHP, membuat sistem front-end React atau Vue, dan sebagai API back-end.

- Apa itu Laravel?
Laravel adalah framework berbasis PHP yang menggunakan konsep MVC (Model-View-Controller). MVC ini membantu memisahkan antara logika bisnis (Model), tampilan (View), dan alur kontrol (Controller), sehingga kode lebih mudah dipahami, dikelola, dan dikembangkan.
- Karakteristik utama (MVC, opinionated, dsb.)
Arsitektur MVC → memisahkan logika, tampilan, dan kontrol.
Routing yang sederhana → mempermudah pengaturan URL aplikasi.
Blade Template Engine → sistem template bawaan Laravel untuk mengelola tampilan.
Eloquent ORM → memudahkan interaksi dengan database tanpa query SQL yang rumit.
Migration & Seeder → membantu mengatur dan mengelola struktur database.
Fitur keamanan bawaan → seperti proteksi CSRF, enkripsi password, dll.
- Untuk jenis aplikasi apa Laravel cocok?
Website sederhana (misalnya company profile).
Aplikasi berskala menengah (blog, sistem manajemen, e-commerce).
Aplikasi skala besar yang butuh keamanan, performa, dan banyak user (marketplace, sistem akademik, manajemen tiket, dll).

---

## 2. Komponen Utama Laravel (ringkas)
Tuliskan penjelasan singkat (1–3 kalimat) untuk tiap komponen berikut:
- Blade (templating)
Blade adalah template engine bawaan Laravel yang digunakan untuk membuat tampilan (View) dengan sintaks sederhana. Blade mendukung pewarisan layout dan penggunaan komponen, sehingga kode HTML jadi lebih rapi dan mudah dipelihara.
- Eloquent (ORM)
Eloquent adalah Object Relational Mapper (ORM) Laravel yang memudahkan interaksi dengan database menggunakan model berbasis PHP, tanpa harus menulis query SQL secara manual. Setiap tabel di database biasanya direpresentasikan dengan sebuah model.
- Routing
Routing di Laravel mengatur bagaimana aplikasi merespon sebuah request (URL) dari user. Dengan routing, kita bisa menentukan URL tertentu harus diarahkan ke fungsi atau controller mana.
- Controllers
Controller berfungsi sebagai penghubung antara Model dan View. Di sinilah logika aplikasi ditempatkan, sehingga kode lebih terorganisir dan terpisah dari tampilan.
- Migrations & Seeders
Migration digunakan untuk mengatur struktur database (membuat tabel, kolom, dll) secara version control. Seeder digunakan untuk mengisi data awal ke dalam tabel, misalnya data dummy atau data default aplikasi.
- Artisan CLI
Artisan adalah command line interface bawaan Laravel yang menyediakan berbagai perintah untuk mempercepat pengembangan, seperti membuat controller, model, migration, hingga menjalankan server lokal.
- Testing (PHPUnit)
laravel mendukung testing dengan PHPUnit untuk memastikan fitur atau fungsi dalam aplikasi berjalan sesuai harapan. Testing ini membantu mencegah bug saat aplikasi dikembangkan lebih lanjut.

---

## 3. Berikan penjelasan untuk setiap folder dan files yang ada didalam struktur sebuah project laravel.

Berikut ini adalah Folder-Folder yang ada di laravel

1.**App**
Folder app berisi kode-kode inti dari aplikasi seperti Model, Controller, Commands, Listener, Events, dll. Poinnya, hampir semua class 
dari aplikasi berada di folder ini.

2.**Bootstrap**
folder bootstrap berisi file app.php yang dimana akan dipakai oleh Laravel untuk boot setiap kali dijalankan.

3.**Config**
Folder config seperti namanya, berisi semua file konfigurasi aplikasi Anda.

4.**Database**
Folder database berisi database migrations, model factories, dan seeds. Folder ini akan bertanggung jawab dengan pembuatan dan pengisian tabel-tabel database.

5.**public**
Folder public memiliki file index.php yaitu entry point dari semua requests yang masuk/diterima ke aplikasi. Folder ini juga tempat menampung gambar, Javascript, dan CSS.

6.**Resources**
Folder resources berisi semua route yang disediakan aplikasi. Sebagai default, beberapa file routing akan tersedia seperti: web.php, api.php, console.php, dan channels.php. Folder ini adalah tempat dimana kita memberikan koleksi definisi route aplikasi.

7.**Storage**
Folder storage adalah tempat dimana cache, logs, dan file sistem yang ter-compile hidup.

8.**Tests**
Folder tests adalah tempat dimana unit dan integration tests tinggal.

9.**Vendor**
Folder vendor adalah dimana tempat folder-folder dependencies third-party yang telah di-install oleh composer berada.

Berikut adalah file-file yang tersedia secara default:

10.**Editorconfig**
.Berguna untuk memberi IDE/text editor instruksi tentang standar coding Laravel seperti whitespace, besar identasi, dll.

11.**.env dan .env.example**
Tempat dimana variable environment aplikasi ditempatkan (variabel yang diekspektasikan akan berbeda di setiap sistem) seperti nama 
database, username database, password database. 

12.**.gitignore dan .gitattributes**
File konfigurasi git.

13.**artisan**
Memungkinkan anda untuk menjalankan perintah artisan dari command line.

14.**composer.json dan composer.lock**
File konfigurasi untuk composer. File ini adalah informasi dasar tentang projek dan juga mendefinisikan dependencies yang digunakan.

15.**package.json**
Mirip-mirip dengan composer.json tapi untuk aset-aset dan dependencies front-end.

16.**phpunit.xml**
Sebuah file konfigurasi untuk PHPUnit, tools yang digunakan Laravel untuk testing.

17.**readme.md**
Sebuah markdown file yang memberikan pengenalan dasar tentang Laravel.

18.**server.php**
Server cadangan yang mencoba untuk tetap menjalankan aplikasi Laravel kepada server yang kurang mampu.

19.**webpack.mix.js**
 Konfigurasi file untuk Mix (opsional). File ini adalah untuk membangun arahan system soal bagaimana meng-compile


---

## 4. Diagram MVC dan Cara kerjanya

![Berikut adalah Gambar dari diagram MVC Dan Cara kerjanya](gambar/Diagram.webp)

---

## 6. Kelebihan & Kekurangan (refleksi singkat)
- Kelebihan Laravel menurut Anda
Salah satu kelebihan dari Laravel adalah kemudahan belajar. Bagi developer pemula, Laravel menyediakan dokumentasi yang lengkap dan komunitas yang aktif sehingga sangat membantu dalam mempelajari framework ini. Selain itu, Laravel juga memiliki struktur yang terorganisir, sehingga memudahkan dalam menangani kode proyek yang besar dan kompleks.

- Hal yang mungkin menjadi tantangan bagi pemula
Memahami Struktur Folder yang begitu banyak mungkin sebagian pemula akan pusing melihat folder sebanyak itu

---

## 7. Referensi
https://duamasatech.com/kelebihan-dan-kekurangan-laravel

https://chatgpt.com/

https://www.barajacoding.or.id/mengenal-struktur-folder-dan-file-pada-laravel/

---
