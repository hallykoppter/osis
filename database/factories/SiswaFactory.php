<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'kelas' => '7A',
            'foto' => 'default.jpg',
            'sudah_memilih' => 0,
            'pilihan' => 0,
            'NISN' => mt_rand(10000, 99999),
            'password' => Hash::make('admin')
        ];
    }
}
