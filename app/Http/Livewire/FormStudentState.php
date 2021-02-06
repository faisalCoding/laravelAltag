<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Day;
use App\Models\StudensState;


class FormStudentState extends Component
{

    public $studentState = [
        'name'       => 'ابو لايف واير',     
        'hfrom'      => 'الفلق',
        'hto'        => 'الناس',
        'hcount'        => 5,
        'mfrom'      => 'القارعة',
        'mto'        => 'الناس',
        'mcount'        => 11,
        'starsCount' => [],
        'list'       => [false,false,true],
        'hasFire'    => false,
        'day_id'      => 1,
    ];

    public $days = [];
    public $newDayName;


    public function render()
    {

        $this->days = Day::all()->sortByDesc('date');


        

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
    }
}
