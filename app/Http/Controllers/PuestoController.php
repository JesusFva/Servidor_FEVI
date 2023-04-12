<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PuestoController extends Controller
{
    public function __construct(){

        // $this->middleware('permission:alumno')->only('index');
    $this->middleware('permission:create.puesto')->only(['create','store']);
    $this->middleware('permission:visualizar.puesto')->only(['index','show']);
    $this->middleware('permission:editar.puesto')->only(['edit','update']);
    $this->middleware('permission:eliminar.puesto')->only(['destroy']);


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
        $datos['puestos'] = Puesto::paginate(5);
        return view('puesto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('puesto.create');
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
        //
        $campos = [
            'nombre_puesto'=>'required|string|max:200',
            'descripcion'=>'required|string|max:200'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosPuesto = $request->except('_token');
        
        Puesto::insert($datosPuesto);

        //return response()->json($datosEmpleado);
        return redirect('puesto')->with('mensaje','Puesto agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $puesto = Puesto::findOrFail($id);

        return view('puesto.edit', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombre_puesto'=>'required|max:200',
            'descripcion'=>'required|string|max:200'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        $datosPuesto = $request->except(['_token','_method']);

        Puesto::where('id','=',$id)->update($datosPuesto);

        $puesto = Puesto::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('puesto')->with('mensaje','Puesto Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Puesto::destroy($id);
       
        return redirect('puesto')->with('eliminar','ok');
    }
}
