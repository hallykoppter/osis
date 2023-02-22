<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calon>
 */
class CalonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama1' => $this->faker->name(),
            'nama2' => $this->faker->name(),
            'nomor' => mt_rand(1, 3),
            'visi_misi' => $this->faker->paragraph(),
            'foto' => 'calon.jpg',
            'warna' => '#4ad6d9',
            'jumlah_suara' => 0,
        ];
    }
}
