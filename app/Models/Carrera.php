<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    public function plantel(){
        return $this->hasOne(Plantel::class, 'id', 'id_plantel');
    }
}
