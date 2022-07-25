<?php

namespace Database\Seeders;

use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Post::factory(10)->create();
          \App\Models\Student::factory(100)->create();
          \app\Models\Employee::factory(100)->create();
    }
}
