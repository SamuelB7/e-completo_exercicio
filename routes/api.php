<?php

use App\Http\Controllers\PedidosPagamentosController;
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

Route::post('/process_payment/{purchaseId}', [PedidosPagamentosController::class, 'processPayment'])->name('processar_pagamento');
Route::post('/process_all_payments', [PedidosPagamentosController::class, 'processAllPayments'])->name('processar_todos_pagamentos');

