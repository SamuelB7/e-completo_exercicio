<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class PedidosPagamentosController extends Controller
{
    public function processPayment($purchaseId) {
        $purchase = Pedidos::find($purchaseId);

        return response()->json($purchase->pedidoSituacao);
    }
}
