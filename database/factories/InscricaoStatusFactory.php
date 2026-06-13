<?php

namespace Database\Factories;

use App\Models\InscricaoStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<InscricaoStatus>
 */
class InscricaoStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            ['status' => 'Homologado'],
            ['status' => 'Não homologado'],
            ['status' => 'Em análise'],
        ];
    }
}
