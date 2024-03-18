<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmpleadosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\hash;

Route::post("access", [LoginController::class, "login"])->name("access");


Route::prefix('v1')->group(function () {
    Route::post("register", [LoginController::class, "register"])->name("register");
    Route::group(['middleware' => 'auth'], function () {
        Route::get("me", [LoginController::class, "me"])->name("me");
        Route::post("store", [EmpleadosController::class, "store"])->name("store");
    });
});
