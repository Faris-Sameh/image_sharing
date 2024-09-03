<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("Create/User",[UserController::class,"create"])->name("create");
Route::post("Store/User",[UserController::class,"store"])->name('store');
Route::get("index/User",[UserController::class,"index"])->name('index.User');
Route::get("Edit/User/{id}",[UserController::class,"update"])->name('edit');
Route::post("Update/User",[UserController::class,"edit"])->name('update');
Route::get("Delete/User/{id}",[UserController::class,"delete"])->name('delete');
Route::get("loginform/User", [UserController::class,"loginform"])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('Login/User', [UserController::class, 'login'])->name('login.submit');
Route::get('Posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('Posts/Store', [PostController::class, 'store'])->name('posts.store');
Route::post('delete/post/{id}', [PostController::class, 'destroy'])->name('delete.post');
