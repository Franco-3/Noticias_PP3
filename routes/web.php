<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/', [NoticiaController::class, 'index'])->name('noticias.index');
Route::resource('noticias', NoticiaController::class);
Route::resource('categorias', CategoriaController::class);
//Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
//Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
//Route::get('/noticias/{noticia}', [NoticiaController::class, 'show'])->name('noticias.show');
