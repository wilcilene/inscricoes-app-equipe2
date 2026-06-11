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
        $candidatos=[
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

        foreach ($candidatos as $candidato) {
            Candidato::create($candidato);
        }
    }
}
