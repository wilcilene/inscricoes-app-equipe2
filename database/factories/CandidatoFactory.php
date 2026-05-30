<?php

namespace Database\Factories;

use App\Models\Candidato;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Candidato>
 */
class CandidatoFactory extends Factory
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
                'cpf' => $this->faker->numerify('###.###.###-##'),
                'nome_social' => $this->faker->name(),
                'genero' => $this->faker->randomElement(['Masculino', 'Feminino', 'Não binário', 'Prefiro não informar']),
                'naturalidade' => $this->faker->city(),
                'mae' => $this->faker->name('female'),
                'cep' => $this->faker->numerify('#####-###'),
                'logradouro' => $this->faker->streetName(),
                'numero' => $this->faker->numerify('####'),
                'complemento' => $this->faker->optional()->secondaryAdress(),
                'bairro' => $this->faker->citySuffix(),
                'estado' => $this->faker->stateAbbr(),
                'telefone' => $this->faker->numerify('(##) #####-####'),
                'cidade' => $this->faker->city(),
                'data_nascimento' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
                'usuario_id' =>  1,
            ],
        ];
    }
}
