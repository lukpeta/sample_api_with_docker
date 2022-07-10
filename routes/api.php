<?php

use App\Http\Controllers\HomeController;
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

Route::get('date/{date}', [HomeController::class, 'resultByDate'])->name('resultByDate')->where('date', '^\d{4}\.(0[1-9]|1[0-2])\.(0[1-9]|[12][0-9]|3[01])$');
Route::get('number/{number}', [HomeController::class, 'repetitionOfNumbers'])->name('repetitionOfNumbers')->whereNumber('number');
