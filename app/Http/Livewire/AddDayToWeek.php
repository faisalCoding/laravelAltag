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
        if (is_array($this->weeksSelected) || is_object($this->weeksSelected)) {
            foreach ($this->weeksSelected as $key => $value) {

                Day::where('id', $this->days[$key]['id'])
                    ->update([
                        'week_id' => $value,
                        'date' =>  $this->dayDate[$key]
                    ]);
            }
        }
        $this->days = Day::all()->sortByDesc('date')->toArray();

        $this->refWeeks = true;
        $this->refDays = true;
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
        if ($this->weeks == Week::all()->toArray()) {
            $d = Day::all()->sortByDesc('date')->toArray();

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
        }
    }

    public function fun_newday()
    {
        $this->days = Day::all()->sortByDesc('date')->toArray();

    }

    protected function getListeners()
    {
        return ['newday' => 'fun_newday'];
    }
}
