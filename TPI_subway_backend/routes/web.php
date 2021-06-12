<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::post('login', [\App\Http\Controllers\LoginController::class, 'authenticate']);
Route::post('logout', [\App\Http\Controllers\LoginController::class, 'logout']);
Route::post('register', [\App\Http\Controllers\LoginController::class, 'register']);
Route::get('user', [\App\Http\Controllers\LoginController::class, 'currentUser']);
Route::put('edit-profile/{id}', [\App\Http\Controllers\EditProfileController::class, 'editInfo']);
Route::put('change-password/{id}', [\App\Http\Controllers\EditProfileController::class, 'changePassword']);
Route::get('address/{id}', [\App\Http\Controllers\AddressController::class, 'getAllAddress']);
Route::post('new-address', [\App\Http\Controllers\AddressController::class, 'newAddress']);
Route::get('edit-address/{id}', [\App\Http\Controllers\AddressController::class, 'getAddress']);
Route::put('save-changes-address/{id}', [\App\Http\Controllers\AddressController::class, 'saveAddress']);
Route::delete('delete-address/{id}', [\App\Http\Controllers\AddressController::class, 'deleteAddress']);
Route::get('payments/{id}', [\App\Http\Controllers\FacturaController::class, 'getPayments']);
Route::post('order', [\App\Http\Controllers\OrderController::class, 'order']);

