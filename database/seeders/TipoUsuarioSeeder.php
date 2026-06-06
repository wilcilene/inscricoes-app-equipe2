<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = TipoUsuario::factory()->make()->toArray();
        foreach ($roles as $role) {
            TipoUsuario::create($role);
        }
    }
}
