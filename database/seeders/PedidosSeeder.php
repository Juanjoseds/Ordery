<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\Tienda;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = ['Pendiente', 'Preparacion', 'Preparado', 'Finalizado', 'Cancelado'];
        foreach (range(1, 5) as $i) {
            Pedido::create([
                'doc' => "test$i",
                'info_pago' => '',
                'pedido' => '{
                   "productos": [
                      {"id":"3", "nombre": "Papas", "precio": "5", "cantidad": "1"},
                      {"id":"4", "nombre": "Dulces", "precio": "10", "cantidad": "2"}
                   ],
                   "precio": "37.5",
                   "descuento": "5"
                }',
                'precio' => 37.5,
                'observaciones' => '¡El dulce que sea de hoy!',
                'fecha_entrega' => Carbon::now(),
                'estado' => $estados[$i-1],
                'user_id' => 1,
                'tienda_id' => 1,
            ]);
        }

    }
}
