<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referencia_alumno;
use App\Models\Alumno;

class ReferenciaAlumnoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['referencia_alumno'] = Referencia_alumno::paginate(5);
        //return view('referencia_alumno.index',$datos);
    }

    public function create()
    {
        //
        return view('referencia_alumno.create');
    }

    public function store(Request $request){

        //
        $campos = [
            'nombre'=>'required|string|max:100',
            'ap_p'=>'required|string|max:60',
            'ap_m'=>'required|string|max:60',
            'tel_casa'=>'required|string|max:20',
            'tel_celular'=>'required|string|max:20',
            'correo'=>'required|email',
            'direccion'=>'required|string|max:500'
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosReferencia_alumno = $request->except('_token');
        
        if(Referencia_alumno::insert($datosReferencia_alumno)){
            $nombre_alumno = Alumno::findOrFail($request->id_alumno);
            return redirect('dashboard');
        }

    }

    public function show(Referencia_alumno $referencia_alumno)
    {
        //
    }

    public function edit($id)
    {
        //
        $referencia_alumno = Referencia_alumno::findOrFail($id);

        return view('referencia_alumno.edit', compact('referencia_alumno'));
    }

    public function update(Request $request, $id){

        //
        $campos = [
            'nombre'=>'required|string|max:100',
            'ap_p'=>'required|string|max:60',
            'ap_m'=>'required|string|max:60',
            'tel_casa'=>'required|string|max:20',
            'tel_celular'=>'required|string|max:20',
            'correo'=>'required|email',
            'direccion'=>'required|string|max:500'
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosReferencia_alumno = $request->except('_token');
        
        Referencia_alumno::where('id','=',$id)->update($datosReferencia_alumno);

        return redirect('referencia_alumno')->with('mensaje','Referencia del alumno modificado');

    }

    public function destroy($id)
    {
        //
        $referencia_alumno = Referencia_alumno::findOrFail($id);
        Referencia_alumno::destroy($id);
       
        return redirect('referencia_alumno')->with('mensaje','Referencia del alumno borrado');
    }
}
