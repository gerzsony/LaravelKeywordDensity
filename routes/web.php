<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/kwdensity', 'ToolController@index')->name('KDTool');
Route::get('/kwdensity', [ToolController::class, 'index'])->name('KDTool');

Route::post('/kwdensity/calculate-and-get-density', [ToolController::class, 'CalculateAndGetDensity']);
