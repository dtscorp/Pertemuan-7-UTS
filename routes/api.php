<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\AuthController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/patients', [PatientController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/patients', [PatientController::class, 'create']);
    Route::put('/patient/{id}', [PatientController::class, 'update']);
    Route::delete('patient/{id}', [PatientController::class, "destroy"]);
    Route::get('/patient/search/{name}', [PatientController::class, 'name']);
    Route::get('/patient/status/positive', [PatientController::class, 'positive']);
    Route::get('/patient/status/recovery', [PatientController::class, 'recovery']);
    Route::get('/patient/status/death', [PatientController::class, 'death']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
