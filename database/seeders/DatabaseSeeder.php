<?php

namespace Database\Seeders;

use App\Models\Student;
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
        // \App\Models\User::factory(10)->create();
        // Student::factory()->count(10)
        //     ->create();
        // Student::factory()->count(10)->forClass(['name' => 'Class 1'])
        //     ->forSection(['name' => 'Section B', 'class_id' => 1])
        //     ->create();

        // Student::factory()->count(10)->forClass(['name' => 'Class 2'])
        //     ->forSection(['name' => 'Section A', 'class_id' => 2])
        //     ->create();

        // Student::factory()->count(10)->forClass(['name' => 'Class 2'])
        //     ->forSection(['name' => 'Section B', 'class_id' => 2])
        //     ->create();
        $this->call(ClassesSeeder::class);
        $this->call(SectionsSeeder::class);
    }
}
