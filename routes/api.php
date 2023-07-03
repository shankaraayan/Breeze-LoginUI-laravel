<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RazorpayPaymentController;

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

Route::post('/auth/pay', [RazorpayPaymentController::class, 'pay']);
Route::post('/auth/paysuccess', [RazorpayPaymentController::class, 'store']);
Route::post('/auth/paymentsuccess', [RazorpayPaymentController::class, 'paymentsuccess']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});