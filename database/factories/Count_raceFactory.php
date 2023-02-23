<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Count_raceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'calon_1' => mt_rand(1,100),
            'calon_2' => mt_rand(1,150),
            'calon_3' => mt_rand(1,200)
        ];
    }
}
