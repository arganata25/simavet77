<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => null, // nanti diisi dari seeder
            'nama' => $this->faker->name(),
            'doc_ktp' => $this->faker->boolean(70), // 70% sudah upload
            'doc_kk' => $this->faker->boolean(60),
            'doc_nisn' => $this->faker->boolean(50),
        ];
    }
}