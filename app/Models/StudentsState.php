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
    protected $appends =['name'];

    protected $fillable = [
        'id',
        'name',
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

        return $this->belongsTo(Day::class, 'day_id');
    }

    public function user()
    {
        
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getListAttribute($val)
    {
        return  unserialize($val);
    }
    public function getNameAttribute($val)
    {
        return  $this->user()->get()->toArray()[0]['name'];
    }
    public function setListAttribute($value)
    {
        $this->attributes['list'] = serialize($value);
    }
}
