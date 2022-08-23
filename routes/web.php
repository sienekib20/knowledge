<?php

use HnScript\Http\Route;


Route::get('/', [App\Controllers\HomeController::class, 'index']);
//Route::get('/home', [HomeController::class, 'index']);

//Route::get('/contact', [ContactController::class, 'index']);
//Route::post('/contact', [ContactController::class, 'store']);

//Route::get('/signup', [RegisterController::class, 'index']);
//Route::post('/signup', [RegisterController::class, 'store']);
