<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\mywelcomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', [welcomeController::class, 'show']);