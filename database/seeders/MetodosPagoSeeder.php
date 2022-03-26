<?php

namespace Database\Seeders;

use App\Models\MetodoPago;
use Illuminate\Database\Seeder;

class MetodosPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $metodos = ['Efectivo', 'Paypal', 'Tarjeta'];

        foreach ($metodos as $metodo){
            if(MetodoPago::query()->where('nombre', $metodo)->count() === 0){
                MetodoPago::create([
                    'nombre' => $metodo,
                    'estado' => 0,
                    'configuracion' => null,
                ]);
            }
        }
    }
}
