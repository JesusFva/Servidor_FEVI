<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Calificaciones;
use App\Models\Carrera;
use App\Models\Cuatrimestre;
use App\Models\Grupo;
use App\Models\GrupoMateria;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class CalificacionesController extends Controller
{
    public function index()
    {
        $perfilLogin =  auth()->user()->perfil;
        $materias = Materia::all();
        $grupos = Grupo::all();
        $vol = 0;

        if($perfilLogin == "Control Escolar"){
            
            $mensaje = "Eres Control Escolar, ¡no tienes grupos para asignar calificaciones!";
            $idVolatilLogin = auth()->user()->id_volatil; 
            $grupo_materias = DB::table('grupo_materias')->where('id_empleado', $idVolatilLogin)->get();
        
        return view('calificacion.index', compact('grupo_materias', 'grupos', 'materias'), ['mensaje' => $mensaje, 'vol' => $vol]);

        }else if($perfilLogin == "Profesor"){

            $mensaje = "¡Aquí están tus grupos para asignar calificaciones!";
            $idVolatilLogin = auth()->user()->id_volatil;;
            $grupo_materias = DB::table('grupo_materias')->where('id_empleado', $idVolatilLogin)->get();
        
        return view('calificacion.index', compact('grupo_materias', 'grupos', 'materias'), ['mensaje' => $mensaje, 'vol' => $vol]);

        }else if($perfilLogin == "Administrador"){

            $mensaje = "¡Aquí están tus grupos para asignar Calificaciones!";
            $grupo_materias = GrupoMateria::all();
        
        return view('calificacion.index', compact('grupo_materias', 'grupos', 'materias'), ['mensaje' => $mensaje, 'vol' => $vol]);

        }

        return redirect('dashboard');

    }
    public function index_calificacion(Request $request)
    {
        $perfilLogin =  auth()->user()->perfil;
        $materias = Materia::all();
        $grupos = Grupo::all();
        $vol = $request->vol;
        $parcial = $request->sParcial;

        if($perfilLogin == "Control Escolar"){
            
            $mensaje = "Eres Control Escolar, ¡no tienes Grupos para asignar Calificaciones!";
            $idVolatilLogin = auth()->user()->id_volatil; 
            $grupo_materias = DB::table('grupo_materias')->where('id_empleado', $idVolatilLogin)->get();
        
        return view('calificacion.index', compact('grupo_materias', 'grupos', 'materias'), ['mensaje' => $mensaje, 'vol' => $vol, 'parcial' => $parcial]);

        }else if($perfilLogin == "Profesor"){

            $mensaje = "Aquí están tus grupos para asignar Calificaciones!";
            $idVolatilLogin = auth()->user()->id_volatil;;
            $grupo_materias = DB::table('grupo_materias')->where('id_empleado', $idVolatilLogin)->get();
        
        return view('calificacion.index', compact('grupo_materias', 'grupos', 'materias'), ['mensaje' => $mensaje, 'vol' => $vol, 'parcial' => $parcial]);

        }else if($perfilLogin == "Administrador"){

            $mensaje = "Aquí están tus grupos para asignar Calificaciones!";
            $grupo_materias = GrupoMateria::all();
        
        return view('calificacion.index', compact('grupo_materias', 'grupos', 'materias'), ['mensaje' => $mensaje, 'vol' => $vol, 'parcial' => $parcial]);

        }

        return redirect('dashboard');

    }

    public function createCal(Request $request)
    {
        
        $vol = $request->vol;
        $id_grupo = $request->id_grupo;
        $id_materia = $request->id_materia;
        $id_grupo_materia = $request->id_grupo_materia;

        $now = new \DateTime();
        $date = $now->format('d-m-Y');

        $calificaciones = Calificaciones::all();

        $alumnos = DB::table('alumnos')->where('id_grupo', $id_grupo)->get();
       
        $codigo_materia = DB::table('materias')->where('id', $id_materia)->value('codigo_materia');

        $nombre_grupo = DB::table('grupos')->where('id', $id_grupo)->value('nombre');

        return view('calificacion.form',['vol' => $vol, 'fecha_ac' => $date, 'id_grupo' => $id_grupo, 'id_materia' => $id_materia, 'id_grupo_materia' => $id_grupo_materia, 'codigo_materia' => $codigo_materia, 'nombre_grupo' => $nombre_grupo], compact('alumnos','calificaciones'));

    }

    public function store(Request $request)
    {
    }

    public function send_partial(Request $request){

        $vol = 1;
        $parcial = $request->sParcial;
        $id_grupo = $request->id_grupo;
        $id_materia = $request->id_materia;
        $id_grupo_materia = $request->id_grupo_materia;

        $now = new \DateTime();
        $date = $now->format('d-m-Y');

        $calificaciones = Calificaciones::all();

        $alumnos = DB::table('alumnos')->where('id_grupo', $id_grupo)->get();

        $codigo_materia = DB::table('materias')->where('id', $id_materia)->value('codigo_materia');

        $nombre_grupo = DB::table('grupos')->where('id', $id_grupo)->value('nombre');
       
        return view('calificacion.form',['vol' => $vol,'parcial' => $parcial, 'fecha_ac' => $date, 'id_grupo' => $id_grupo, 'id_materia' => $id_materia, 'id_grupo_materia' => $id_grupo_materia,'codigo_materia' => $codigo_materia, 'nombre_grupo' => $nombre_grupo], compact('alumnos','calificaciones'));


        //return redirect('dashboard');
    }

   
    public function save_all(Request $request)
    {
        $campos = [
            'parcial'=>'required|Integer',
            'asis_porcentaje'=>'required|Integer|max:3',
            'pres_porcentaje'=>'required|Integer|max:3',
            'plat_porcentaje'=>'required|Integer|max:3',
            'exa_porcentaje'=>'required|Integer|max:3',
            'calificacion'=>'required|string|max:3',
            'fecha'=>'required|string|date'
        ];

        $mensaje = [
            'required'=>'Alguno de los datos es requerida'
        ];

        //$this->validate($request, $campos, $mensaje);

        $vol = 1;
        $parcial = $request->parcial;
        $calificacion = $request->calificacion;
        $id_grupo_materia = $request->id_grupo_materia;
        $id_grupo = DB::table('grupo_materias')->where('id', $id_grupo_materia)->value('id_grupo');
        $id_materia = DB::table('grupo_materias')->where('id', $id_grupo_materia)->value('id_materia');

        $now = new \DateTime();
        $date = $now->format('d-m-Y');

        $calificaciones = Calificaciones::all();

        $alumnos = DB::table('alumnos')->where('id_grupo', $id_grupo)->get();

        $codigo_materia = DB::table('materias')->where('id', $id_materia)->value('codigo_materia');

        $nombre_grupo = DB::table('grupos')->where('id', $id_grupo)->value('nombre');

        $datosCalificacion = $request->except('_token');

        $letra_cal = $this->numeroALetras(floatval($request->calificacion));
        
        $letra_calificaciones = new Calificaciones();

        
        $letra_calificaciones->id_alumno = $request->id_alumno;
        $letra_calificaciones->id_grupo_materia = $request->id_grupo_materia;
        $letra_calificaciones->parcial = $request->parcial;
        $letra_calificaciones->asis_porcentaje = $request->asis_porcentaje;
        $letra_calificaciones->pres_porcentaje = $request->pres_porcentaje;
        $letra_calificaciones->plat_porcentaje = $request->plat_porcentaje;
        $letra_calificaciones->exa_porcentaje = $request->exa_porcentaje;
        $letra_calificaciones->calificacion = $request->calificacion;
        $letra_calificaciones->fecha = $request->fecha;
        $letra_calificaciones->calificacion_letra = $letra_cal;

        $id_alumnoV = $request->id_alumno;

        $parcialesAlumno = DB::table('calificaciones')->where([
            ['id_alumno', '=', $id_alumnoV],
            ['id_grupo_materia', '=', $id_grupo_materia],
        ])->get();

            $pruebaa = 0;
         
                foreach($parcialesAlumno as $aP){

                    if($aP->parcial == $parcial){
                        $pruebaa = 1;
                        return view('calificacion.form',['vol' => $vol,'parcial' => $parcial, 'fecha_ac' => $date, 'id_grupo' => $id_grupo, 'id_materia' => $id_materia, 'id_grupo_materia' => $id_grupo_materia, 'codigo_materia' => $codigo_materia, 'nombre_grupo' => $nombre_grupo], compact('alumnos','calificaciones'))->with('mensaje','Error Parcial ya evaluado');
                        break;
                    } 
                }

            if($letra_calificaciones->save()){


                $calificaciones_parciales = DB::table('calificaciones')->where([
                    ['id_alumno', '=', $id_alumnoV],
                    ['id_grupo_materia', '=', $id_grupo_materia]
                ])->get();

                $total_parciales = $calificaciones_parciales->count();

                if($total_parciales == 3){
               
                        $id_calificacion_final = DB::table('calificacion_final')->where([
                            ['id_alumno', '=', $id_alumnoV],
                            ['id_grupo_materia', '=', $id_grupo_materia]
                        ])->value('id');

                        $primer_parcial = DB::table('calificaciones')->where([
                            ['id_alumno', '=', $id_alumnoV],
                            ['id_grupo_materia', '=', $id_grupo_materia],
                            ['parcial', '=', 'PRIMER PARCIAL'],
                        ])->value('calificacion');

                        $segundo_parcial = DB::table('calificaciones')->where([
                            ['id_alumno', '=', $id_alumnoV],
                            ['id_grupo_materia', '=', $id_grupo_materia],
                            ['parcial', '=', 'SEGUNDO PARCIAL'],
                        ])->value('calificacion');

                        $tercer_parcial = DB::table('calificaciones')->where([
                            ['id_alumno', '=', $id_alumnoV],
                            ['id_grupo_materia', '=', $id_grupo_materia],
                            ['parcial', '=', 'TERCER PARCIAL'],
                        ])->value('calificacion');

                        $total_calificacion_final = (($primer_parcial * .30) + ($segundo_parcial * .30) + ($tercer_parcial * .40));

                        $final = round($total_calificacion_final);

                        DB::table('calificacion_final')->where('id', $id_calificacion_final)->update([
                            
                            'cal_fin' => $final, 
    
                        ]);

                }
                
                return view('calificacion.form',['vol' => $vol,'parcial' => $parcial, 'fecha_ac' => $date, 'id_grupo' => $id_grupo, 'id_materia' => $id_materia, 'id_grupo_materia' => $id_grupo_materia, 'codigo_materia' => $codigo_materia, 'nombre_grupo' => $nombre_grupo], compact('alumnos','calificaciones'))->with('mensaje','Calificacion Realizada');
            }
    
        
        return redirect('dashboard');

        //return view('calificacion.prueba', compact('parcialesAlumno'), ['id_alumno' => $id_alumnoV, 'parcial' => $parcial, 'id_grupo_materia' => $id_grupo_materia, 'pruebaa' => $pruebaa]);
    }

    public function downloadCalificaciones(Request $request){

        $id_grupo = $request->id_grupo;
        $id_materia = $request->id_materia;
        $parcial = $request->parcial;
        $id_grupo_materia = $request->id_grupo_materia;
        $id_cuatrimestre = DB::table('grupos')->where('id', $id_grupo)->value('id_cuatrimestre');
        $id_carrera = DB::table('grupos')->where('id', $id_grupo)->value('id_carrera');
        $id_empleado = DB::table('grupo_materias')->where('id', $id_grupo_materia)->value('id_empleado');


        $nombre_materia = DB::table('materias')->where('id', $id_materia)->value('nombre');
        $periodo = DB::table('cuatrimestres')->where('id', $id_cuatrimestre)->value('periodo');
        $nivel_educativo = DB::table('carreras')->where('id', $id_carrera)->value('nivel_educativo');
        $nombre_carrera = DB::table('carreras')->where('id', $id_carrera)->value('nombre');
        $empleados = DB::table('empleados')->where('id', $id_empleado)->get();
        $talumnos = DB::table('alumnos')->where('id_grupo', $id_grupo)->get();
        $total_alumnos = $talumnos->count();

        $alumnos = DB::table('alumnos')->where('id_grupo', $id_grupo)->orderBy('ap_p', 'ASC')->get(); 
        
        $calificaciones = DB::table('calificaciones')->where([
            ['id_grupo_materia', '=', $id_grupo_materia],
            ['parcial', '=', $parcial]
        ])->get();


        if($parcial == "CALIFICACION FINAL"){

            $calificacion_final_alumnos = DB::table('calificacion_final')->where('id_grupo_materia', $id_grupo_materia)->get();
            $calificacion_parcial_alumnos = DB::table('calificaciones')->where('id_grupo_materia', $id_grupo_materia)->get();

            return view('calificacion.formato_evaluacion_final', compact('alumnos','calificacion_parcial_alumnos','calificacion_final_alumnos'), ['nombre' => $nombre_materia, 'periodo' => $periodo, 'nivel_educativo' => $nivel_educativo, 'nombre_carrera' => $nombre_carrera,  'total_alumnos' => $total_alumnos,'id_grupo_materia' => $id_grupo_materia, 'parcial' => $parcial]);
        }

        return view('calificacion.formato_evaluacion', compact('alumnos','calificaciones','empleados'), ['nombre' => $nombre_materia, 'periodo' => $periodo, 'nivel_educativo' => $nivel_educativo, 'nombre_carrera' => $nombre_carrera,  'total_alumnos' => $total_alumnos,'id_grupo_materia' => $id_grupo_materia, 'parcial' => $parcial]);
    }

    public function downloadFormatoCalificaciones(Request $request){

        $id_grupo = $request->id_grupo;
        $id_materia = $request->id_materia;
        $parcial = $request->parcial;
        $id_grupo_materia = $request->id_grupo_materia;
        $id_cuatrimestre = DB::table('grupos')->where('id', $id_grupo)->value('id_cuatrimestre');
        $id_carrera = DB::table('grupos')->where('id', $id_grupo)->value('id_carrera');
        $id_empleado = DB::table('grupo_materias')->where('id', $id_grupo_materia)->value('id_empleado');


        $nombre_materia = DB::table('materias')->where('id', $id_materia)->value('nombre');
        $periodo = DB::table('cuatrimestres')->where('id', $id_cuatrimestre)->value('periodo');
        $nivel_educativo = DB::table('carreras')->where('id', $id_carrera)->value('nivel_educativo');
        $nombre_carrera = DB::table('carreras')->where('id', $id_carrera)->value('nombre');
        $empleados = DB::table('empleados')->where('id', $id_empleado)->get();
        $talumnos = DB::table('alumnos')->where('id_grupo', $id_grupo)->get();
        $total_alumnos = $talumnos->count();

        $alumnos = DB::table('alumnos')->where('id_grupo', $id_grupo)->orderBy('ap_p', 'ASC')->get();    

        $calificaciones = DB::table('calificaciones')->where([
            ['id_grupo_materia', '=', $id_grupo_materia],
            ['parcial', '=', $parcial]
        ])->get();
        

        if($parcial == "CALIFICACION FINAL"){

            $calificacion_final_alumnos = DB::table('calificacion_final')->where('id_grupo_materia', $id_grupo_materia)->get();
            $calificacion_parcial_alumnos = DB::table('calificaciones')->where('id_grupo_materia', $id_grupo_materia)->get();

            return $pdf = PDF::loadView('calificacion.formato_evaluacion_final', compact('alumnos','calificacion_parcial_alumnos','calificacion_final_alumnos'), ['nombre' => $nombre_materia, 'periodo' => $periodo, 'nivel_educativo' => $nivel_educativo, 'nombre_carrera' => $nombre_carrera,'total_alumnos' => $total_alumnos,'id_grupo_materia' => $id_grupo_materia, 'parcial' => $parcial])->setOptions([['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]])->setPaper('letter','landscape')->stream('calificaciones_finales.pdf');
        }

        return $pdf = PDF::loadView('calificacion.formato_evaluacion', compact('alumnos','calificaciones','empleados'), ['nombre' => $nombre_materia, 'periodo' => $periodo, 'nivel_educativo' => $nivel_educativo, 'nombre_carrera' => $nombre_carrera,  'total_alumnos' => $total_alumnos,'id_grupo_materia' => $id_grupo_materia, 'parcial' => $parcial])->setOptions([['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]])->setPaper('letter','landscape')->stream('calificaciones.pdf');

        //return view('calificacion.formato_evaluacion', compact('alumnos','calificaciones'), ['codigo_materia' => $codigo_materia, 'periodo' => $periodo, 'nivel_educativo' => $nivel_educativo, 'nombre_carrera' => $nombre_carrera, 'nombre_empleado' => $nombre_empleado, 'total_alumnos' => $total_alumnos,'id_grupo_materia' => $id_grupo_materia]);
    }

    public function edit($id)
    {
        //
        $calificaciones = Calificaciones::findOrFail($id);
        $alumnos = Alumno::all();
        $grupo_materias = GrupoMateria::all();
        //
        
        return view('calificacion.edit', ['vol' => $id], compact('calificaciones', 'alumnos', 'grupo_materias'));
    
    }

    public function update(Request $request, $id)
    {
        //
        $campos = [

            'fecha'=>'required|string|max:30',
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosCalificacion = $request->except(['_token','_method']);

        Calificaciones::where('id','=',$id)->update($datosCalificacion);

        $calificacion = Calificaciones::findOrFail($id);

        return redirect('calificacion')->with('mensaje','Calificacion Modificado');
    }

    public function destroy($id)
    {
        //
        $calificacion = Calificaciones::findOrFail($id);
        
        Calificaciones::destroy($id);
        
        return redirect('calificacion')->with('mensaje','Calificacion Borrado');
    }

    public function calificacion_final_total($id_alumno, $id_grupo_materia,){



        $id_calificacion_final = DB::table('calificacion_final')->where([
            ['id_alumno', '=', $id_alumno],
            ['id_grupo_materia', '=', $id_grupo_materia]
        ])->value('id');

        $primer_parcial = DB::table('calificaciones')->where([
            ['id_alumno', '=', $id_alumno],
            ['id_grupo_materia', '=', $id_grupo_materia],
            ['parcial', '=', 'PRIMER PARCIAL'],
        ])->value('calificacion');

        $segundo_parcial = DB::table('calificaciones')->where([
            ['id_alumno', '=', $id_alumno],
            ['id_grupo_materia', '=', $id_grupo_materia],
            ['parcial', '=', 'SEGUNDO PARCIAL'],
        ])->value('calificacion');

        $tercer_parcial = DB::table('calificaciones')->where([
            ['id_alumno', '=', $id_alumno],
            ['id_grupo_materia', '=', $id_grupo_materia],
            ['parcial', '=', 'TERCER PARCIAL'],
        ])->value('calificacion');

        $total_calificacion_final = ((($primer_parcial * .30) + ($segundo_parcial * .30) + ($tercer_parcial * .40)) / 3);

        $final = round($total_calificacion_final);

        DB::table('calificacion_final')->where('id', $id_calificacion_final)->update([
            [
            'cal_fin' => $final, 
        ]
        ]);

    }

    public function numeroALetras($numero) {
        $numeros_letras = array(
            0 => 'cero',
            1 => 'uno',
            2 => 'dos',
            3 => 'tres',
            4 => 'cuatro',
            5 => 'cinco',
            6 => 'seis',
            7 => 'siete',
            8 => 'ocho',
            9 => 'nueve',
            10 => 'diez',
            11 => 'once',
            12 => 'doce',
            13 => 'trece',
            14 => 'catorce',
            15 => 'quince',
            16 => 'dieciséis',
            17 => 'diecisiete',
            18 => 'dieciocho',
            19 => 'diecinueve',
            20 => 'veinte',
            30 => 'treinta',
            40 => 'cuarenta',
            50 => 'cincuenta',
            60 => 'sesenta',
            70 => 'setenta',
            80 => 'ochenta',
            90 => 'noventa',
            100 => 'cien'
        );
    
        $decimal = round($numero - intval($numero), 2) * 100;
        $entero = intval($numero);
    
        if ($entero > 100 || $entero < 0) {
            return 'El número debe estar entre 0 y 100';
        }
    
        if ($entero == 100) {
            return $numeros_letras[100];
        }
    
        if ($entero < 21) {
            if ($decimal == 0) {
                return $numeros_letras[$entero];
            } else {
                return $numeros_letras[$entero] . ' punto ' . $this->numeroALetras($decimal) . '  ';
            }
        }
    
        if ($entero < 30) {
            if ($decimal == 0) {
                return 'veinti' . $this->numeroALetras($entero - 20);
            } else {
                return 'veinti' . $this->numeroALetras($entero - 20) . ' punto ' . $this->numeroALetras($decimal) . '  ';
            }
        }
    
        if ($entero < 100) {
            if ($decimal == 0) {
                return $numeros_letras[intval($entero/10)*10] . (($entero%10!=0)?' y ' . $numeros_letras[$entero%10]:'');
            } else {
                return $numeros_letras[intval($entero/10)*10] . (($entero%10!=0)?' y ' . $numeros_letras[$entero%10]:'') . ' punto ' . $this->numeroALetras($decimal) . '  ';
            }
        }
    }
    
          

}
