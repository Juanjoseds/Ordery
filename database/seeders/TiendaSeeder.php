<?php

namespace Database\Seeders;

use App\Models\Tienda;
use Faker\Factory;
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

        $tiendas = [[
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
            'nombre_contacto' => 'VENTA AL PÚBLICO',
            'is_blocked' => 0,
        ],
            [
                'nombre' => 'Bazar Gemma',
                'nombre_legal' => 'Gemmazar S.L.',
                'cif' => 'X382900A',
                'telefono' => '888551125',
                'email' => 'bazargemma@gmail.com',
                'codigo_postal' => '35002',
                'direccion' => 'C/ Luis Morote, 120',
                'ciudad' => 'Las Palmas de Gran Canaria',
                'provincia' => 'Las Palmas',
                'descripcion' => 'Vendemos productos variados para todas las necesidades. Desde primeras necesidades hasta ¡cholotate!',
                'url' => 'bazar-gemma',
                'nombre_contacto' => 'Gemma Guardeño',
                'is_blocked' => 0,
            ],
            [
                'nombre' => "Food Shop",
                'nombre_legal' => 'Fudsiop S.L.',
                'cif' => 'F4888555C',
                'telefono' => '2555444876',
                'email' => 'fudsiop@gmail.com',
                'codigo_postal' => '35002',
                'direccion' => 'C/ Paseo de Chill, S/N',
                'ciudad' => 'Las Palmas de Gran Canaria',
                'provincia' => 'Las Palmas',
                'descripcion' => 'Gran variedad de productos cárnicos y verduras frescas.',
                'url' => 'fudsiop',
                'nombre_contacto' => 'Jorge Estupiñán',
                'is_blocked' => 0,
            ],
            [
                'nombre' => "Las Mascotas",
                'nombre_legal' => 'mascotasdivertidas S.A',
                'cif' => '4888744X',
                'telefono' => '6995444122',
                'email' => 'supermascotas@hotmail.com',
                'codigo_postal' => '35110',
                'direccion' => 'C/ La Unión, 45',
                'ciudad' => 'Vecindario',
                'provincia' => 'Las Palmas',
                'descripcion' => 'Mima a tu mascota con los mejores productos 🐶.',
                'url' => 'las-mascotas',
                'nombre_contacto' => 'RECEPCIÓN',
                'is_blocked' => 0,
            ]];
        foreach ($tiendas as $tienda) {
            Tienda::query()->create($tienda);
        }

        // TIENDAS ALEATORIAS DE RELLENO
        $faker = Factory::create();

        foreach (range(1,10) as $tienda) {
            $sufix = $faker->companySuffix;
            Tienda::query()->create([
                'nombre' => $faker->company(),
                'nombre_legal' => $faker->company() . ' ' . $faker->companySuffix,
                'cif' => strtoupper($faker->bothify('?########?')),
                'telefono' => $faker->phoneNumber(),
                'email' => $faker->companyEmail(),
                'codigo_postal' => $faker->postcode(),
                'direccion' => $faker->address(),
                'ciudad' => $faker->city(),
                'provincia' => $faker->country(),
                'descripcion' => $faker->text(),
                'nombre_contacto' => $faker->name(),
                'url' => $faker->slug(2),
                'is_blocked' => $faker->randomElement([0,1]),
            ]);
        }
    }
}
