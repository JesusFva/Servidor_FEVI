<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    public function plantel(){
        return $this->hasOne(Plantel::class, 'id', 'id_alumno');
    }

    public function grupo(){
        return $this->hasOne(Grupo::class, 'id', 'id_grupo');
    }

    public function materia(){
        return $this->hasOne(Materia::class, 'id', 'id_materia');
    }

}
