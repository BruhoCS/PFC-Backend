<?php

use App\Http\Controllers\DeporteApiController;
use App\Http\Controllers\DeporteUserApiController;
use App\Http\Controllers\EntrenadorApiController;
use App\Http\Controllers\EntrenoApiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilApiController;
use App\Http\Controllers\PlanApiController;
use App\Http\Controllers\userApiController;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('loginAPI', [LoginController::class, 'loginAPI']);

Route::middleware('auth:sanctum')->group(function () {
    //Deportes
    Route::apiResource('deportes', DeporteApiController::class);

    //Tabla pivote deportes usuarios
    Route::post('/deportes/{deporte}/apuntarse', [DeporteUserApiController::class, 'apuntarse']);
    Route::delete('/deportes/{deporte}/borrarse', [DeporteUserApiController::class, 'borrarse']);
    Route::get('/perfil/deportes', [DeporteUserApiController::class, 'misDeportes']);

    //Entrenadores
    Route::apiResource('entrenadores', EntrenadorApiController::class);

    //Entrenos
    Route::apiResource('entrenos', EntrenoApiController::class);
    Route::post('entrenos/getEntreno', [EntrenoApiController::class, 'getEntreno']);

    //Usuario
    Route::post('/usuario/{plan}/apuntarsePlan', [UserApiController::class, 'apuntarsePlan']);

    //Perfil del usuario
    Route::apiResource('perfiles', PerfilApiController::class);

    //Planes del gimansio
    Route::apiResource('planes', PlanApiController::class);
    
});
