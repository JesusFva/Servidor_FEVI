<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    public function alumno(){
        return $this->hasOne(Plantel::class, 'id', 'id_alumno');
    }

    public function tipo_asistencia(){
        return $this->hasOne(Tipo_asistencia::class, 'id', 'id_tipo_asistencia');
    }

    public function grupo(){
        return $this->hasOne(Grupo::class, 'id', 'id_grupo');
    }

    public function materia(){
        return $this->hasOne(Materia::class, 'id', 'id_materia');
    }
}
