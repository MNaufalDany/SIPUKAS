<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create', function () {
    return view('create');
});
Route::get('/history', function () {
    return view('pembayaran.history');
});
// Route::get('/edit', function () {
//     return view('update');
// });

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::post('/store', [SiswaController::class, 'store'])->name('store');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('edit');
Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [SiswaController::class, 'destroy'])->name('destroy');



Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
Route::post('/pembayaran/store', [PembayaranController::class, 'store']);
Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
Route::put('/pembayaran/{id}/update', [PembayaranController::class, 'update'])->name('pembayaran.update');
Route::delete('/pembayaran/{id}/destroy', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
Route::get('/pembayaran/{id_siswa}/history', [PembayaranController::class, 'history'])->name('pembayaran.history');
