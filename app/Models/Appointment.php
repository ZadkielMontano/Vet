<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;


    protected $fillable = [
    
        'scheduled_date',
        'scheduled_time',
        'type',
        'description',
        'veterinario_id',
        'client_id',
        'specialty_id',        
    ];
}
