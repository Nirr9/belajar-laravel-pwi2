<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    return view('pages.about', [
        'nama'  => 'Muhammad Fazrin Bastari',       // ganti dengan nama Anda
        'kelas' => '02',      // ganti dengan kelas Anda
        'nim'   => '707082400127',        // ganti dengan NIM Anda
    ]);
});

Route::view('/contact', 'pages.contact');

// satu controller bisa memiliki beberapa method (perintah)
// untuk menampilkan data dari database
Route::get('/product', [ProductController::class, 'index']);

// menampilkan halaman form insert data (wajib di atas /product/{id})
Route::get('/product/addProduct', [ProductController::class, 'addProduct']);

// memasukkan data dari form yang diisikan ke dalam database
Route::post('/product', [ProductController::class, 'store']);

// menampilkan detail data produk berdasarkan id tertentu
Route::get('/product/{id}', [ProductController::class, 'show']);

// menampilkan halaman form untuk mengubah data
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);

// menyimpan data yang sudah diubah pada form edit data
Route::put('/product/{id}', [ProductController::class, 'update']);

// menghapus data berdasarkan id yang dipilih
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

// routing resource controller untuk kategori produk
Route::resource('/category', CategoryController::class);