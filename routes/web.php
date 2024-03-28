<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Models\Raw_material;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post("access", [LoginController::class, "login"])->name("access.web");
Route::post("logout", [LoginController::class, "logout"])->name("logout");

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employees');
        Route::get('/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
    });
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers');
        Route::get('/{customer}', [CustomerController::class, 'show'])->name('customers.show');
        Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
    });
});
Route::prefix('raw_material')->group(function () {
    Route::get('/', [Raw_materialController::class, 'index'])->name('raw_material');
    Route::get('/{raw_material}', [Raw_materialController::class, 'show'])->name('employees.show');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
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
