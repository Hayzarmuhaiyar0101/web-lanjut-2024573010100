<?php
use App\Http\Controllers\DasarBladeController;
use App\Http\Controllers\LogicController;
use Illuminate\Support\Facades\Route;

Route::get('/dasar', [DasarBladeController::class, 'showData']);
Route::get('/logic', [LogicController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});



