<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/create-user-login', [LoginController::class, 'create'])->name('login.create-user');
Route::post('/store-user-lgin', [LoginController::class, 'store'])->name('login.store-user');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/index-user', [UserController::class, 'index'])->name('user.index');
    Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});


Route::get('/', [ContactController::class, 'index'])->name('contact.index');;

Route::resource('contacts', ContactController::class)->middleware('auth');

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');
Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contact.show');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contact.update');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
