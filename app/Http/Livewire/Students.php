<?php

namespace App\Http\Livewire;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\StudentsExport;

class Students extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = "";
    public $selectedClass = null;
    public $sections = null;
    public $selectedSection = null;
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;


    public function render()
    {
        return view('livewire.students', [
            'students' => $this->students,
            'classes' => Classes::all(),
        ]);
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->students->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function selectAll()
    {
        $this->selectAll = true;
        $this->checked = $this->studentsQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    public function getStudentsProperty()
    {
        return $this->studentsQuery->paginate($this->paginate);
    }

    public function getStudentsQueryProperty()
    {
        return Student::with(['class', 'section'])
            ->when($this->selectedClass, function ($query) {
                $query->where('class_id', $this->selectedClass);
            })
            ->when($this->selectedSection, function ($query) {
                $query->where('section_id', $this->selectedSection);
            })
            ->search(trim($this->search));
    }

    public function deleteRecords()
    {
        Student::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('info', 'Selected Records were deleted Successfully');
    }

    public function exportSelected()
    {
        return (new StudentsExport($this->checked))->download('students.xlsx');
    }


    public function deleteSingleRecord($student_id)
    {
        $student = Student::findOrFail($student_id);
        $student->delete();
        $this->checked = array_diff($this->checked, [$student_id]);
        session()->flash('info', 'Record deleted Successfully');
    }

    public function isChecked($student_id)
    {
        return in_array($student_id, $this->checked);
    }



    public function updatedSelectedClass($class_id)
    {
        $this->sections = Section::where('class_id', $class_id)->get();
    }
}
