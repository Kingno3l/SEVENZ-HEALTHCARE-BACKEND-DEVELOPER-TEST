<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\MedicalDataController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:api')->get('/lab-tests', [LabTestController::class, 'index']);
Route::middleware('auth:api')->post('/submit-medical-data', [MedicalDataController::class, 'store']);

