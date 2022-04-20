<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SymptomateController;

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

Route::get('/', [SymptomateController::class, 'index'])->middleware('guest');
Route::get('/symptomate-list', [SymptomateController::class, 'symptomateList'])->middleware('guest');
Route::get('/suggest-list', [SymptomateController::class, 'suggestList'])->middleware('guest');
Route::get('/riskfactor-list', [SymptomateController::class, 'riskFactorList'])->middleware('guest');
Route::get('/location-riskfactor-list', [SymptomateController::class, 'locationriskFactorList'])->middleware('guest');
Route::get('/interview', [SymptomateController::class, 'interview'])->middleware('guest');
Route::get('/symptome-filter', [SymptomateController::class, 'symptomeFilter'])->middleware('guest');
Route::get('/rekomendasi', [SymptomateController::class, 'rekomendasi'])->middleware('guest');


