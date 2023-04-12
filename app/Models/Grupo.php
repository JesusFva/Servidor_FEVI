<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    public function carrera(){
        return $this->hasOne(Carrera::class, 'id', 'id_carrera');
    }

    public function cuatrimestre(){
        return $this->hasOne(Cuatrimestre::class, 'id', 'id_cuatrimestre');
    }

    public function empleado(){
        return $this->hasOne(Empleado::class, 'id', 'id_empleado');
    }
}
