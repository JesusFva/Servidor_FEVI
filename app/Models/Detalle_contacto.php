<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_contacto extends Model
{
    use HasFactory;

    public function contacto(){
        return $this->hasOne(Contacto::class, 'id', 'id_contacto');
    }
}
