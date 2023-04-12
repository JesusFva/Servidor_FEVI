<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    public function grupo(){
        return $this->hasOne(Grupo::class, 'id', 'id_grupo');
    }

    public function carrera(){
        return $this->hasOne(Carrera::class, 'id', 'id_carrera');
    }

    public function plantel(){
        return $this->hasOne(Plantel::class, 'id', 'id_plantel');
    }

}
