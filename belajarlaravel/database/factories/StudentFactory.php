<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>$this->faker->name,
            'email'=>$this->faker->email,
            'phone' =>$this->faker->numberBetween(2222222222,8888888888),
            'student_number' =>$this->faker->numberBetween('2222222.88888888'),
            'age' =>$this->faker->numberBetween('111,999'),
            
        ];
    }
}
