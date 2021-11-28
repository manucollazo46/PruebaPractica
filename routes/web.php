<?php

use App\Mail\ElTiempoGaliciaMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElTiempoGaliciaController;
use App\Http\Controllers\EnviarMailController;

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

Route::get('/', [ElTiempoGaliciaController::class, 'index']);

Route::get('/correoenviado', EnviarMailController::class);

