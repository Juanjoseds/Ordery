<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Tienda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

  public function indexAdmin()
  {
    $numeroTiendas = Tienda::query()->count();
    return view('/content/dashboard/admin/dashboard', [
        'numeroTiendas' => $numeroTiendas
    ]);
  }

    public function indexTienda()
    {
        $pedidos = $this->getPedidosSeisMeses();

        return view('/content/dashboard/tienda/dashboard', compact('pedidos'));
    }

    // Obtener la cantidad de pedidos finalizados de los últimos 6 meses
    // Devuelve un array con las cantidades de pedidos totales, precios totales.
    public function getPedidosSeisMeses(){
      $haceSeisMeses = Carbon::now()->subMonths(6)->startOfMonth();

      $pedido = Pedido::query()
          ->where('estado', 'Finalizado')
          ->where('tienda_id', $this->user->tienda_id)
          ->whereDate('created_at', '>=', $haceSeisMeses)
          ->selectRaw('year(created_at) year, month(created_at) month, count(*) totalPedidos, SUM(precio) totalPrecio')
          ->groupBy('year', 'month')
          ->orderBy('year')
          ->get()
          ->toArray();

        return $pedido;
    }
}
