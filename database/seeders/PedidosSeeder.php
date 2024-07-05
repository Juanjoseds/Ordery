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
        $totalTiendas = Tienda::all()->count();
        $estados = ['Pendiente', 'Preparacion', 'Preparado', 'Finalizado', 'Cancelado'];
        $pedido = '{"productos": [
                  {"id":"3", "nombre": "Papas", "precio": "5", "cantidad": "1", "id_tienda": "1", "id_categoria": "1", "descripcion": "Papas con mojo", "imagen": "papas.jpg"},
                  {"id":"3", "nombre": "Dulces", "precio": "10", "cantidad": "1", "id_tienda": "1", "id_categoria": "2", "descripcion": "Dulces de hoy", "imagen": "dulces.jpg"}
               ],
               "precio": "37.5",
               "descuento": "5"
               }';

        foreach (range(1, $totalTiendas) as $a) {
            foreach (range(1, 5) as $i) {
                Pedido::query()->create([
                    'doc' => "test$i",
                    'info_pago' => '',
                    'tipo' => 'producto',
                    'pedido' => $pedido,
                    'precio' => 37.5,
                    'observaciones' => '¡El dulce que sea de hoy!',
                    'fecha_entrega' => Carbon::now(),
                    'estado' => $estados[$i-1],
                    'id_user' => 1,
                    'id_tienda' => $a,
                ]);
            }
        }


    }
}
