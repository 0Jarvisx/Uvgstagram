<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

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

//Ruteo normal
Route::get('/', function () {
    return view('principal');
});

// Ruteo con sintaxis Closure

// Ruteo con sintaxis de Controlador
Route::get('/register',[RegisterController::class, 'index']) ->name('register');
Route::post('/register',[RegisterController::class, 'store']) ->name('register');


/* Autenticacion */
Route::post('/logout',[LogoutController::class, 'store']) ->name('logout');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']) ->name('login');

// Ruteo por Route Model Binding
Route::get('/{user:username}', [PostController::class, 'index']) ->name('posts.index');


// Ruteo para Resources


//Ruteo para publicaciones
Route::get('/posts/create', [PostController::class, 'create'])-> name('posts.create');

//Ruteo inicio
Route::get('/posts/feed/{user:username}', [PostController::class, 'inicio'])->name('posts.inicio');

//Ruteo para crear nueva publicacion
Route::post('/posts', [PostController::class, 'store'])-> name('posts.store');

//Ruteo para subir imagen
Route::post('/imagenes', [ImagenController::class, 'store'])-> name('imagenes.store');

//ver publicacion
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])-> name('posts.show');

//Agregar comentarios
Route::post('/{user:username}/posts/{post}',[ComentarioController::class, 'store'])->name('comentarios.store');

//Eliminar Publicaciones
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');