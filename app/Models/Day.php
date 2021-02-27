<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Week;
use App\Models\StudentsState;

class Day extends Model
{
    use HasFactory;

    protected $fillable = ['date','week_id', 'id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function studentsStates()
    {
        return $this->hasMany(StudentsState::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }
}
