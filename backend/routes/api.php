<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', [LoginController::class, 'submit']);
Route::post('/login/verify', [LoginController::class, 'verify'])

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/driver', [DriverController::class, 'show']);
    Route::post('/driver' [DriverController::class, 'update']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    })
})
