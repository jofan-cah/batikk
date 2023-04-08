<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function () {
	Route::get('register', 'register')->name('register');
	Route::post('register', 'registerSimpan')->name('register.simpan');

	Route::get('login', 'login')->name('login');
	Route::post('login', 'loginAksi')->name('login.aksi');

	Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/', function () {
	return view('welcome');
});


Route::middleware(['auth', 'cekUserLogin:Admin'])->group(function () {
	Route::controller(UsersController::class)->prefix('users')->group(function () {
		Route::get('', 'index')->name('users');
		Route::get('tambah', 'tambah')->name('users.tambah');
		Route::post('tambah', 'simpan')->name('users.tambah.simpan');
		Route::get('edit/{id}', 'edit')->name('users.edit');
		Route::post('edit/{id}', 'update')->name('users.tambah.update');
		Route::get('hapus/{id}', 'hapus')->name('users.hapus');
	});
});


Route::middleware('auth')->group(function () {

	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');
	Route::controller(StockController::class)->prefix('stock')->group(function () {
		Route::get('', 'index')->name('stock');
		Route::get('tambah', 'tambah')->name('stock.tambah');
		Route::post('tambah', 'simpan')->name('stock.tambah.simpan');
		Route::get('edit/{id}', 'edit')->name('stock.edit');
		Route::post('edit/{id}', 'update')->name('stock.tambah.update');
		Route::get('hapus/{id}', 'hapus')->name('stock.hapus');
	});

	Route::controller(BarangController::class)->prefix('barang')->group(function () {
		Route::get('', 'index')->name('barang');
		Route::get('tambah', 'tambah')->name('barang.tambah');
		Route::post('tambah', 'simpan')->name('barang.tambah.simpan');
		Route::post('cari', 'cari')->name('barang.cari');
		Route::get('edit/{id}', 'edit')->name('barang.edit');
		Route::post('edit/{id}', 'update')->name('barang.tambah.update');
		Route::get('hapus/{id}', 'hapus')->name('barang.hapus');
	});

	Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
		Route::get('', 'index')->name('kategori');
		Route::get('tambah', 'tambah')->name('kategori.tambah');
		Route::post('tambah', 'simpan')->name('kategori.tambah.simpan');
		Route::get('edit/{id_harga}', 'edit')->name('kategori.edit');
		Route::post('edit/{id_harga}', 'update')->name('kategori.tambah.update');
		Route::get('hapus/{id_harga}', 'hapus')->name('kategori.hapus');
	});
});
