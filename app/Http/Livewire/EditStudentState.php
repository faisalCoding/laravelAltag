<?php

namespace App\Http\Livewire;

use App\Models\StudentsState;
use PDOException;


use App\Models\Day;
//use App\Models\Student;
use Livewire\Component;

class EditStudentState extends Component
{

    protected $listeners = [
        'daydeleted' => '$refresh',
        'newstudentsState' => '$refresh',
        'StudentsStateUpadate' => '$refresh',
        'newday' => '$refresh',

    ];

    public $studentState = [
        'user_id'       => '1',
        'hfrom'      => 'd',
        'hto'        => 'dd',
        'hcount'        => 0,
        'mfrom'      => 'da',
        'mto'        => 'd',
        'mcount'        => 1258,
        'starsCount' => [],
        'list'       => [false,false,false],
        'hasFire'    => false,
        'day_id'      => 1,
    ];

    public $studentStates;

    public $refStudentsStates = true;



    public $days = [];
    public $studentSlected = [
        'refresh' => true,
        'name' => null
    ];

    public $selectId;
    public $selected =true;


    public function render()
    {

        $this->days = Day::all()->sortByDesc('date');

        $this->initStudentsStates();
        
        return view('livewire.edit-student-state');
    }

    public function initStudentsStates()
    {
        if ($this->refStudentsStates) {
            $this->studentStates = StudentsState::all()->toArray();
            $this->refStudentsStates = false;
        }
    }

    public function update()
    {   

        try{
            StudentsState::where('id', $this->selectId)->update([
                'user_id'       => $this->studentState['user_id'],
                'hfrom'       => $this->studentState['hfrom'],
                'hto'       => $this->studentState['hto'],
                'hcount'        => $this->studentState['hcount'],
                'mfrom'       => $this->studentState['mfrom'],
                'mto'       => $this->studentState['mto'],
                'mcount'        => intval($this->studentState['mcount']),
                'starsCount'       => intval($this->studentState['starsCount']),
                'list'       => serialize($this->studentState['list']),
                'hasFire'       => $this->studentState['hasFire'],
                'day_id'       => $this->studentState['day_id'],
            ]);
             session()->flash('edit-successful');
        }catch(PDOException $e){
            session()->flash('edit-error');

        }

        $this->emit('StudentsStateUpadate');
    }
    public function select($index)
    {
        $this->selectId = $this->studentStates[$index]['id'];
        $this->studentState = [
            'user_id'       => $this->studentStates[$index]['user_id'],
            'hfrom'      => $this->studentStates[$index]['hfrom'],
            'hto'        => $this->studentStates[$index]['hto'],
            'hcount'        => $this->studentStates[$index]['hcount'],
            'mfrom'      => $this->studentStates[$index]['mfrom'],
            'mto'        => $this->studentStates[$index]['mto'],
            'mcount'        => $this->studentStates[$index]['mcount'],
            'starsCount' => $this->studentStates[$index]['starsCount'],
            'list'       => $this->studentStates[$index]['list'],
            'hasFire'    => $this->studentStates[$index]['hasFire'],
            'day_id'      => $this->studentStates[$index]['day_id'],
        ];
    }

    public function deleteStudentState($id)
    {
        $q = StudentsState::where('id', $id)->delete();
        $this->refStudentsStates = true;
        session()->flash('delete-successful');
        $this->emit('studentStateDeleted');
    }

    public function refreshStudentStateFromDataBase()
    {
        $this->studentStates = StudentsState::all()->toArray();
        
    }


    protected function getListeners()
    {
        return [
            'newstudentsState' => 'refreshStudentStateFromDataBase',
            'StudentsStateUpadate' => 'refreshStudentStateFromDataBase',
        ];
    }
}