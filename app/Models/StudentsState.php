<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Day;
use App\Models\User;

class StudentsState extends Model
{
    use HasFactory;
    protected $table ='studens_states';

    protected $fillable = [
        'id',
        'user_id',
        'hfrom',
        'hto',
        'hcount',
        'mfrom',
        'mto',
        'mcount',
        'starsCount',
        'list',
        'hasFire',
        'day_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];


    public function day()
    {

        return $this->belongTo(Day::class, 'day_id');
    }

    public function user()
    {

        return $this->belongTo(User::class, 'user_id');
    }

    public function getListAttribute($val)
    {
        return  unserialize($val);
    }
    public function setListAttribute($value)
    {
        $this->attributes['list'] = serialize($value);
    }
}
