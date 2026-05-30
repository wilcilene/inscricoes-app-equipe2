<?php

namespace Database\Factories;

use App\Models\Edital;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Edital>
 */
class EditalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                'nome' => $this->faker->sentence(3),
                'descricao' => $this->faker->paragraph(2),
                'data_inicio_inscr' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'data_fim_inscr' => $this->faker->dateTimeBetween('+1 month', '+2 months')->format('Y-m-d'),
                'data_inicio_rev' => $this->faker->dateTimeBetween('+2 months', '+3 months')->format('Y-m-d'),
                'data_fim_rev' => $this->faker->dateTimeBetween('+3 months', '+4 months')->format('Y-m-d'),
            ],
        ];
    }
}
