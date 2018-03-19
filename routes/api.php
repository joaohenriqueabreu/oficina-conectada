<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/// Webhooks do sistema de pagamento
Route::middleware('gateway')->group(function(){
    Route::prefix('payment')->group(function () {
        Route::put('status','PaymentController@statusUpdate')->name('gateway.payment.status');
    });
});