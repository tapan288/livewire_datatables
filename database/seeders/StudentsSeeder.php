<?php

namespace Database\Seeders;

use App\Models\Student;
use Database\Factories\StudentFactory;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Student::factory()->count(10)->create();
    }
}
