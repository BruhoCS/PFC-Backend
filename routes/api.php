<?php

use App\Http\Controllers\DeporteApiController;
use App\Http\Controllers\EntrenadorApiController;
use App\Http\Controllers\EntrenoApiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilApiController;
use App\Http\Controllers\PlanApiController;
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
    Route::apiResource('deportes', DeporteApiController::class);

    Route::apiResource('entrenadores', EntrenadorApiController::class);

    Route::apiResource('entrenos', EntrenoApiController::class);

    Route::apiResource('perfiles', PerfilApiController::class);

    Route::apiResource('planes', PlanApiController::class);
});
