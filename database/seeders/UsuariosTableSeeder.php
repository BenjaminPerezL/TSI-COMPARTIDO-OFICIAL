<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'id' => 1,
            'email' => 'usuario1@gmail.com',
            'password' => bcrypt('1234'),
            'nombre' => 'Benjamin Admin',
            'rol_id'=>  1

            
        ]);
    
    }
}
