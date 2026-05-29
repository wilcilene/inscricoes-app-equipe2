<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipo_usuarios')->insert([
            ['tipo_usuario' => 'usuario'],
            ['tipo_usuario' => 'administrador'],
        ]);
    }
}