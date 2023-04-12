<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMateria extends Model
{
    public function grupo(){
        return $this->hasOne(Grupo::class, 'id', 'id_grupo');
    }

    public function materia(){
        return $this->hasOne(Materia::class, 'id', 'id_materia');
    }

    public function empleado(){
        return $this->hasOne(Empleado::class, 'id', 'id_empleado');
    }

}
