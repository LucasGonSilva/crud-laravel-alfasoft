<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
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

    Route::get('/index-company', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/show-company/{user}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/create-company', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/store-company', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/edit-company/{company}', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/update-company/{company}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/destroy-company/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');
});
