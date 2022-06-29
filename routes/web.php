<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryUserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\listingController;
use App\Http\Controllers\ListPembelianController;
use App\Http\Controllers\MenuUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\TransactionAccepController;
use App\Http\Controllers\UploadFileContrroller;
use App\Http\Controllers\ViewProductme;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ViewProduct;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PenggunaController::class, 'index']);

// auth roth for both
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// for admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard/viewproductme', [DashboardController::class, 'viewproduct'])->name('dashboard.viewproductme');
    Route::get('/laporanpenjualan/pdf', [LaporanController::class, 'generate']);
    Route::resource('productlistme', ProductController::class);
    Route::resource('viewproductlistme', ViewProductme::class);
    Route::resource('viewtransaction', ListPembelianController::class);
    Route::resource('laporan', LaporanController::class);
});

// for users
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/myprofile', [MenuUserController::class, 'myprofile'])->name('dashboard.myprofile');
    Route::get('/dashboard/viewproduct', [DashboardController::class, 'viewproduct'])->name('dashboard.viewproduct');
    Route::get('/dashboard/historytransaction', [MenuUserController::class, 'history'])->name('dashboard.history');
    Route::resource('viewproductlist', ViewProduct::class);
    Route::resource('listbuy', listingController::class);
    Route::resource('productlist', ProductListController::class);
    Route::resource('uploadbukti', UploadFileContrroller::class);
    Route::resource('transactionaccep', TransactionAccepController::class);
    Route::resource('historyuser', HistoryUserController::class);
});


require __DIR__ . '/auth.php';

