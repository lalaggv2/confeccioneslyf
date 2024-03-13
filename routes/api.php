<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post("acess", [LoginController::class, "login"])->name("acess");
Route::post("new-user", [LoginController::class, "register"])->name("new-user");
Route::get("me", [LoginController::class, "me"])->name("me");