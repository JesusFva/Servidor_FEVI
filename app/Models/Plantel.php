<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantel extends Model
{
    use HasFactory;

    public function empleado(){
        return $this->hasOne(Empleado::class, 'id', 'id_empleado');
    }
}
