<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_domicilio extends Model
{
    use HasFactory;

    public function domicilio(){
        return $this->hasOne(Domicilio::class, 'id', 'id_domicilio');
    }
}
