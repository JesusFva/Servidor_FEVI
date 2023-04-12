<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Plantel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CarreraController extends Controller
{
    public function __construct(){

        $this->middleware('permission:carrera')->only('index');
        $this->middleware('permission:create.carrera')->only(['create','store']);
        $this->middleware('permission:visualizar.carrera')->only(['index','show']);
        $this->middleware('permission:editar.carrera')->only(['edit','update']);
        $this->middleware('permission:eliminar.carrera')->only(['destroy']);
    
    
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
        $datos['carreras'] = Carrera::paginate(3);
        return view('carrera.index',$datos);
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
        $plantels = Plantel::all();
        //
        return view('carrera.create', ['vol' => $vol], compact('plantels'));
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
            'nombre'=>'required|string|max:100',
            'siglas'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100',
            'duracion'=>'required|string|max:100',
            'plan_educativo'=>'required|string|max:100',
            'id_plantel'=>'required|Integer'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
            
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosCarrera = $request->except('_token');
        
        Carrera::insert($datosCarrera);

        //return response()->json($datosEmpleado);
        return redirect('carrera')->with('mensaje','Carrera agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $carrera = Carrera::findOrFail($id);
        
        $plantels = Plantel::all();

        return view('carrera.edit', ['vol' => $id], compact('carrera','plantels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombre'=>'required|string|max:100',
            'siglas'=>'required|string|max:100',

            'descripcion'=>'required|string|max:100',
            
            'duracion'=>'required|string|max:100',
            'plan_educativo'=>'required|string|max:100',
            'id_plantel'=>'required|Integer'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        
        ];

        

        $this->validate($request, $campos, $mensaje);


        $datosCarrera = $request->except(['_token','_method']);

        

        Carrera::where('id','=',$id)->update($datosCarrera);

        $carrera = Carrera::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('carrera')->with('mensaje','Carrera Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //
        $carrera = Carrera::findOrFail($id);
        
        Carrera::destroy($id);
        
        return redirect('carrera')->with('eliminar','ok');
    }
}
