<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserProductController;
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

// Version 1
Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::apiResource('accounts', AccountController::class)->except(['show', 'destroy']);
    Route::apiResource('addresses', AddressController::class)->except(['show', 'destroy']);
    Route::apiResource('invoices', InvoiceController::class)->only(['index', 'show']);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('users', UserController::class)->only('show');
    Route::apiResource('users.products', UserProductController::class)->only('index');
});
