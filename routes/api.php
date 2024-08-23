<?php

use App\Http\Controllers\SportController;
use App\Http\Controllers\CompetitorController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TreinerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('meus-dados', function () {
//    return response() -> json([
//        'nome completo' => 'Vinicius de Mello Canevari',
//        'ra' => '3414'
//    ]);
//});

//Route::apiResource('/sport', $SportController::class);

Route::apiResource('/sports', SportController::class);

Route::apiResource('/competitor', CompetitorController::class);

Route::apiResource('/treiner', TreinerController::class);

Route::apiResource('/location', LocationController::class);