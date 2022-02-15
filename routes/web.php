<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [HomeController::class, "index"]);

Route::get('/users', [AdminController::class, "users"]);

Route::get('/foodmenu', [AdminController::class, "foodmenu"]);

Route::get('/fooddelete/{id}', [AdminController::class, "fooddelete"]);

Route::get('/foodedit/{id}', [AdminController::class, "foodedit"]);

Route::post('/uploadfood', [AdminController::class, "uploadfood"]);

Route::get('/deleteusers/{id}', [AdminController::class, "deleteusers"]);

Route::get('/redirect', [HomeController::class, "redirect"]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
