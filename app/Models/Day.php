<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\StudensState;

class Day extends Model
{
    use HasFactory;

    protected $fillable = ['date'];
    protected $hidden = ['created_at', 'updated_at', 'id'];

    public function studensStates()
    {
        return $this->hasMany(StudensState::class);
    }
}
