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

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum'])
	->prefix('/examiners')
	->group(
		function () {
			Route::get('', [ExaminerController::class, 'list'])->name('examiner.list');
			Route::post('/new', [ExaminerController::class, 'store'])->name('examiner.new');
			Route::post('/update/{id}', [ExaminerController::class, 'update'])->name('examiner.update');
		}
	);

Route::middleware(['auth:sanctum'])
	->prefix('/patients')
	->group(function () {
		Route::get('', [PatientController::class, 'list'])->name('patient.list');
		Route::post('/new', [PatientController::class, 'store'])->name('patient.create');
	});
