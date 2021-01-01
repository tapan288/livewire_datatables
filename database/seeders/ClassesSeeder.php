<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classes::create([
            'name' => 'Class 1',
        ]);
        Classes::create([
            'name' => 'Class 2',
        ]);
        Classes::create([
            'name' => 'Class 3',
        ]);
        Classes::create([
            'name' => 'Class 4',
        ]);
    }
}
