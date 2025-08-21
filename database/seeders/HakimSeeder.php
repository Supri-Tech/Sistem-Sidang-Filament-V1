<?php

namespace Database\Seeders;

use App\Models\Hakim;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HakimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hakim::factory()->count(50)->create();
    }
}
