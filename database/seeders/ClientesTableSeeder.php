<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            ['nombre' => 'benjamin',
            'rut' => '19606594-6',
            'mail' => 'benjamin@gmail.com',
            ],
            ['nombre' => 'juan',
            'rut' => '21475934-6',
            'mail' => 'juan@gmail.com'
            ]
            
        ]);
    }
}
