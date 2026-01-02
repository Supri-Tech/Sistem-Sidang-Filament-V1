<?php

namespace Database\Factories;

use App\Models\Jaksa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jaksa>
 */
class JaksaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Jaksa::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'jabatan' => 'jaksa penuntut umum',
            'NIP' => $this->faker->unique()->numerify('#########'),
        ];
    }
}
