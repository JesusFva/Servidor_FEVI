<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Empleado;
use App\Models\Cuatrimestre;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function __construct(){

    $this->middleware('permission:grupo')->only('index');
    $this->middleware('permission:create.grupo')->only(['create','store']);
    $this->middleware('permission:visualizar.grupo')->only(['index','show']);
    $this->middleware('permission:editar.grupo')->only(['edit','update']);
    $this->middleware('permission:eliminar.grupo')->only(['destroy']);


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
        $datos['grupos'] = Grupo::paginate(3);
        return view('grupo.index',$datos);
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
        //carrera
        $carreras = Carrera::all();
        //cuatrimestre
        $cuatrimestres = Cuatrimestre::all();
        //empleado
        // $empleados = Empleado::all();
        return view('grupo.create', ['vol' => $vol], compact('carreras','cuatrimestres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos = [
            'nombre'=>'required|string|max:60',
            'turno'=>'required|string|max:60',
            'nivel_academico'=>'required|string|max:100',
            'estatus'=>'required|string|max:60',

            
            'id_carrera'=>'required|Integer',
            'id_cuatrimestre'=>'required|Integer',
            // 'id_empleado'=>'required|Integer'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosGrupo = $request->except('_token');
    
        
        Grupo::insert($datosGrupo);

        //return response()->json($datosEmpleado);
        return redirect('grupo')->with('mensaje','Grupo agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $grupo = Grupo::findOrFail($id);
        
        //carrera
        $carreras = Carrera::all();
        //cuatrimestre
        $cuatrimestres = Cuatrimestre::all();
        //empleado
        // $empleados = Empleado::all();
        
        return view('grupo.edit', ['vol' => $id], compact('grupo','carreras','cuatrimestres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombre'=>'required|string|max:60',
            'turno'=>'required|string|max:60',
            'nivel_academico'=>'required|string|max:100',
            'estatus'=>'required|string|max:60',

            'id_carrera'=>'required|Integer',
            'id_cuatrimestre'=>'required|Integer',
            // 'id_empleado'=>'required|Integer'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        
        ];

        $this->validate($request, $campos, $mensaje);


        $datosGrupo = $request->except(['_token','_method']);

        

        Grupo::where('id','=',$id)->update($datosGrupo);

        $grupo = Grupo::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('grupo')->with('mensaje','Grupo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $grupo = Grupo::findOrFail($id);
        
        Grupo::destroy($id);

        return redirect('grupo')->with('eliminar','ok');
    }
}
