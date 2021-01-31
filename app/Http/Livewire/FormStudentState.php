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
        'mto'        => 'الناس',
        'mfrom'      => 'القارعة',
        'starsCount' => [],
        'list'       =>[false,true,true],
        'hasFire'    => true,
        'day_id'      => 1,
    ];

    public $days = [];
    public $newDayName;

    
    public function render()
    {

        $this->days = Day::get();

        return view('livewire.form-student-state');
    }

    public function createUser(){
        StudensState::create( [
            'name'       => $this->studentState['name'],
            'hfrom'       => $this->studentState['hfrom'],
            'hto'       => $this->studentState['hto'],
            'mto'       => $this->studentState['mto'],
            'mfrom'       => $this->studentState['mfrom'],
            'starsCount'       => count($this->studentState['starsCount']),
            'list'       => $this->studentState['list'],
            'hasFire'       => $this->studentState['hasFire'],
            'day_id'       => $this->studentState['day_id'],
        ]);
    }
    public function newDay(){
        Day::create(['date' => $this->newDayName]);
    }
}
