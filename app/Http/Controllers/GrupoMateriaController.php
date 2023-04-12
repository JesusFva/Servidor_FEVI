<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\GrupoMateria;
use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\Calificacion_Final;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoMateriaController extends Controller
{
  
  public function __construct(){

    $this->middleware('permission:plantel')->only('index');
    $this->middleware('permission:create.plantel')->only(['create','store']);
    $this->middleware('permission:visualizar.plantel')->only(['index','show']);
    $this->middleware('permission:editar.plantel')->only(['edit','update']);
    $this->middleware('permission:eliminar.plantel')->only(['destroy']);


        // $this->middleware('role:Control Escolar')->only([index]);

    }
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    //
    $datos['grupo_materias'] = GrupoMateria::paginate(3);
    return view('grupo_materia.index',$datos);
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    //
    $vol = 0;
    $grupoMaterias = GrupoMateria::all();
    $materias = Materia::all();
    $grupos = Grupo::all();
    $puesto_direct = 3;
        
    $empleados = DB::table('empleados')->where('id_puesto', $puesto_direct)->get();
    //$empleados = Empleado::all();
    //
    return view('grupo_materia.create', ['vol' => $vol], compact('grupoMaterias', 'materias', 'grupos', 'empleados'));
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $campos = [
        'id_materia'=>'required|Integer',
        'id_grupo'=>'required|Integer',
        'id_empleado'=>'required|Integer'
        
    ];

    $mensaje = [
        'required'=>'El :attribute es requerido'
    ];

    $this->validate($request, $campos, $mensaje);

    //$datosEmpleado = request()->all();
    $datosGrupoMateria = $request->except('_token');

    
    if(GrupoMateria::insert($datosGrupoMateria)){

        $ultimoId = GrupoMateria::latest('id')->first()->id;

        $id_grupo = DB::table('grupo_materias')->where('id', $ultimoId)->value('id_grupo');
        
        $alumnos = DB::table('alumnos')->where('id_grupo', $id_grupo)->get();

        $cal_f = 0;

        foreach($alumnos as $alumno){
            
            DB::table('calificacion_final')->insert([
                [
                'cal_fin' => $cal_f, 
                'id_alumno' => $alumno->id,
                'id_grupo_materia' => $ultimoId
            ]
            ]);

        }

        return redirect('grupo_materia')->with('mensaje','Asignación agregada con éxito');

    }

    //return response()->json($datosEmpleado);
    return redirect('dashboard');
}

/**
 * Display the specified resource.
 *
 * @param  \App\Models\GrupoMateria  $grupoMaterias
 * @return \Illuminate\Http\Response
 */
public function show(GrupoMateria $grupoMateria)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\Plantel  $plantel
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    //    
    $grupo_materia = GrupoMateria::findOrFail($id);
    $materias = Materia::all();
    $grupos = Grupo::all();
    $puesto_direct = 3;
        
    $empleados = DB::table('empleados')->where('id_puesto', $puesto_direct)->get();

    return view('grupo_materia.edit', ['vol' => $id], compact('grupo_materia', 'materias', 'grupos', 'empleados'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\GrupoMateria  $grupoMateria
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    //
    $campos = [
      'id_materia'=>'required|Integer',
      'id_grupo'=>'required|Integer',
      'id_empleado'=>'required|Integer'
        
    ];

    $mensaje = [
        'required'=>'El :attribute es requerido'
    
    ];

    $this->validate($request, $campos, $mensaje);


    $datosgrupoMaterias = $request->except(['_token','_method']);

    GrupoMateria::where('id','=',$id)->update($datosgrupoMaterias);

    $grupoMateria = GrupoMateria::findOrFail($id);

    //return view('empleado.edit', compact('empleado'));
    return redirect('grupo_materia')->with('mensaje','Asignación Modificada');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Plantel  $plantel
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    //
    $grupo_materia = GrupoMateria::findOrFail($id);
    
    GrupoMateria::destroy($id);
    
    
    return redirect('grupo_materia')->with('eliminar','ok');
}

    public function consultar_grupomateria(Request  $request){
        $grupos_materias = GrupoMateria::all();

        $grupo= $request->get('grupos');
        $materia= $request->get('materias');

        $grupo_materia=DB::table('grupo_materia')
        ->select('grupo_materia.id')
        ->join('grupos','grupo_materia.id_grupo','=','grupos.id')
         ->join('materias','grupo_materia.id_materia','=','materias.id')
        ->where('grupos.nombre','=',$grupo)
        ->where('materias.nombre', '=', $materia)
        ->get();
    
    
      //return $alumnos;
        return view('asistencia.create',compact('grupo_materia', 'grupo', 'materia', 'grupos_materias'));
        }
   
}
