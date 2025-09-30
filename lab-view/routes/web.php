<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

route::get('/hello',[DemoController::class, 'hello']);  
route::get('/greet/{name}',[DemoController::class, 'greet']);
route::get('/search',[DemoController::class, 'search']);
