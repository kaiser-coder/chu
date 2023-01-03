<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/welcome', function () {
return view('welcome');
}); */

Route::view('/app/{any}', 'index');
Route::view('/app/{any}/new', 'index');
Route::view('/app/{any}/edit', 'index');
Route::view('/signin', 'index');
