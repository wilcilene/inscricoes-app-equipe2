<?php

namespace Database\Factories;

use App\Models\TipoUsuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TipoUsuario>
 */
class TipoUsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            ['tipo_usuario' => 'Usuario'],
            ['tipo_usuario' => 'Admin']
        ];
    }
}
