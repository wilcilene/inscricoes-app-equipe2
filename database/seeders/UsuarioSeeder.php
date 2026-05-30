<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFactory::create([
            'nome' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('123456'),
            'tipo_usuario_id' => TipoUsuario::inRandomOrder()->first()?->id,

        ]);
    }
}
