<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Control Escolar']);
        $role3 = Role::create(['name' => 'Profesor']);
        $role4 = Role::create(['name' => 'Alumno']);

        //Permisos para Administrador en empleado 
        Permission::create(['name' => 'empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'create.empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'visualizar.empleado'])->syncRoles([$role1]);




        //Permisos para Administrador && Control Escolar en contacto
        Permission::create(['name' => 'contacto'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'create.contacto'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'editar.contacto'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'eliminar.contacto'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'visualizar.contacto'])->syncRoles([$role1,$role2,$role3,$role4]);


        //Permisos para Administrador,Control Escolar,profesor y alumno en cuatrimestre
        Permission::create(['name' => 'cuatrimestre'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'create.cuatrimestre'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'editar.cuatrimestre'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'eliminar.cuatrimestre'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'visualizar.cuatrimestre'])->syncRoles([$role1,$role2,$role3,$role4]);


         //Permisos para Administrador,Control Escolar,profesor y alumno en puesto
        Permission::create(['name' => 'puesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'create.puesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.puesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.puesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'visualizar.puesto'])->syncRoles([$role1]);

        //Permisos para Administrador,Control Escolar,profesor y alumno en domicilio
        Permission::create(['name' => 'domicilio'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'create.domicilio'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'editar.domicilio'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'eliminar.domicilio'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'visualizar.domicilio'])->syncRoles([$role1,$role2,$role3,$role4]);

        //Permisos para Administrador,Control Escolar tipo asistencia
        Permission::create(['name' => 'tipo_asistencia'])->syncRoles([$role1]);
        Permission::create(['name' => 'create.tipo_asistencia'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.tipo_asistencia'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.tipo_asistencia'])->syncRoles([$role1]);
        Permission::create(['name' => 'visualizar.tipo_asistencia'])->syncRoles([$role1]);

        //Permisos para Administrador plantel
        Permission::create(['name' => 'plantel'])->syncRoles([$role1]);
        Permission::create(['name' => 'create.plantel'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'editar.plantel'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'eliminar.plantel'])->syncRoles([$role1]);
        Permission::create(['name' => 'visualizar.plantel'])->syncRoles([$role1,$role2]);

         //Permisos para Administrador y Control Escolar carrera
        Permission::create(['name' => 'carrera'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'create.carrera'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'editar.carrera'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'eliminar.carrera'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'visualizar.carrera'])->syncRoles([$role1,$role2]);

        //Permisos para Administrador y Control Escolar grupo
        Permission::create(['name' => 'grupo'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'create.grupo'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'editar.grupo'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'eliminar.grupo'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'visualizar.grupo'])->syncRoles([$role1,$role2,$role3,$role4]);

        //Permisos para Administrador y Control Escolar alumno
        Permission::create(['name' => 'alumno'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'create.alumno'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'editar.alumno'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'eliminar.alumno'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'visualizar.alumno'])->syncRoles([$role1,$role2,$role3,$role4]);
        
        //Permisos para Administrador y Profesor alumno
        Permission::create(['name' => 'asistencia'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'create.asistencia'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'editar.asistencia'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'eliminar.asistencia'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'visualizar.asistencia'])->syncRoles([$role1,$role3]);

        
    }
}
