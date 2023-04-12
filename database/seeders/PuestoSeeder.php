<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        FacadesDB::table('puestos')->insert([
            'nombre_puesto' => ('Administrador'),
            'descripcion' => ('Administra'),
        ]);

        FacadesDB::table('puestos')->insert([
            'nombre_puesto' => ('Control Escolar'),
            'descripcion' => ('Dirige'),
        ]);

        FacadesDB::table('puestos')->insert([
            'nombre_puesto' => ('Profesor'),
            'descripcion' => ('Enseña'),
        ]);
        
        
    }
}
