<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post("access", [LoginController::class, "login"])->name("access.web");
Route::post("logout", [LoginController::class, "logout"])->name("logout");

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/home', [EmpleadosController::class, 'index'])->name('home');
    Route::resource('home', EmpleadosController::class);
});


Route::get('nosotros', function () {
    return view('nosotros');
});
Route::get('contacto', function () {
    return view('contacto');
});
Route::get('nosotros', function () {
    return view('nosotros');
});
Route::get('catalogo', function () {
    return view('catalogo');
});
