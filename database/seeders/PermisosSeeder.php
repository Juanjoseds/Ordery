<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permiso;
use App\Models\PermisoUser;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permiso::query()->delete();
        $permisos = ['Empleados', 'Tiendas', 'Metodos de pago', 'Configuracion'];

        foreach ($permisos as $index=>$permiso){
            Permiso::create([
                'modulo' => strtolower($permiso),
                'display' => strtolower($permiso),
                'nombre' => $permiso,
                //'nombre_it' => $permisos_it[$index],
                'rol' => 'admin',
            ]);
        }

        foreach (Permiso::all() as $permiso){
            PermisoUser::create([
                'users_id' => 1,
                'permisos_id' => $permiso->id,
            ]);
        }
    }
}
