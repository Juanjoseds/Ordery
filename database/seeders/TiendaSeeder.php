<?php

namespace Database\Seeders;

use App\Models\Tienda;
use Illuminate\Database\Seeder;

class TiendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tienda::create([
            'nombre' => 'El Goloso',
            'nombre_legal' => 'El Goloso S.L.',
            'cif' => 'Q2826000H',
            'telefono' => '828701918',
            'email' => 'elgoloso@gmail.com',
            'codigo_postal' => '35100',
            'direccion' => 'C/ Unión, 35',
            'ciudad' => 'Las Palmas de Gran Canaria',
            'provincia' => 'Las Palmas',
            'carta' => '{"test":[{"titulo":"test","descripcion":"Chupa chups tiramisu apple pie biscuit sweet roll bonbon macaroon toffee icing.","precio":"10€","imagen":"http://vuexy.test/images/portrait/small/avatar-s-12.jpg"}]}',
            'descripcion' => 'Vendemos productos variados para todas las necesidades. Desde primeras necesidades hasta ¡cholotate!',
            'url' => 'el-goloso',
            'is_blocked' => 0,
        ],
        [
            'nombre' => 'Canela',
            'nombre_legal' => 'Canela S.A.',
            'cif' => 'X382900A',
            'telefono' => '888551125',
            'email' => 'canela@gmail.com',
            'codigo_postal' => '35110',
            'direccion' => 'C/ Primero de Mayo, 120',
            'ciudad' => 'Telde',
            'provincia' => 'Las Palmas',
            'descripcion' => 'Vendemos productos variados para todas las necesidades. Desde primeras necesidades hasta ¡cholotate!',
            'url' => 'canela',
            'is_blocked' => 0,
        ]);
    }
}
