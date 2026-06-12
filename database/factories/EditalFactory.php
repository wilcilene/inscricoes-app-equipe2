<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EditalFactory extends Factory
{
    public function definition(): array
    {
        return [
            [
                'nome' => 'CHAMADA PÚBLICA – DOCENTE',
                'descricao' => 'Lorem ipsum dolor sit amet...',
                'data_inicio_inscr' => '2026-06-24',
                'data_fim_inscr' => '2026-07-24',
                'data_inicio_rev' => '2026-08-24',
                'data_fim_rev' => '2026-09-24',
            ],
            [
                'nome' => 'CHAMADA PÚBLICA – DOCENTE',
                'descricao' => 'Lorem ipsum dolor sit amet...',
                'data_inicio_inscr' => '2026-06-24',
                'data_fim_inscr' => '2026-07-24',
                'data_inicio_rev' => '2026-08-24',
                'data_fim_rev' => '2026-09-24',
            ],
        ];
    }
}