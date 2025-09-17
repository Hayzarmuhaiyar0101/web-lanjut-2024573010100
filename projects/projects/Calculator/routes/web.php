<?php
use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/calculator', [CalculatorController::class, 'index']);
Route::post('/calculator', [CalculatorController::class, 'calculate'])->name('calculator.calculate');

Route::get('/', function () {
    return view('calculator ');
});
