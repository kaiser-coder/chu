<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExaminersController;
use App\Http\Controllers\PatientsController;

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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
}); */

Route::post('/auth', [AuthController::class, 'signin']);

Route::prefix('/examiners')->group(function () {
	Route::get('', [ExaminersController::class, 'list']);
	Route::post('/new', [ExaminersController::class, 'store']);
});

Route::prefix('/patients')->group(function () {
	Route::get('', [PatientsController::class, 'list']);
	Route::post('/new', [PatientsController::class, 'store']);
});
