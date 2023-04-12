<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion_Final extends Model
{
    public function alumno(){
        return $this->hasOne(Alumno::class, 'id', 'id_alumno');
    }

    public function grupo_materia(){
        return $this->hasOne(GrupoMateria::class, 'id', 'id_grupo_materia');
    }

}
