<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Edital;

class EditalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $editais = [
            [
                'nome' => 'CHAMADA PÚBLICA – DOCENTE',
                'descricao' => 'Lorem ipsum dolor sit amet. Hic blanditiis quia quo corporis incidunt et corporis eius et distinctio reiciendis qui fuga earum. Non expedita magnam sed sint sunt rem ipsum magnam. Et obcaecati maiores rem aliquam quae et beatae molestiae sed soluta nemo est molestiae atque ut aliquam excepturi aut delectus impedit. Ut voluptatem numquam est voluptatem error aut veniam Quis.Ea nisi vero et ipsum porro aut nihil saepe qui itaque odio quo sint internos. In delectus quisquam cum deleniti rerum et placeat nobis sit vitae minus? Sed enim Quis aut consectetur doloremque eos dicta quidem? 33 tempore harum est velit voluptatem in accusantium autem aut modi harum. Texto simulado',
                'data_inicio_inscr' => '2026-06-24',
                'data_fim_inscr' => '2026-07-24',
                'data_inicio_rev' => '2026-08-24',
                'data_fim_rev' => '2026-09-24',
            ],
            [
                'nome' => 'CHAMADA PÚBLICA – DOCENTE',
                'descricao' => 'Lorem ipsum dolor sit amet. Hic blanditiis quia quo corporis incidunt et corporis eius et distinctio reiciendis qui fuga earum. Non expedita magnam sed sint sunt rem ipsum magnam. Et obcaecati maiores rem aliquam quae et beatae molestiae sed soluta nemo est molestiae atque ut aliquam excepturi aut delectus impedit. Ut voluptatem numquam est voluptatem error aut veniam Quis.Ea nisi vero et ipsum porro aut nihil saepe qui itaque odio quo sint internos. In delectus quisquam cum deleniti rerum et placeat nobis sit vitae minus? Sed enim Quis aut consectetur doloremque eos dicta quidem? 33 tempore harum est velit voluptatem in accusantium autem aut modi harum. Texto simulado',
                'data_inicio_inscr' => '2026-06-24',
                'data_fim_inscr' => '2026-07-24',
                'data_inicio_rev' => '2026-08-24',
                'data_fim_rev' => '2026-09-24',
            ],
        ];


    foreach($editais as $edital)
        Edital::create($edital);
}
}