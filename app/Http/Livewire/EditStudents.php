<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;


class EditStudents extends Component
{
    public $students = [];
    public $refStudents = true;

    protected $listeners = [
       'newstudent' => '$refresh',
    ];

    public function render()
    {

        $this->initRefStudents();
        // $this->dayDate = Day::select('date')->get();

        return view('livewire.edit-students');
    }

    protected $rules = [
        'students.*.id' => 'required',
    ];

    public function initRefStudents()
    {
        if ($this->refStudents) {
            $this->students = Student::all()->toArray();
            $this->refStudents = false;
        }
    }

    public function editStudent()
    {
        $d = Student::all()->toArray();
        if ($this->students != $d) {
            
            foreach ($this->students as $k => $student) {
                if ($student['name'] != $d[$k]['name'] || $student['scores'] != $d[$k]['scores']) {
                    Student::where('id', $student['id'])->update(
                        [
                            'name' => $student['name'],
                            'scores' => $student['scores'],
                        ]
                    );
                }
            }
            $this->refStudents = true;
            $this->emit('studentedit');
        }
    }
    public function deleteStudent($studentID)
    {
        $q = Student::where('id', $studentID)->delete();
        $this->refStudents = true;
        $this->emit('studentedit');
    }

    public function refreshStudentsFromDataBase()
    {
        $this->students = Student::all()->toArray();

    }
    
    protected function getListeners()
    {
        return [
            'newstudent' => 'refreshStudentsFromDataBase',
        ];
    }
}
