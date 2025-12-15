# Laporan Modul 9: RESTful API Laravel

**Mata Kuliah:** Workshop Web Lanjut  
**Nama:** Hayzar Muhaiyar  
**NIM:** 2024573010100  
**Kelas:** TI-2C  

---

## Abstrak

RESTful API merupakan salah satu komponen penting dalam pengembangan aplikasi web modern yang berfungsi sebagai penghubung antara backend dan frontend. Pada Modul 9 ini dilakukan praktikum pembuatan RESTful API menggunakan framework Laravel 12. Praktikum mencakup proses instalasi Laravel, pembuatan model dan migration, validasi request, penggunaan API Resource, pembuatan controller, serta implementasi operasi CRUD (Create, Read, Update, Delete) pada data produk. Dengan praktikum ini, diharapkan mahasiswa dapat memahami konsep RESTful API serta penerapannya menggunakan Laravel.

---

## 1. Dasar Teori

RESTful API (Representational State Transfer Application Programming Interface) adalah arsitektur layanan web yang memanfaatkan protokol HTTP untuk pertukaran data antara client dan server. RESTful API menggunakan metode HTTP seperti GET, POST, PUT, dan DELETE untuk melakukan operasi CRUD.

Laravel adalah framework PHP yang menyediakan berbagai fitur untuk memudahkan pengembangan RESTful API, seperti routing API, Eloquent ORM, migration, request validation, controller, dan API Resource. Dengan fitur-fitur tersebut, pengembangan backend menjadi lebih terstruktur, aman, dan efisien.

---

## 2. Langkah-Langkah Praktikum

### Praktikum 1 – RESTful API

1. Langkah pertama adalah menginstal Laravel 12 menggunakan Composer dengan perintah:
```bash
composer create-project laravel/laravel laravel-rest-api
```

Jika proses diatas sudah selesai, lanjutkan dengan menjalankan perintah berikut ini:
```bash
laravel new laravel-api
```
Kemudian configurasi database di bagian .env
```bash
Di file .env harus tampak seperti ini:
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=authlab_db
    DB_USERNAME=<username database anda>
    DB_PASSWORD=<password database anda jika ada>
    dan jalankan `php artisan migrate` untuk membuat database dan table secara otomatis
```
-   Instalasi Laravel Breeze
    Jalankan perintah berikut untuk download breeze
    ```bash
    composer require laravel/breeze --dev
    ```
    - Kemudian jalankan untuk menginstall breeze ke dalam project
    ```
    php artisan breeze:install
    ```
    Selama proses instalasi, Anda akan diminta beberapa opsi:
    - Pilih frontend framework: Pilih api (wajib)
    Install dependency frontend:
    ```bash
    npm install
    npm run dev
    ```
 2. Membangun Model dan migratiom
 -  Jalankan perintah berikut untuk membuat model dan migrationya:
  ```bash
  php artisan make:model Product -m
  ```
  Ini akan membuat 2 file yaitu migration dan models

- Silakan buka file migration yang baru saja terbuat, kemudian pada function up ubah menjadi seperti dibawah ini:
```bash
public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }
```
Kode diatas berfungsi untuk membuat table dan column didalam database.

- Kolom timestamps() otomatis membuat kolom created_at dan updated_at. Sehingga kode migrasi kita secara keseluruhan akan terlihat seperti berikut ini:
```bash
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
```
Setelah itu jalankan perintah berikut
```bash
php artisan migrate
```

- Model 
Silakan buka file model yang sudah dibuat diawal tadi, file ini terletak didalam folder app/Models/ kemudian sesuaikan menjadi seperti dibawha ini:
```bash
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'stock'];
}
```
$fillable adalah daftar kolom yang boleh diisi secara massal dengan metode create() atau update(). Dengan ini, kita bisa langsung menyimpan data seperti berikut ini:
```bash
Product::create([
    'name' => 'Laptop',
    'price' => 15000000,
    'description' => 'Laptop gaming terbaru',
    'stock' => 10
]);
```
Model Product ini berfungsi sebagai perwakilan tabel products dalam database, mempermudah CRUD operations dan Laravel hanya akan menerima input untuk kolom yang ada dalam $fillable. Pada materi berikutnya, kita akan membuat validasi data input menggunakan ProductRequest

 3. Product Request

Form Request, yang merupakan subclass dari Illuminate\Foundation\Http\FormRequest memiliki fungsi yang digunakan untuk validasi data input agar sesuai aturan validasi untuk setiap field yang dikirim. Silakan jalankan perintah berikut untuk membuat ProductRequest.
```bash
php artisan make:request ProductRequest
```
Perintah diatas akan membuat  sebuah file dengan nama ProductRequest di direktori app/Http/Request

-  Kemudian ubah isi file tersebut dengan code seperti ini:
```bash
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ];
    }
}
```
Pada kode diatas terdapat class ProductRequest, class ini mewarisi dari FormRequest dan digunakan untuk validasi request saat menambahkan/memperbarui produk.

- Authorize
```bash
public function rules(): array
{
    return [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'stock' => 'required|integer|min:0',
    ];
}
```
Didalam method ini, bertujuan untuk menentukan apakah pengguna diizinkan untuk melakukan request ini. Jika true, maka request dapat diproses. Jika false, request akan diblokir. Method ini bisa kita manfaatkan untuk project yang lebih kompleks, misalnya hanya admin yang boleh membuat produk.

- Rules
```bash
public function rules(): array
{
    return [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'stock' => 'required|integer|min:0',
    ];
}
```
Pada Method ini berisi aturan validasi untuk setiap field, seperti aturan pada column name, wajib diisi type data string dan maksimal 255 karakter dst.

 4. Product Resource

JSON memiliki struktur yang sederhana dibandingkan format lain seperti XML, sehingga lebih cepat dalam pengiriman data melalui jaringan. Silakan jalankan perintah beriukut untuk membuat ProductResource.
```bash
php artisan make:resource ProductResource
```
Perintah diatas akan menghasilkan file yang terletak di App\Http\Resources\ProductResource.php 

- Kemudian ubah isi file tersebut dengan berikut:
```bash
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'stock' => $this->stock,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
```
- Product Collection 

Karena kita hendak menggukana fitur paginate, maka sebaiknya kita gunakan Resource Collection untuk menyertakan informasi paginasi. Silakan teman-teman jalnkan peritnah berikut:
```bash
php artisan make:resource ProductCollection
```
Perintah diatas membuatd sebuah file yang berada di direktori app/Http/Resources/ProductCollection.php

- kemudian buka file tersebut edit dengan code berikut:
```bash 
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'status' => true,
            'message' => 'Products retrieved successfully',
            'data' => $this->collection, 
            'meta' => [
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'per_page' => $this->perPage(),
                'total' => $this->total(),
            ],
        ];
    }
}
```
Dengan menggunakan collection seperti contoh diatas, maka response data product kurang lebih akan telihat seperti berikut ini:
```bash
{
    "status": true,
    "message": "Products retrieved successfully",
    "data": [
        {
            "id": 1,
            "name": "Laptop",
            "price": 12000000,
            "description": "Laptop gaming terbaru",
            "stock": 10,
            "created_at": "2024-03-03 12:00:00",
            "updated_at": "2024-03-03 12:00:00"
        },
        {
            "id": 2,
            "name": "Monitor",
            "price": 3000000,
            "description": "Monitor 27 inch",
            "stock": 5,
            "created_at": "2024-03-03 12:10:00",
            "updated_at": "2024-03-03 12:10:00"
        }
    ],
    "meta": {
        "current_page": 1,
        "last_page": 5,
        "per_page": 10,
        "total": 50
    }
}
```

5. Product Controller

Silakan jalankan perintah berikut ini untuk membuat Controller Product:
```bash
php artisan make:controller API\ProductController
```
Perintah diatas akan menghasilkna file baru yang terletak didalam: app/Http/Controllers/API/ProductController.php.

- Kemudian Buka file tersebut dan edit denga code berikut:
```bash
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return response()->json(new ProductCollection($products), Response::HTTP_OK);
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Product created successfully',
            'data' => new ProductResource($product),
        ], Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        return response()->json([
            'status' => true,
            'message' => 'Product retrieved successfully',
            'data' => new ProductResource($product)
        ], Response::HTTP_OK);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product),
        ], Response::HTTP_OK);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully',
        ], Response::HTTP_OK);
    }
}
```

6. Konfigurasi Route

Silakan buka file api.php, kemudian tambahkan rute berikut ini:
```bash
Route::apiResource('products', ProductController::class);
```
Sehingga  Secara keseluruhan akan seperti ini:
```bash
<?php
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('products', ProductController::class);
```

- index()

Fungsi ini bertujuan untuk mengambil produk dari database dan mengembalikannya dalam format JSON, adapun data yang diambil adalah data produk terbaru dengan pagination 10 item per halaman. Untuk melakukan uji coba hasilnya, teman-teman bisa melakukan ujicoba pada postman seperti pada gambar berikut ini:
- [Index](Gambar\)


























