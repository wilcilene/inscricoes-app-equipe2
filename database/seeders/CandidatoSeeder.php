<?php

namespace Database\Seeders;

use App\Models\Candidato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatoSeeder extends Seeder
{
    //mudar para ficar no modelo como o editalseeder, para fazer um exemplo
    public function run(): void
    {
        $candidatos= Candidato::factory()->make()->toArray();

        foreach ($candidatos as $candidato) {
            Candidato::create($candidato);
        }
    }
}
