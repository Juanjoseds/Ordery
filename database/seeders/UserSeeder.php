<?php

namespace Database\Seeders;

use App\Models\MetodoPago;
use App\Models\Tienda;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // ADMIN
        User::query()->create([
            'nombre' => 'Juan José',
            'apellidos' => 'Díaz',
            'dni' => '828701918',
            'telefono' => '828701918',
            'tipo' => 'admin',
//            'rol' => 'admin',
            'email' => 'admin@gmail.com',
            'descripcion' => 'Me encanta el chocolate. ¡Qué bien sienta desayunar chocolate caliente!',
            'email_verified_at' => now(),
            'email_verify_token' => Hash::make('admin@gmail.com'),
            'password' => '$2y$10$t1BD1uLo7T9lz5MgwllVd.maotIJLYN/byf8gzxc91PRXgCVi7OW2', // password
            'remember_token' => Str::random(10),
            'imagen' => null,
            'tienda_id' => null,
        ]);

        // TIENDAS
        $countTiendas = Tienda::query()->count();
        foreach(range(1, 100) as $i) {
            User::query()->create([
                'nombre' => $faker->name(),
                'apellidos' => $faker->lastName(),
                'dni' => strtoupper($faker->bothify('########?')),
                'telefono' => $faker->phoneNumber(),
                'tipo' => 'tienda',
                'email' => $faker->unique()->safeEmail,
                'descripcion' => $faker->text(),
                'password' => '$2y$10$t1BD1uLo7T9lz5MgwllVd.maotIJLYN/byf8gzxc91PRXgCVi7OW2', // password
                'imagen' => null,
                'tienda_id' => $faker->numberBetween(1, $countTiendas),
                'is_blocked' => $faker->randomElement([0,1]),
            ]);
        }

    }
}
