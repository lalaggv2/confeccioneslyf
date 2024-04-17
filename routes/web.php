<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\SaleOrderController;
use App\Http\Controllers\PurchaseOrderController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('nosotros', function () {
    return view('nosotros');
});
// Ruta para mostrar el formulario de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Ruta para procesar el registro de usuarios
Route::post('/register', [RegisterController::class, 'register']);



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post("access", [LoginController::class, "login"])->name("access.web");
Route::post("logout", [LoginController::class, "logout"])->name("logout");





Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::prefix('employees')->group(function () {
        Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
        Route::get('/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
        Route::delete('/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers');
        Route::get('/{customer}', [CustomerController::class, 'show'])->name('customers.show');
        Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
        Route::delete('/employees/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

        

    });
    
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
      
    });

    Route::prefix('product_details')->group(function () {
        Route::get('/', [ProductDetailController::class, 'index'])->name('product_details');
        Route::get('/{product_detail}', [ProductDetailController::class, 'show'])->name('product_details.show');
        Route::post('/store', [ProductDetailController::class, 'store'])->name('product_details.store');
    });

    Route::prefix('suppliers')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('suppliers');
        Route::get('/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');
        Route::post('/store', [SupplierController::class, 'store'])->name('suppliers.store');
        Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    });

    Route::prefix('detail_orders')->group(function () {
        Route::get('/', [DetailOrderController::class, 'index'])->name('detail_orders');
        Route::get('/{detail_order}', [DetailOrderController::class, 'show'])->name('detail_orders.show');
        Route::post('/store', [DetailOrderController::class, 'store'])->name('detail_orders.store');
    });

    Route::prefix('sale_orders')->group(function () {
        Route::get('/', [SaleOrderController::class, 'index'])->name('sale_orders');
        Route::get('/{sale_order}', [SaleOrderController::class, 'show'])->name('sale_orders.show');
        Route::post('/store', [SaleOrderController::class, 'store'])->name('sale_orders.store');
    });

    Route::prefix('purchase_orders')->group(function () {
        Route::get('/', [PurchaseOrderController::class, 'index'])->name('purchase_orders');
        Route::get('/{purchase_order}', [PurchaseOrderController::class, 'show'])->name('purchase_orders.show');
        Route::post('/store', [PurchaseOrderController::class, 'store'])->name('purchase_orders.store');
    });





    
    
   

    });

   
   


    

    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
    
