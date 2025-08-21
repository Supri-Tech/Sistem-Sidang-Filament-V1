<?php

namespace Database\Factories;

use App\Models\Hakim;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hakim>
 */
class HakimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Hakim::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'jabatan' => $this->faker->randomElement([
                'hakim ketua',
                'hakim anggota',
                'panitera pengganti'
            ]),
            'NIP' => $this->faker->unique()->numerify('#########')
        ];
    }
}
