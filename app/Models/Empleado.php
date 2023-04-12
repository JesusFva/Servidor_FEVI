<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    //1:18:41
    
    public function contacto(){
        return $this->hasOne(Contacto::class, 'id', 'id_contacto');
    }

    public function puesto(){
        return $this->hasOne(Puesto::class, 'id', 'id_puesto');
    }

}
