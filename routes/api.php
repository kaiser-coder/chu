<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExaminerController;
use App\Http\Controllers\PatientController;

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
	Route::get('', [ExaminerController::class, 'list'])->name('examiner.list');
	Route::post('/new', [ExaminerController::class, 'store'])->name('examiner.new');
	Route::post('/update/{id}', [ExaminerController::class, 'update'])->name('examiner.update');
});

Route::prefix('/patients')->group(function () {
	Route::get('', [PatientController::class, 'list'])->name('patient.list');
	Route::post('/new', [PatientController::class, 'store'])->name('patient.create');
});
