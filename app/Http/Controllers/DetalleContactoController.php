<?php

namespace App\Http\Controllers;

use App\Models\detalle_contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DetalleContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['detalle_contactos'] = Detalle_Contacto::paginate(5);
        return view('detalle_contacto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('detalle_contacto.create');
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
            'tipo'=>'required|integer|max:20',
            'id_contacto'=>'required|integer|max:20',
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosDetalleContacto = $request->except('_token');
        
        Detalle_Contacto::insert($datosDetalleContacto);

        //return response()->json($datosEmpleado);
        return redirect('detalle_Contacto')->with('mensaje','Contacto Agregado con éxito');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detalle_Contacto  $detalle_Contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Detalle_Contacto $detalle_Contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detalle_Contacto  $detalle_Contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $detalle_contacto = Detalle_Contacto::findOrFail($id);

        return view('detalle_contacto.edit', compact('detalle_contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detalle_Contacto  $detalle_Contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'tipo'=>'required|integer|max:20',
            'id_contacto'=>'required|integer|max:20',
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosDetalleContacto = $request->except('_token','_method');
        Detalle_Contacto::where('id','=',$id)->update($datosDetalleContacto);

        $contacto = Detalle_Contacto::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('detalle_contacto')->with('mensaje','Contacto Modificado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalle_Contacto  $detalle_Contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contacto = Detalle_Contacto::findOrFail($id);
        Detalle_Contacto::destroy($id);
   
    return redirect('detalle_contacto')->with('mensaje','Contacto Borrado');

    }
}
