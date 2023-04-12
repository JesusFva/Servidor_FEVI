<?php

namespace App\Http\Controllers;

use App\Models\Tipo_asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipoAsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['tipo_asistencias'] = Tipo_asistencia::paginate(5);
        return view('tipo_asistencia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipo_asistencia.create');
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
            'tipo'=>'required|string|max:200',
            'descripcion'=>'required|string|max:200'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosTipo_asistencia = $request->except('_token');
        
        Tipo_asistencia::insert($datosTipo_asistencia);

        //return response()->json($datosEmpleado);
        return redirect('tipo_asistencia')->with('mensaje','Tipo de asistencia agregado con éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_asistencia  $tipo_asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_asistencia $tipo_asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo_asistencia  $tipo_asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipo_asistencia = Tipo_asistencia::findOrFail($id);

        return view('tipo_asistencia.edit', compact('tipo_asistencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo_asistencia  $tipo_asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $campos = [
            'tipo'=>'required|max:200',
            'descripcion'=>'required|string|max:200'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        $datosTipo_asistencia = $request->except(['_token','_method']);

        Tipo_asistencia::where('id','=',$id)->update($datosTipo_asistencia);

        $tipo_asistencia = Tipo_asistencia::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('tipo_asistencia')->with('mensaje','Tipo de asistencia modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_asistencia  $tipo_asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Tipo_asistencia::destroy($id);
       
        return redirect('tipo_asistencia')->with('eliminar','ok');
    }
}
