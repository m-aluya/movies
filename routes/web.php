<?php

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
Route::get('/',[\App\Http\Controllers\Movies\HomeController::class, 'index'])->name('home');
Route::get('/add',[\App\Http\Controllers\Movies\HomeController::class, 'create'])->name('add');
Route::post('/add',[\App\Http\Controllers\Movies\HomeController::class, 'store'])->name('add.post');
Route::get('/rate/{id}',[\App\Http\Controllers\Movies\HomeController::class, 'rate'])->name('rate');
Route::post('/rate/{id}',[\App\Http\Controllers\Movies\HomeController::class, 'rated'])->name('rate.post');

Route::get('/show/{id}',[\App\Http\Controllers\Movies\HomeController::class, 'show'])->name('show');
Route::get('/delete/{id}',[\App\Http\Controllers\Movies\HomeController::class, 'destroy'])->name('delete');


Route::get('/dashboard',[\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
Route::get('/dashboard/show/{id}',[\App\Http\Controllers\Admin\AdminController::class, 'show'])->name('admin.show');