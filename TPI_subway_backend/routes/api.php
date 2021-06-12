<?php

use App\Http\Controllers\AderesoController;
use App\Http\Controllers\CarneController;
use App\Http\Controllers\ComplementoController;
use App\Http\Controllers\PanController;
use App\Http\Controllers\QuesoController;
use App\Http\Controllers\VegetalController;
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

Route::get("/aderesos",[AderesoController::class,"all"]);
Route::get("/carnes",[CarneController::class,"all"]);
Route::get("/panes",[PanController::class,"all"]);
Route::get("/complementos",[ComplementoController::class,"all"]);
Route::get("/vegetales",[VegetalController::class,"all"]);
Route::get("/quesos",[QuesoController::class,"all"]);

