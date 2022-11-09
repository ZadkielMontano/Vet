<?php

namespace App\Models;

use Carbon\Carbon;
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


    public function specialty(){
    
        return $this->belongsTo(Specialty::class);
    }

    public function veterinario(){
    
        return $this->belongsTo(User::class);
    }

    public function  client(){
        return $this->belongsTo(User::class);
    }

    public function getScheduledTime12Attribute(){
        return (new Carbon($this->scheduled_time)) 
        ->format('g:i A');
    }

    public function cancellation(){
        return $this->hasOne(CancelledAppointment::class);
    }

}
