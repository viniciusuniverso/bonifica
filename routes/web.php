<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HashController;

Route::get('/GerarHash/{texto}',[HashController::class, 'GerarHash'])->middleware([\Illuminate\Routing\Middleware\ThrottleRequests::using('limite-request')]);
Route::get('/',[HashController::class, 'ListarHash'])->name('hash.index');

