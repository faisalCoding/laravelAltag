<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Day;


class Week extends Model
{
    protected $table = 'weeks';
    protected $fillable = [
        'id',
        'name'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function day()
    {
        return $this->hasMany(Day::class);
    }

}
