<?php

namespace Database\Seeders;

use App\Models\Jaksa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JaksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jaksa::factory()->count(3)->create();
    }
}
