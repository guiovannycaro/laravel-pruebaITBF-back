<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hoteles;
use Faker\Factory as Faker;

class hotelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hoteles::truncate();

      $faker =\Faker\Factory::create();

      for($i = 0; $i < 30 ;$i++){
        Hoteles::create([
            'nombre'=> $faker->company,
            'codnifrfc'=> $faker->unique()->numerify('##########'),
            'direccion'=>  $faker->address,
            'telefono'=> $faker->phoneNumber,
            'idciudad'=> $faker->numberBetween(1, 1099),
            'numhabitaciones'=> $faker->numberBetween(10, 100),
            'is_activo'=> $faker->boolean
            ]
        );
      }

    }
}
