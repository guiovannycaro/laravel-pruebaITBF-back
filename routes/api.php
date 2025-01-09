<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;
use App\Models\Hoteles;
use App\Http\Controllers\HotelesController;

use App\Http\Controllers\AcomodacionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware(['hoteles'])->group(function () {
    Route::get('/hoteles', [HotelesController::class, 'index']);
    Route::get('/hoteles/{hoteles}', [HotelesController::class, 'show']);
    Route::post('/hoteles', [HotelesController::class, 'store']);
    Route::put('/hoteles/{hoteles}', [HotelesController::class, 'update']);
    Route::delete('/hoteles/{hoteles}', [HotelesController::class, 'delete']);
    Route::get('/hoteles/obtenernumero/{nombre}', [HotelesController::class, 'obtenercuentahabitaciones']);
});

Route::middleware(['acomodacion'])->group(function () {
    Route::get('/acomodacion', [AcomodacionController::class, 'index']);
    Route::get('/acomodacion/{nombre}', [AcomodacionController::class, 'show']);
    Route::post('/acomodacion', [AcomodacionController::class, 'store']);
    Route::put('/acomodacion/{acomodacion}', [AcomodacionController::class, 'update']);
    Route::delete('/acomodacion/{acomodacion}', [AcomodacionController::class, 'delete']);
});
