<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cedula',
        'address',
        'phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot'
    ];

    public function specialties(){
        return $this->belongsToMany(Specialty::class)->withTimestamps();
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeVeterinario($query){
        return $query->where('role', 'veterinario');
    }

    public function scopeClient($query){
        return $query->where('role', 'cliente');
    }


    public function asVetsAppointments(){
            return $this->hasMany(Appointment::class, 'veterinario_id');
    }

    public function attendedAppointments(){
            return $this->asVetsAppointments()->where('status','Atendida');
    }

    public function cancellAppointments(){
        return $this->asVetsAppointments()->where('status','Cancelada');
}

    public function asClientAppointments(){
        return $this->hasMany(Appointment::class, 'client_id');
}

}
