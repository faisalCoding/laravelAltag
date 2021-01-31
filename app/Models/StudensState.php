<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Day;


class StudensState extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'  ,    
'hfrom'     ,
'hto'       ,
'mfrom'     ,
'mto',
'starsCount',
'list'      ,
'hasFire'   ,
'day_id'
    ];

    protected $hidden =['created_at','updated_at','id',];


    public function day()
    {
        
        return $this->belongTo(Day::class);
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
