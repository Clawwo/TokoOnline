<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;



Route::get('/produk', [ProdukController::class, 'tampil_produk'])->name('tampilProduk');
Route::delete('/produk/hapus', [ProdukController::class, 'hapusProduk'])->name('hapusProduk');
