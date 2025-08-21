<?php

namespace Database\Seeders;

use App\Models\Perkara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerkaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perkara::factory()->count(50)->create();
    }
}
