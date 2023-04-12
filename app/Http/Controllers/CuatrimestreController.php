<?php

namespace App\Http\Controllers;

use App\Models\Cuatrimestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CuatrimestreController extends Controller
{
    public function __construct(){

        $this->middleware('permission:alumno')->only('index');
        $this->middleware('permission:create.cuatrimestre')->only(['create','store']);
        $this->middleware('permission:visualizar.cuatrimestre')->only(['index','show']);
        $this->middleware('permission:editar.cuatrimestre')->only(['edit','update']);
        $this->middleware('permission:eliminar.cuatrimestre')->only(['destroy']);
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
        $datos['cuatrimestres'] = Cuatrimestre::paginate(5);
        return view('cuatrimestre.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cuatrimestre.create');
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
            'periodo'=>'required|string|max:200',
            'f_inicio'=>'required|string|max:20',
            'f_fin'=>'required|string|max:20',
            'anio'=>'required|string|max:20'
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosCuatrimestre = $request->except('_token');
        
        Cuatrimestre::insert($datosCuatrimestre);

        //return response()->json($datosEmpleado);
        return redirect('cuatrimestre')->with('mensaje','Cuatrimestre agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuatrimestre  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function show(Cuatrimestre $cuatrimestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuatrimestre  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cuatrimestre = Cuatrimestre::findOrFail($id);

        return view('cuatrimestre.edit', compact('cuatrimestre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuatrimestre  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'periodo'=>'required|string|max:200',
            'f_inicio'=>'required|string|max:20',
            'f_fin'=>'required|string|max:20',
            'anio'=>'required|string|max:20'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        $datosCuatrimestre = $request->except(['_token','_method']);

        Cuatrimestre::where('id','=',$id)->update($datosCuatrimestre);

        $cuatrimestre = Cuatrimestre::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('cuatrimestre')->with('mensaje','Cuatrimestre Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuatrimestre  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cuatrimestre = Cuatrimestre::findOrFail($id);
        Cuatrimestre::destroy($id);
       
        return redirect('cuatrimestre')->with('eliminar','ok');
    }
}
