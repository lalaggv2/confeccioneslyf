<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post("access", [LoginController::class, "login"])->name("access.web");
Route::post("logout", [LoginController::class, "logout"])->name("logout");

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
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
