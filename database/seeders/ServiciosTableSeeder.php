<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert([
            ['id' => 1,
            'tipo_servicio' => 'Manicure',
            'valor_estandar' => '9000',
            'duracion_estandar' => '20'],
            ['id' => 2,
            'tipo_servicio' => 'Pedicure',
            'valor_estandar' => '11000',
            'duracion_estandar' => '20'
            ]
            
        ]);
    }
}
