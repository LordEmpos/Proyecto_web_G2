<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitacion';

    public function reservas(){
        return $this->hasMany(reserva::class);
    }
    
    public function hotel(){
        return $this->belongsTo(hotel::class);
    }
}
