<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Day;
use App\Models\Week;

class AddDayToWeek extends Component
{
    public $days = [];
    public $dayID = [];
    public $dayDate;
    public $weeks = [];
    public $weeksSelected;
    public $dateChange;
    public $refWeeks = true;
    public $refDays  = true;

    public $handelChnge = [
        'week' => [],
        'day' => []
    ];


    protected $listeners = [
        'daydeleted' => '$refresh',
        'newday' => '$refresh',
        'newweek' => '$refresh',
        'weekedit' => '',
    ];

    public function render()
    {

        $this->initRefDays();
        $this->initRefWeeks();
        // $this->dayDate = Day::select('date')->get();

        return view('livewire.add-day-to-week');
    }

    public function updateDayToWeek($day)
    {
        $d = Day::all()->sortByDesc('date')->toArray();
        if ($this->weeks != Week::all()->toArray() || $this->days != $d) {
            foreach ($this->days as $k => $day) {
                if ($day['week_id'] != $d[$k]['week_id'] || $day['date'] != $d[$k]['date']) {
                    Day::where('id', $day['id'])->update(
                        [
                            'week_id' => $day['week_id'],
                            'date' => $day['date'],
                        ]
                    );
                }
            }
            $this->refDays = true;
            $this->refWeeks = true;
            $this->emit('daydeleted');
        }
    }

    protected $rules = [
        'weeks.*.id' => 'required',
        'dayDate.*.date' => 'required',
    ];

    public function deleteDay($dayID)
    {
        $q = Day::where('id', $dayID)->delete();
        $this->refDays = true;
        $this->refWeeks = true;
        $this->emit('daydeleted');
    }

    public function initRefDays()
    {
        if ($this->refDays) {
            $this->days = Day::all()->sortByDesc('date')->toArray();
            $this->refDays = false;
        }
    }
    public function initRefWeeks()
    {
        if ($this->refWeeks) {
            $this->weeks = Week::all()->toArray();


            $this->refWeeks = false;
        }
    }

    public function handelChnge()
    {
   
    }

    public function refreshDaysFromDataBase()
    {
        $this->days = Day::all()->sortByDesc('date')->toArray();
    }
    public function refreshWeeksFromDataBase()
    {
        $this->weeks = Week::all()->toArray();
        
    }


    protected function getListeners()
    {
        return [
            'newday' => 'refreshDaysFromDataBase',
            'newweek' => 'refreshWeeksFromDataBase',
            'weekedit' => 'refreshWeeksFromDataBase',
        ];
    }
}
