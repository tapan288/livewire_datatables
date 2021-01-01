<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'name' => 'Section A',
            'class_id' => 1,
        ]);
        Section::create([
            'name' => 'Section B',
            'class_id' => 1,
        ]);

        Section::create([
            'name' => 'Section A',
            'class_id' => 2,
        ]);
        Section::create([
            'name' => 'Section B',
            'class_id' => 2,
        ]);
    }
}
