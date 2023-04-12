<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asistencia;
use App\Models\Tipo_asistencia;
use App\Models\GrupoMateria;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Carrera;
use App\Models\Cuatrimestre;
use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class AsistenciaController extends Controller
{
   public function __construct(){

        $this->middleware('permission:asistencia')->only('index');
        $this->middleware('permission:create.asistencia')->only(['create', 'store']);
        $this->middleware('permission:visualizar.asistencia')->only(['index','show']);
        $this->middleware('permission:editar.asistencia')->only(['edit', 'update']);
        $this->middleware('permission:eliminar.asistencia')->only(['destroy']);   
        $this->middleware('permission:reporte.asistencia')->only(['viewReport']);       
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $perfilLogin =  auth()->user()->perfil;
        $materias = Materia::all();
        $grupos = Grupo::all();

        if($perfilLogin == "Control Escolar"){
            
            $mensaje = "Eres Control Escolar, ¡no tienes grupos para asignar asistencias!";
            $idVolatilLogin = auth()->user()->id_volatil; 
            $grupo_materias = DB::table('grupo_materias')->where('id_empleado', $idVolatilLogin)->get();
        
        return view('asistencia.index', compact('grupo_materias', 'grupos', 'materias'), ['mensaje' => $mensaje]);

        }else if($perfilLogin == "Profesor"){

            $mensaje = "¡Aquí están tus grupos para asignar asistencias!";
            $idVolatilLogin = auth()->user()->id_volatil;;
            $grupo_materias = DB::table('grupo_materias')->where('id_empleado', $idVolatilLogin)->get();
        
        return view('asistencia.index', compact('grupo_materias', 'grupos', 'materias'), ['mensaje' => $mensaje]);

        }else if($perfilLogin == "Administrador"){

            $mensaje = "¡Aquí están tus grupos para asignar asistencias!";
            $grupo_materias = GrupoMateria::all();
        
        return view('asistencia.index', compact('grupo_materias', 'grupos', 'materias'), ['mensaje' => $mensaje]);

        }

        return redirect('dashboard');

    }
 
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { 
        $vol = 0;
        $grupoId = $request->grupoId;
        $grupo_materiaId = $request->grupo_materiaId;
        
        $now = new \DateTime();
        $date = $now->format('d-m-Y');
        $asistencias = Asistencia::all();

        $alumnos = DB::table('alumnos')->where('id_grupo', $grupoId)->get();
        $carreras = Carrera::all();

        $grupo_materias = GrupoMateria::all();
        $empleados = Empleado::all();
        $materias = Materia::all();
        $grupos = Grupo::all();
        $cuatrimestres = Cuatrimestre::all();

        $tipo_asistencias = Tipo_asistencia::all();

       return view('asistencia.form',['vol' => $vol, 'fecha_ac' => $date, 'grupo_materiaId' => $grupo_materiaId, 'grupoId' => $grupoId], compact('asistencias','alumnos', 'carreras', 'grupo_materias', 'grupos', 'cuatrimestres', 'empleados', 'materias', 'tipo_asistencias'));

    }

    public function view_report($id){

        $vol = 0;
        
        $id_grupo = DB::table('grupo_materias')->where('id', $id)->value('id_grupo');
        $id_materia = DB::table('grupo_materias')->where('id', $id)->value('id_materia');
        


        $codigo_materia = DB::table('materias')->where('id', $id_materia)->value('codigo_materia');
        $nombre_grupo = DB::table('grupos')->where('id', $id_materia)->value('nombre');

        $alumnos = DB::table('alumnos')->where('id_grupo', $id_grupo)->get();

        return view('asistencia.reporte_asistencia_ana',['codigo_materia' => $codigo_materia, 'nombre_grupo' => $nombre_grupo, 'id_grupo' => $id_grupo, 'id_materia' => $id_materia, 'id_grupo_materia' => $id], compact('alumnos'));

       // return view('asistencia.reporte_asistencia' ,compact('alumnos', 'asistencias'));
    }


    public function downloadAsistencia(Request $request){
      
        $id_grupo = $request->id_grupo;
        $id_materia = $request->id_materia;
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

        $asistencias = Asistencia::all();

        return view('asistencia.reporte_asistencia', compact('alumnos','asistencias','empleados'), ['nombre' => $nombre_materia, 'periodo' => $periodo, 'nivel_educativo' => $nivel_educativo, 'nombre_carrera' => $nombre_carrera, 'total_alumnos' => $total_alumnos,'id_grupo_materia' => $id_grupo_materia]);
    }

    public function downloadFormatoAsistencia(Request $request){
      
        $id_grupo = $request->id_grupo;
        $id_materia = $request->id_materia;
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

        $asistencias = Asistencia::all();

        return $pdf = PDF::loadView('asistencia.reporte_asistencia', compact('alumnos','asistencias','empleados'), ['nombre' => $nombre_materia, 'periodo' => $periodo, 'nivel_educativo' => $nivel_educativo, 'nombre_carrera' => $nombre_carrera, 'total_alumnos' => $total_alumnos,'id_grupo_materia' => $id_grupo_materia])->setOptions([['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]])->setPaper('letter','landscape')->stream('asistencias.pdf');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    public function save_ass(Request $request)
    {
        $campos = [
            'fecha'=>'required|string|max:100',
            'id_tipo_asistencia'=>'required|Integer'
        ];

        $mensaje = [
            'required'=>'La Asistencia es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosAsistencia = $request->except('_token','grupoId', '_method');
        
        if(Asistencia::insert($datosAsistencia)){

        $pers = $request->id_alumno;
        $vol = 0;
        $grupoId = $request->grupoId;
        $grupo_materiaId = $request->id_grupo_materia;
        $now = new \DateTime();
       // $date = $now->format('d-m-Y');
        $date = $now->format('Y\-m\-d');
        $asistencias = Asistencia::all();

        $alumnos = DB::table('alumnos')->where('id_grupo', $grupoId)->get();
        $carreras = Carrera::all();

        $grupo_materias = GrupoMateria::all();
        $empleados = Empleado::all();
        $materias = Materia::all();
        $grupos = Grupo::all();
        $cuatrimestres = Cuatrimestre::all();

        $tipo_asistencias = Tipo_asistencia::all();

        $mensaje = 'Asistencia registrada exitosamente';

        return view('asistencia.form',['vol' => $vol, 'fecha_ac' => $date, 'grupo_materiaId' => $grupo_materiaId, 'grupoId' => $grupoId], compact('asistencias','alumnos', 'carreras', 'grupo_materias', 'grupos', 'cuatrimestres', 'empleados', 'materias', 'tipo_asistencias', 'mensaje'))->with('mensaje','ASISTENCIAS');

        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $asistencias = Asistencia::findOrFail($id);
        
        $alumnos = Alumno::all();
        $grupoMaterias = GrupoMateria::all();
        $tipo_asistencias = Tipo_asistencia::all();

        return view('asistencia.edit', ['vol' => $id], compact('asistencias','alumnos', 'grupoMaterias', 'tipo_asistencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'fecha'=>'required|string|max:100',
            'id_tipo_asistencia'=>'required|Integer'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosAsistencia = $request->except(['_token','_method']);

        Asistencia::where('id','=',$id)->update($datosAsistencia);

        $asistencia = Asistencia::findOrFail($id);

        return redirect('asistencia')->with('mensaje','Asistencia Modificada');
    }

    /**
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $asistencia = Asistencia::findOrFail($id);
        
        Asistencia::destroy($id);
        
        return redirect('asistencia')->with('mensaje','Asistencia Borrado');
    }
}