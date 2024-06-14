<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Tienda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

  public function indexAdmin()
  {
    $numeroTiendas = Tienda::query()->count();
    $numeroPedidos = Pedido::query()->count();
    $pedidosHoy = Pedido::query()->where('created_at', '>', Carbon::today())->count();
    $totalPedidosHoy = Pedido::query()->where('created_at', '>', Carbon::today())->sum('precio');
    return view('/content/dashboard/admin/dashboard', [
        'numeroTiendas' => $numeroTiendas,
        'numeroPedidos' => $numeroPedidos,
        'pedidosHoy' => $pedidosHoy,
        'totalPedidosHoy' => $totalPedidosHoy
    ]);
  }

    public function indexTienda()
    {
        $pedidos = $this->getPedidosSeisMeses();
        $productos = Producto::query()->where('id_tienda', $this->user->tienda_id)->count();
        $ultimoPedido = Pedido::query()->where('id_tienda', $this->user->tienda_id)->orderBy('created_at', 'desc')->first();
        return view('/content/dashboard/tienda/dashboard', compact('pedidos', 'productos', 'ultimoPedido'));
    }

    // Obtener la cantidad de pedidos finalizados de los últimos 6 meses
    // Devuelve un array con las cantidades de pedidos totales, precios totales.
    public function getPedidosSeisMeses(){
      $haceSeisMeses = Carbon::now()->subMonths(6)->startOfMonth();

      $pedido = Pedido::query()
          ->where('estado', 'Finalizado')
          ->where('id_tienda', $this->user->tienda_id)
          ->whereDate('created_at', '>=', $haceSeisMeses)
          ->selectRaw('year(created_at) year, month(created_at) month, count(*) totalPedidos, SUM(precio) totalPrecio')
          ->groupBy('year', 'month')
          ->orderBy('year')
          ->get()
          ->toArray();

        return $pedido[0];
    }
}
