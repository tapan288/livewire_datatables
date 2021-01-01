<?php

namespace App\Http\Livewire;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = "";
    public $selectedClass = null;
    public $sections = null;
    public $selectedSection = null;
    public $checked = [];


    public function render()
    {
        return view('livewire.students', [
            'students' => Student::with(['class', 'section'])
                ->when($this->selectedClass, function ($query) {
                    $query->where('class_id', $this->selectedClass);
                })
                ->when($this->selectedSection, function ($query) {
                    $query->where('section_id', $this->selectedSection);
                })
                ->search(trim($this->search))
                ->paginate($this->paginate),
            'classes' => Classes::all(),
        ]);
    }

    public function deleteRecords()
    {
        // dd($this->checked);
        Student::whereKey($this->checked)->delete();
        $this->checked = [];
        session()->flash('info', 'Selected Records were deleted Successfully');
    }

    public function deleteSingleRecord($student_id)
    {
        $student = Student::findOrFail($student_id);
        $student->delete();
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
