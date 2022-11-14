<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    use HasFactory;

    protected $fillable =[
        'day',
        'active',
        'morning_start',
        'morning_end',
        'afteroon_start',
        'afteroon_end',
        'user_id'
    
    ];
}
