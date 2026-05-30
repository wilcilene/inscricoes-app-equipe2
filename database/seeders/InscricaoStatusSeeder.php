<?php

namespace Database\Seeders;

use App\Models\InscricaoStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InscricaoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = InscricaoStatus::factory()->make()->toArray();

        foreach ($roles as $role) {
            InscricaoStatus::create($role);
        }
    }
}
