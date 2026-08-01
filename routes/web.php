<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, 'index']);

// LOGIN
Route::get('/login', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

// REGISTRO
Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'signup']);
