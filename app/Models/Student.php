<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $appends=['mcount'];
    protected $fillable = [
        'id',
        'name',
        'have_table',
        'school_level',
        'scores',
    ];

    
    protected $hidden = ['created_at', 'updated_at'];
      public function getMcountAttribute($val){

    return ;
    }
}
