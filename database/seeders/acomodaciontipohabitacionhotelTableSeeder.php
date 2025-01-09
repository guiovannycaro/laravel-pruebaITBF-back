<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Acomodacion_tipohabitacion_hotel;
use Faker\Factory as Faker;

class acomodaciontipohabitacionhotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Acomodacion_tipohabitacion_hotel::truncate();

        $faker =\Faker\Factory::create();

        for($i = 0; $i < 30 ;$i++){
            Acomodacion_tipohabitacion_hotel::create([
                'idhotel'=> $faker->numberBetween(5, 34),
                'idacomodacion'=> $faker->numberBetween(1, 5),
                'idtipoacomodacion'=>  $faker->numberBetween(1, 4),
                ]
            );
          }


    }
}
