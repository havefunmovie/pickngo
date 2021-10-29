<?php

use App\Http\Controllers\Api\v1\AdminPickupAndDeliveryController;
use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\Api\v1\DriverController;
use App\Http\Controllers\Api\v1\PackageController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('driver', DriverController::class);
    Route::apiResource('order', PackageController::class);

    Route::post('/driver/acceptOrder', [DriverController::class,'acceptNewOrder']);
    Route::get('/driver/acceptedOrders/{id}', [DriverController::class,'acceptedOrderList']);
    Route::get('/driver/earning/{id}', [DriverController::class,'earningList']);
    Route::post('/driver/handOver/', [DriverController::class,'handOver']);
    
    Route::get('orders/waitingList', [PackageController::class,'PackageWaitingList']);
    Route::get('orders/getQoute', [PackageController::class,'getQuote']);

    Route::get('customer/inProccessOrders', [CustomerController::class,'inProccessOrders']);
    Route::get('customer/ordersHistory', [CustomerController::class,'ordersHistory']);

    Route::post('/admin/setPrice', [AdminPickupAndDeliveryController::class,'setPrice']);
});
