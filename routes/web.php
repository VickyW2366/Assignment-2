<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buses', [BusController::class, 'index']);
Route::post('/buses', [BusController::class, 'store'])->middleware(['auth', 'can:edit']);
Route::patch('/buses', [BusController::class, 'update'])->middleware('auth');
Route::delete('/buses', [BusController::class, 'destroy'])->middleware('auth');
Route::get('/buses/create', [BusController::class, 'create'])->middleware(['auth', 'can:edit']);
Route::get('/buses/about', [BusController::class, 'about']);
Route::get('/buses/{id}', [BusController::class, 'show']);
Route::get('/buses/{id}/edit', [BusController::class, 'edit'])->middleware(['auth', 'can:edit']);

Route::get('/statuses', [StatusController::class, 'index']);

Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);