<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'class_name',
        'class_level',
    ];
}
