<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;

Route::get('/hospitals', [HospitalController::class, 'index']);
Route::post('/hospitals', [HospitalController::class, 'store']);
Route::get('/hospitals/{hospital}', [HospitalController::class, 'show']);
Route::put('/hospitals/{hospital}', [HospitalController::class, 'update']);
Route::delete('/hospitals/{hospital}', [HospitalController::class, 'destroy']);
