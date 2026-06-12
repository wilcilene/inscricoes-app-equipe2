<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Edital;

class EditalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $editais = Edital::factory()->make()->toArray();


    foreach($editais as $edital)
        Edital::create($edital);
}
}