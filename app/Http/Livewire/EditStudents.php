<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

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
            $teacher = Auth::user();
            $this->students =  User::where('class_id' , $teacher->class)->select('*')->distinct()->orderBy('have_table')->get()->toArray();
            $this->refStudents = false;
        }
    }

    public function editStudent()
    {
        $teacher = Auth::user();
        $d = User::where('class_id' , $teacher->class)->select('*')->distinct()->get()->toArray();
        if ($this->students != $d) {
          
            
            foreach ($this->students as $k => $student) {
                if ($student['name'] != $d[$k]['name'] || $student['scores'] != $d[$k]['scores']|| $student['have_table'] != $d[$k]['have_table']|| $student['school_level'] != $d[$k]['school_level']) {
                    User::where('id', $student['id'])->update(
                        [
                            'name' => $student['name'],
                            'scores' => $student['scores'],
                            'have_table' => $student['have_table'],
                            'school_level' => $student['school_level'],
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
        $q = User::where('id', $studentID)->delete();
        $this->refStudents = true;
        $this->emit('studentedit');
    }

    public function refreshStudentsFromDataBase()
    {
        $teacher = Auth::user();
        $this->students = User::where('class_id' , $teacher->class)->select('*')->distinct()->get()->toArray();

    }
    
    protected function getListeners()
    {
        return [
            'newstudent' => 'refreshStudentsFromDataBase',
        ];
    }
}
