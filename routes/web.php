<?php

use App\Models\Produk;
use App\Models\profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ukuranController;
use App\Http\Controllers\Admin\profileController;

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
    $reqCari = '';
    $profile =profile::find(1);
    $data1 = Produk::all();
    return view('welcome', compact('reqCari', 'profile', 'data1'));
});
Route::get('produk/jenis', [ProdukController::class, 'cariJenis'])->name('Cari-Jenis');
Route::get('chat/{id}', [ProdukController::class, 'whatsapp'])->name('whatsapp');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::group(['prefix'=> 'admin'], function(){
    Route::resource('posts', PostsController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('ukuran', ukuranController::class);
    Route::resource('team', TeamController::class);
    Route::resource('profile', profileController::class);

});
