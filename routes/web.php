<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buses', [BusController::class, 'index']);
Route::post('/buses', [BusController::class, 'store']);
Route::get('/buses/create', [BusController::class, 'create']);
Route::get('/buses/about', [BusController::class, 'about']);
Route::get('/buses/{id}', [BusController::class, 'show']);
Route::get('/buses/{id}/edit', [BusController::class, 'edit']);
Route::patch('/buses', [BusController::class, 'update']);
Route::delete('/buses', [BusController::class, 'destroy']);
Route::post('/buses/search', [BusController::class, 'search']);