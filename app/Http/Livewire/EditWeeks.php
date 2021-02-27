<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Week;


class EditWeeks extends Component
{
    public $weeks = [];
    public $refWeeks = true;

    protected $listeners = [
        'newweek' => '$refresh',
    ];

    public function render()
    {

        $this->initRefWeeks();
        // $this->dayDate = Day::select('date')->get();

        return view('livewire.edit-weeks');
    }

    protected $rules = [
        'weeks.*.id' => 'required',
    ];

    public function initRefWeeks()
    {
        if ($this->refWeeks) {
            $this->weeks = Week::all()->toArray();
            $this->refWeeks = false;
        }
    }

    public function editWeek()
    {
        $d = Week::all()->toArray();
        if ($this->weeks != $d) {
            
            foreach ($this->weeks as $k => $week) {
                if ($week['name'] != $d[$k]['name']) {
                    Week::where('id', $week['id'])->update(
                        [
                            'name' => $week['name'],
                        ]
                    );
                }
            }
            $this->refWeeks = true;
            $this->emit('weekedit');
        }
    }
    public function deleteWeek($weekID)
    {
        $q = Week::where('id', $weekID)->delete();
        $this->refWeeks = true;
        $this->emit('weekedit');
    }

    public function refreshWeeksFromDataBase()
    {
        $this->weeks = Week::all()->toArray();

    }
    
    protected function getListeners()
    {
        return [
            'newweek' => 'refreshWeeksFromDataBase',
        ];
    }
}
