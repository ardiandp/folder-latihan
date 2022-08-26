<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim'=>$this->faker->numberBetween('11111111.55555555'),
            'nama_mahasiswa'=>$this->faker->name(),
            'email'=>$this->faker->unique()->safeEmail(),
            'kode_jurusan'=>$this->faker->numberBetween('11,15'),
            'alamat'=>$this->faker->address(),
        ];
    }
}
