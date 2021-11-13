<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;
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


//Route::resource('objeto','controller');
// Route::resource('noticias', NoticiaController::class);

//A rota acima susbstitui as 6 rotas criadas
// Route::get('noticias/create', [NoticiaController::class, 'create']);
// Route::post('noticias', [NoticiaController::class, 'store']);
// Route::get('noticias', [NoticiaController::class, 'index']);
// Route::get('noticias/{noticia}/edit', [NoticiaController::class, 'edit']);
// Route::put('noticias/{noticia}', [NoticiaController::class, 'update']);
// Route::delete('noticias/{noticia}', [NoticiaController::class, 'delete']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect('/home');
});

Route::middleware('auth')->group(function() {
    Route::resource('noticias', NoticiaController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
