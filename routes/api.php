<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;
use App\Models\Hoteles;
use App\Http\Controllers\HotelesController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\AcomodacionController;
use App\Http\Controllers\TipoacomodacionController;
use App\Http\Controllers\AcomodaciontipohabitacionhotelelesController;

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


Route::middleware(['ciudad'])->group(function () {
    Route::get('/ciudad', [CiudadController::class, 'index']);
    Route::get('/ciudad/{nombre}', [CiudadController::class, 'show']);
    Route::post('/ciudad', [CiudadController::class, 'store']);
    Route::put('/ciudad/{ciudad}', [CiudadController::class, 'update']);
    Route::delete('/ciudad/{ciudad}', [CiudadController::class, 'delete']);
});


Route::middleware(['hoteles'])->group(function () {
    Route::get('/hoteles', [HotelesController::class, 'index']);
    Route::get('/hoteles/{hoteles}', [HotelesController::class, 'show']);
     Route::get('/hoteles/BoscarById/{hoteles}', [HotelesController::class, 'buscarById']);
    Route::post('/hoteles', [HotelesController::class, 'store']);
   Route::put('/hoteles/{hoteles}', [HotelesController::class, 'update']);
    Route::delete('/hoteles/{id}', [HotelesController::class, 'delete']);

    Route::get('/hoteles/obtenernumero/{nombre}', [HotelesController::class, 'obtenercuentahabitaciones']);
});

Route::middleware(['acomodacion'])->group(function () {
    Route::get('/acomodacion', [AcomodacionController::class, 'index']);
    Route::get('/acomodacion/{nombre}', [AcomodacionController::class, 'show']);
    Route::post('/acomodacion', [AcomodacionController::class, 'store']);
    Route::put('/acomodacion/{acomodacion}', [AcomodacionController::class, 'update']);
    Route::delete('/acomodacion/{acomodacion}', [AcomodacionController::class, 'delete']);
});

Route::middleware(['tipohabitacion'])->group(function () {
    Route::get('/tipohabitacion', [TipoacomodacionController::class, 'index']);
    Route::get('/tipohabitacion/{nombre}', [TipoacomodacionController::class, 'show']);
    Route::post('/tipohabitacion', [TipoacomodacionController::class, 'store']);
    Route::put('/tipohabitacion/{acomodacion}', [TipoacomodacionController::class, 'update']);
    Route::delete('/tipohabitacion/{acomodacion}', [TipoacomodacionController::class, 'delete']);
});


Route::middleware(['acomotiphabitacionhotel'])->group(function () {
    Route::get('/acomotiphabitacionhotel', [AcomodaciontipohabitacionhotelelesController::class, 'index']);
    Route::get('/acomotiphabitacionhotel/{nombre}', [AcomodaciontipohabitacionhotelelesController::class, 'show']);
    Route::post('/acomotiphabitacionhotel', [AcomodaciontipohabitacionhotelelesController::class, 'store']);
    Route::get('/acomotiphabitacionhotel/conteoAcomodacion/{idhotel}', [AcomodaciontipohabitacionhotelelesController::class, 'conteoAcomodaciones']);
  




});



