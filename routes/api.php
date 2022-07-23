<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NaveController;
use App\Http\Controllers\LanzadoraController;
use App\Http\Controllers\TripuladaController;
use App\Http\Controllers\NoTripuladaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Creando las rutas para usar las API

//Apis Para mostrar los datos
Route::get('get-all-lanzadoras', [LanzadoraController::class, 'getLanzadoras']);
Route::get('get-all-no-tripuladas', [NoTripuladaController::class, 'getNoTripuladas']);
Route::get('get-all-tripuladas', [TripuladaController::class, 'getTripuladas']);

//Ruta para crear las naves
Route::post('set-lanzadora', [LanzadoraController::class, 'setLanzadora']);
Route::post('set-no-tripuladas', [NoTripuladaController::class, 'setNoTriupaladas']);
Route::post('set-tripuladas', [TripuladaController::class, 'setTripuladas']);