<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;

Route::resource('menus', MenuController::class);
        Route::get('/', function () {
            return view('home');
        });
        Route::get('/login', function () {
            return view('auth.login');
        });

        Route::get('/register', function () {
            return view('auth.register');
        });
        //login
        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::get('/home', function () {
            return view('home');
        //register
        })->middleware('auth');
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [RegisterController::class, 'register']);