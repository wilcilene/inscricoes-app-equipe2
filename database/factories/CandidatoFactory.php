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
             'cpf'=>'12345678900', 
             'data_nascimento'=>'2003/06/28', 
             'nome_social'=>'Jorge', 
             'genero'=>'Masculino', 
             'naturalidade'=>'SP', 
             'mae'=>'Katrina Silva', 
             'cep'=>'99282580', 
             'logradouro'=>'rua das flores', 
             'numero'=>'120', 
             'complemento'=>'nao tem', 
             'bairro'=>'boa vista', 
             'estado'=>'SP', 
             'telefone'=>'11988532769', 
             'cidade'=>'sao sebastiao', 
             'usuario_id'=> 1,
            ],
           [
             'cpf'=>'00000232130', 
             'data_nascimento'=>'2003/01/30', 
             'nome_social'=>'Maria', 
             'genero'=>'Feminino', 
             'naturalidade'=>'SC', 
             'mae'=>'Lurdes Souza', 
             'cep'=>'00225801', 
             'logradouro'=>'rua das margaridas', 
             'numero'=>'154', 
             'complemento'=>'nao tem', 
             'bairro'=>'Centro', 
             'estado'=>'SC', 
             'telefone'=>'11988115352', 
             'cidade'=>'sao bernardo', 
             'usuario_id'=> 2,
           ],
        ];
    }
}