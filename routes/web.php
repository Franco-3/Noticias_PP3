<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;

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

Route::middleware(['auth'])->group(function() {
    Route::resource('users', UserController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('noticias', NoticiaController::class);
});


Route::get('/', [NoticiaController::class, 'index'])->name('noticias.index');

Route::get('excel',[ ExcelController::class, 'edit']);
Route::get('download', [ExcelController::class, 'downloadFile']);

//Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
//Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
//Route::get('/noticias/{noticia}', [NoticiaController::class, 'show'])->name('noticias.show');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
