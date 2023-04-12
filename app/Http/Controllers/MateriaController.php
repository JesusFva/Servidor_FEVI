<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use App\Models\Grupo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['materias'] = Materia::paginate(3);
        return view('materia.index',$datos);
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
        $materias = Materia::all();
        // $grupos = Grupo::all();
        //cuatrimestre
        
        return view('materia.create', ['vol' => $vol], compact('materias'));
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
            'nombre'=>'required|string|max:200',
            'horas'=>'required|string|max:60',
            'codigo_materia'=>'required|string|max:60'

            // 'id_grupo'=>'required|Integer'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosMateria = $request->except('_token');
    
        
        Materia::insert($datosMateria);

        //return response()->json($datosEmpleado);
        return redirect('materia')->with('mensaje','Materia agregada con éxito');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $materia = Materia::findOrFail($id);
        
        //carrera
        // $grupos = Grupo::all();
        //cuatrimestre
        
        return view('materia.edit', ['vol' => $id], compact('materia'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos = [
            'nombre'=>'required|string|max:200',
            'horas'=>'required|string|max:60',
            'codigo_materia'=>'required|string|max:60',

            // 'id_grupo'=>'required|Integer',
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        
        ];

        $this->validate($request, $campos, $mensaje);


        $datosMateria = $request->except(['_token','_method']);

        

        Materia::where('id','=',$id)->update($datosMateria);

        $materia = Materia::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('materia')->with('mensaje','Materia Modificada');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $materia = Materia::findOrFail($id);
        
        Materia::destroy($id);

        return redirect('materia')->with('eliminar','ok');
    
    }
}