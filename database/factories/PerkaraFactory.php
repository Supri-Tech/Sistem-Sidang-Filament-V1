<?php

namespace Database\Factories;

use App\Models\Perkara;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perkara>
 */
class PerkaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Perkara::class;

    public function definition(): array
    {
        return [
            'no_perkara' => strtoupper($this->faker->bothify('PRK-####/2025')),
            'jenis_perkara' => $this->faker->randomElement(['Pidana', 'Perdata', 'Tipikor', 'Tata Usaha Negara']),
            'email_terdakwa' => fake()->unique()->safeEmail(),
            'wa_terdakwa' => fake()->unique()->phoneNumber(),
            'terdakwa' => $this->faker->name(),
            'korban' => $this->faker->name(),
            'email_korban' => fake()->unique()->safeEmail(),
            'wa_korban' => fake()->unique()->phoneNumber(),
            'status' => $this->faker->randomElement(['aktif', 'ditutup', 'banding', 'kasasi'])
        ];
    }
}
