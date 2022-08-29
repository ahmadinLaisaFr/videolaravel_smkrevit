<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::post('/insert_kategori', [HomeController::class, 'insert'])->name('insert.data');
Route::get('/insert_kategori/{category:slug}', [HomeController::class, 'populate'])->name('populate.data');
Route::post('/delete_kategori/{slug}', [HomeController::class, 'delete'])->name('delete.data');

Route::get('/login', function () {
    $mydata = [];
    $mydata['title'] = 'login page';
    return view('admin.login', $mydata);
});
