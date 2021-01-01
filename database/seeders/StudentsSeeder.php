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
        Student::factory()->count(10)->forClass(['name' => 'Class 1'])
            ->forSection(['name' => 'Section A', 'class_id' => 1])
            ->create();
        // Student::factory()->count(10)->forClass(['name' => 'Class 1'])
        //     ->forSection(['name' => 'Section B', 'class_id' => 1])
        //     ->create();

        Student::factory()->count(10)->forClass(['name' => 'Class 2'])
            ->forSection(['name' => 'Section A', 'class_id' => 2])
            ->create();

        // Student::factory()->count(10)->forClass(['name' => 'Class 2'])
        //     ->forSection(['name' => 'Section B', 'class_id' => 2])
        //     ->create();
    }
}
