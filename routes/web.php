<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Empleadoscontroller;

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

Route::get('nosotros', function () {
    return view('nosotros');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('home', EmpleadosController::class);


Route::get('contacto', function () {
    return view('contacto');
});

Route::get('nosotros', function () {
    return view('nosotros');
});

Route::get('catalogo', function () {
    return view('catalogo');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
