<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Tienda;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiendas = Tienda::query()->with('categorias')->get();
        $productosNombres = ['Pan', 'Menestra de verduras', 'Lejía', 'Helado de fresa'];
        $productosDescripciones = ['Pan de hoy', 'Verduras variadas de fácil cocinado', 'Lejía perfumada para el hogar', 'Helado reducido en azúcar'];

        foreach ($tiendas as $t) {
            foreach ($t->categorias as $key=>$categoria) {
                Producto::query()->create([
                    'nombre' => $productosNombres[$key],
                    'descripcion' => $productosDescripciones[$key],
                    'precio' => '5.99',
                    'imagen' => null,
                    'orden' => $key,
                    'id_categoria' => $categoria->id,
                    'id_tienda' => $t->id,
                ]);
            }
        }

    }
}
