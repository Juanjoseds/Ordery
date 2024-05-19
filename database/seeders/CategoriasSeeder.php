<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Tienda;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalTiendas = Tienda::all()->count();
        $categoriasNombres = ['Básicos', 'Verduras', 'Limpieza', 'Helados'];
        $categoriasDescripciones = ['Lo más necesario en tu despensa', 'Las verduras acompañan cualquier plato', '¡Qué la limpieza no falte!', 'Endulza la tarde con un buen helado'];

        foreach (range(1, $totalTiendas) as $a) {
            foreach (range(1, sizeof($categoriasNombres)) as $key=>$categoria) {
                Categoria::query()->create([
                    'nombre' => $categoriasNombres[$key],
                    'descripcion' => $categoriasDescripciones[$key],
                    'orden' => $key,
                    'id_tienda' => $a,
                ]);
            }
        }

    }
}
