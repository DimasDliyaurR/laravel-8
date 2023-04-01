<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserStokController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth','Admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::controller(StokController::class)->group(function () {
        Route::get('/gudang_stok', 'index')->name('table');
        Route::get('/form_insert', 'form_insert')->name('form_insert');
        Route::post('/insert_data', 'insert_data')->name('insert_data');
        Route::get('/search', 'search')->name('search');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::post('/update', 'update')->name('update');
    });
});  

Route::middleware(['auth','User'])->group(function(){
    Route::controller(UserStokController::class)->group(function(){
        Route::get('/home', 'index')->name('table');
    });
});
