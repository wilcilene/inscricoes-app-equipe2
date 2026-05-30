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
        $roles = Edital::factory()->count(10)->make();

        foreach ($roles as $role) {
            Edital::create($role);
        }
    }
}
