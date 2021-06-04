<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Day;
use App\Models\Week;
use App\Models\Student;
use App\Models\StudentsState;

class ChartsController extends Controller
{


    public function fiveTopMaxMStudents()
    {
        // return Student::addSelect([
        //     'mm' => StudentsState::sum('mcount')
        // ])->get();

        return Student::select('name')->addSelect([
            "a" => 'a'
        ])->get();
    }
}
