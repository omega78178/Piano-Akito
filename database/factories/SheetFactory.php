<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SheetFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(2), // Fake song title
            'difficulty' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
            // Gebruik een dummy pdf-bestandspad, of genereer een testbestand
            'pdf' => 'sheets/' . $this->faker->uuid . '.pdf',
        ];
    }
}
