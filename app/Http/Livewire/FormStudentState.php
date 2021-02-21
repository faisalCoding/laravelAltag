<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Day;
use App\Models\StudensState;


class FormStudentState extends Component
{
    protected $listeners = [
        'daydeleted' => '$refresh',
    ];

    public $studentState = [
        'name'       => '',
        'hfrom'      => '',
        'hto'        => '',
        'hcount'        => 0,
        'mfrom'      => '',
        'mto'        => '',
        'mcount'        => 0,
        'starsCount' => [],
        'list'       => [false,false,false],
        'hasFire'    => false,
        'day_id'      => 1,
    ];

    public $days = [];
    public $studentSlected = [
        'refresh' => true,
        'name' => null
    ];
    public $newDayName;
    public $names;
    public $selected =true;


    public function render()
    {

        $this->days = Day::all()->sortByDesc('date');
        $this->getStudents();
        $this->setStudentSelected();
        


        

        return view('livewire.form-student-state');
    }

    public function createUser()
    {   
        $count = 0;

        // foreach( $this->studentState['starsCount'] as $boolean){
        //     $boolean?$count++:null;
        // }
        StudensState::create([
            'name'       => $this->studentState['name'],
            'hfrom'       => $this->studentState['hfrom'],
            'hto'       => $this->studentState['hto'],
            'hcount'        => $this->studentState['hcount'],
            'mfrom'       => $this->studentState['mfrom'],
            'mto'       => $this->studentState['mto'],
            'mcount'        => intval($this->studentState['mcount']),
            'starsCount'       => intval($this->studentState['starsCount']),
            'list'       => $this->studentState['list'],
            'hasFire'       => $this->studentState['hasFire'],
            'day_id'       => $this->studentState['day_id'],
        ]);
            
        dd( $this->studentState);
        
    }
    public function newDay()
    {
        Day::create(['date' => $this->newDayName]);

        $this->emit('newday');
    }

    public function getStudents()
    {
        $this->names =  StudensState::select('name')->distinct()->get() ;
    }

    public function selectChang()
    {
        $this->studentSlected['refresh'] =  true;
    }

    public function setStudentSelected()
    {
        if ($this->studentSlected['name'] && $this->studentSlected['refresh']) {
            $this->studentState = StudensState::orderBy('created_at','desc')->where('name',$this->studentSlected['name'])->first()->toArray();
            $this->studentSlected['refresh'] =false;
        }
       
        
    }

}
