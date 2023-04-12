<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    
    public function grupo(){
        return $this->hasOne(Grupo::class, 'id', 'id_grupo');
    }
}
