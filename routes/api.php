<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/students', [StudentApiController::class, 'index']);

Route::post('/students', [StudentApiController::class, 'store']);

Route::get('/students/{id}', [StudentApiController::class, 'show']);

Route::put('/students/{id}', [StudentApiController::class, 'update']);

Route::delete('/students/{id}', [StudentApiController::class, 'destroy']);