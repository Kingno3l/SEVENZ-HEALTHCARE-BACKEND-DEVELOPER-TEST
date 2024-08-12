<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\MedicalDataController;
use App\Http\Controllers\AuthController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login'])->name('login');


Route::middleware('auth:api')->get('/lab-tests', [LabTestController::class, 'index']);
Route::middleware('auth:api')->post('/submit-medical-data', [MedicalDataController::class, 'store']);

// Route::middleware('auth:api')->group(function () {
//     Route::get('/lab-tests', [LabTestController::class, 'index']);
//     Route::post('/submit-medical-data', [MedicalDataController::class, 'store']);
// });

