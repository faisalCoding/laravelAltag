<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Day;
use App\Models\Week;
use App\Models\User;
use App\Models\StudentsState;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Auth;

class FormStudentState extends Component
{
    protected $listeners = [
        'daydeleted' => '$refresh',
        'studentedit' => '$refresh',
    ];

    public $studentState = [
        'name' => 'لم يعين',
        'user_id'       => '1',
        'hfrom'      => '',
        'hto'        => '',
        'hcount'        => 0,
        'mfrom'      => '',
        'mto'        => '',
        'mcount'        => 0,
        'starsCount' => [],
        'list'       => [false, false, false],
        'hasFire'    => false,
        'day_id'      => 1,
    ];

    public $days = [];
    public $studentSlected_refresh = false;
    public $studentSlected_name = null;
    public $newDayName;
    public $newWeekName;
    public $newStudentName;
    public $names;
    public $selected = true;


    public function mount()
    {

      
    }

    public function render()
    {


        $this->days = Day::all()->sortByDesc('date');
        $this->getStudents();
        $this->setStudentSelected();



        return view('livewire.form-student-state');
    }

    public function createUser()
    {

        StudentsState::create([
            'user_id'       => $this->studentState['user_id'],
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
        $this->emit('newstudentsState');
        //dd( $this->studentState);

    }
    public function newDay()
    {
        Day::create(['date' => $this->newDayName]);

        $this->emit('newday');
    }
    public function newWeek()
    {
        Week::create(['name' => $this->newWeekName]);

        $this->emit('newweek');
    }

    public function newStudent()
    {

        $factory = new UserFactory();
        $teacher = Auth::user();
        User::create($factory->definition($this->newStudentName, $teacher->class));

        $this->emit('newstudent');
    }

    public function getStudents()
    {
        $teacher = Auth::user();
        $this->names =  User::where('class_id', $teacher->class)->select('name')->distinct()->get()->toArray();
    }

    public function selectChang()
    {
        $this->studentSlected_refresh =  true;
    }

    public function setStudentSelected()
    {
        if ($this->studentSlected_name && $this->studentSlected_refresh) {
           
            $getUser =  User::where('name', $this->studentSlected_name)->first();


            if ($getUser->studentsStates()->count()) {
                $this->studentState = $getUser->studentsStates()->orderBy('created_at', 'desc')->first()->toArray();
                $this->studentState['name'] = $getUser->name;
                $this->studentState['user_id'] = $getUser->id;
            } else {

                $this->studentState = [
                    'name' => $getUser->name,
                    'user_id'       =>  $getUser->id,
                    'hfrom'      => '',
                    'hto'        => '',
                    'hcount'        => 0,
                    'mfrom'      => '',
                    'mto'        => '',
                    'mcount'        => 0,
                    'starsCount' => [],
                    'list'       => [false, false, false],
                    'hasFire'    => false,
                    'day_id'      => 1,
                ];
            }
            $this->studentSlected_refresh = false;
        }
    }
}
