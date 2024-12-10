<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenuController;

Route::resource('menus', MenuController::class);


        Route::get('/', function () {
            return view('home');
        });

        Route::get('/about', function () {
            return view('about');
        });

        Route::get('/login', function () {
            return view('auth.login');
        });

        Route::get('/register', function () {
            return view('auth.register');
        });

        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::get('/home', function () {
            return view('home'); 
        })->middleware('auth');