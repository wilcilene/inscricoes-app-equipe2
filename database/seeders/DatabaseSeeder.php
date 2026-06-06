<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TipoUsuarioSeeder::class,      // 1 - sem dependência
            UsuarioSeeder::class,          // 2 - depende de TipoUsuario
            EditalSeeder::class,           // 3 - sem dependência
            CandidatoSeeder::class,        // 4 - depende de Usuario
            InscricaoStatusSeeder::class,  // 5 - sem dependência
        ]);
    }
}
