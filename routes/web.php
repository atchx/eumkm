<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\KabkotController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route untuk menu utama
Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/usaha', [StoreController::class, 'show']);
Route::get('/kontak', function () {
    return view('kontak');
});

// Route untuk menu selengkapnya
Route::get('/stores', [StoreController::class, 'unitusaha']);
Route::get('/stores/{id}', 'App\Http\Controllers\StoreController@view');
Route::get('/products', [ProductController::class, 'produk']);
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@view');

// Route untuk dashboard
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/usahas', UsahaController::class)->middleware('auth');
Route::resource('/dashboard/produks', ProdukController::class)->middleware('auth');

Route::resource('/dashboard/provinsis', ProvinsiController::class)->middleware('auth');
Route::resource('/dashboard/kabkots', KabkotController::class)->middleware('auth');
Route::resource('/dashboard/kecamatans', KecamatanController::class)->middleware('auth');
Route::resource('/dashboard/desas', DesaController::class)->middleware('auth');

Route::resource('/dashboard/users', UserController::class)->middleware('auth');

#symlink image di hosting
Route::get('/linkstorage', function () { $targetFolder = base_path().'/storage/app/public'; $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage'; symlink($targetFolder, $linkFolder); });
Route::get('/linkstorageu', function () { $targetFolder = base_path().'/storage/app/public/gambar-usahas'; $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/gambar-usahas'; symlink($targetFolder, $linkFolder); });
Route::get('/linkstoragep', function () { $targetFolder = base_path().'/storage/app/public/gambar-produks'; $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/gambar-produks'; symlink($targetFolder, $linkFolder); });