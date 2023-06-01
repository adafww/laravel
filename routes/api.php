<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => 'rate_limit'], function () {
//    Route::apiResources([
//        'orders' => OrderController::class,
//    ]);
//});

Route::apiResources([
    'orders' => OrderController::class,
]);
//Route::post('/orders', [OrderController::class, 'createOrder']);

//Route::get('/orders', [OrderController::class, 'getOrderList']);
//
//Route::get('/orders/{id}', [OrderController::class, 'getOrderInfo']);
