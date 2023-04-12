<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia_alumno extends Model
{
    use HasFactory;

    public function alumno(){
        return $this->hasOne(Alumno::class, 'id', 'id_alumno');
    }
}
