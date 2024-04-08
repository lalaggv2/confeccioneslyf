<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductDetailsController;


Route::get('/', function () {
    return view('welcome');
});
// Ruta para mostrar el formulario de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Ruta para procesar el registro de usuarios
Route::post('/register', [RegisterController::class, 'register']);

Route::resource('suppliers', SupplierController::class);

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
    Route::prefix('product_details')->group(function () {
        Route::get('/', [ProductDetailsController::class, 'index'])->name('product_details');
        Route::get('/{product_detail}', [ProductDetailsController::class, 'show'])->name('product_details.show');
        Route::post('/store', [ProductDetailsController::class, 'store'])->name('product_details.store');
    });

    Route::prefix('suppliers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('suppliers');
        Route::get('/{supplier}', [CustomerController::class, 'show'])->name('suppliers.show');
        Route::post('/store', [CustomerController::class, 'store'])->name('suppliers.store');
    });



    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');

    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');

    Route::get('/product_dalatails', [ProductDetailController::class, 'index'])->name('product_dalatails');

    
    
   

    });

   
   


    

    Route::get('/suppliers', [SupplierController::class, 'index'])->name('admin.suppliers.index');
    
