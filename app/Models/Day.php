<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Week;
use App\Models\StudensState;

class Day extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function studensStates()
    {
        return $this->hasMany(StudensState::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }
}
