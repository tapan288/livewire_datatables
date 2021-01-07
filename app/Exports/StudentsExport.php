<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class StudentsExport implements
    FromQuery
{
    use Exportable;
    protected $students;

    public function __construct($students)
    {
        $this->students = $students;
    }

    public function query()
    {
        return Student::query()->whereKey($this->students);
    }
}
