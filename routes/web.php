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

Route::get('/', function () {
    return redirect('home');
});

// allow auth
Auth::routes();

// home page
Route::get('/home', 		[App\Http\Controllers\HomeController::class, 	'index'])->name('home');
Route::post('/home', 		[App\Http\Controllers\HomeController::class, 	'post']);

// Report page
Route::get('/report/{id}',	[App\Http\Controllers\ReportController::class,	'index'])->name('report');