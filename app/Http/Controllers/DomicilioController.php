<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use App\Models\Domicilio;
use App\Models\detalle_domicilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DomicilioController extends Controller
{
    public function __construct(){

        $this->middleware('permission:domicilio')->only('index');
        $this->middleware('permission:create.domicilio')->only(['create','store']);
        $this->middleware('permission:visualizar.domicilio')->only(['index','show']);
        $this->middleware('permission:editar.domicilia')->only(['edit','update']);
        $this->middleware('permission:eliminar.domicilio')->only(['destroy']);
    
    
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
        $datos['domicilios'] = Domicilio::paginate(5);
        return view('domicilio.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('domicilio.create');
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
            'calle'=>'required|string|max:200',
            'no_exterior'=>'required|string',
            'no_interior'=>'required|string',
            'cp'=>'required|integer',
            'estado'=>'required|string|max:200',
            'municipio'=>'required|string|max:200',
            'colonia'=>'required|string|max:200',
            'descripcion'=>'required|string|max:200'
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosDomicilio = $request->except('_token','volatil','tipo');

        Domicilio::insert($datosDomicilio);

        $ultimoId = Domicilio::latest('id')->first()->id;

        $detalle_domicilio = new Detalle_Domicilio;

        $detalle_domicilio->id_volatil = $request->volatil;
        $detalle_domicilio->id_domicilio = $ultimoId;
        $detalle_domicilio->tipo = $request->tipo;

        if($detalle_domicilio->save()){

            if($request->tipo == "Alumno"){
                
                $id_alumno = $request->volatil;

                return view('referencia_alumno.create', ['id_alumno' => $id_alumno]);

            }else if($request->tipo == "Profesor" || $request->tipo == "Control Escolar"){

                return redirect('dashboard');
            
            }
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function show(Domicilio $domicilio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $domicilio = Domicilio::findOrFail($id);

        return view('domicilio.edit', compact('domicilio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'calle'=>'required|string|max:200',
            'no_exterior'=>'required|string',
            'no_interior'=>'required|string',
            'cp'=>'required|integer',
            'estado'=>'required|string|max:200',
            'municipio'=>'required|string|max:200',
            'colonia'=>'required|string|max:200',
            'descripcion'=>'required|string|max:200'
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosDomicilio = $request->except(['_token','_method','volatil','tipo']);

        Domicilio::where('id','=',$id)->update($datosDomicilio);

        $domicilio = Domicilio::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('dashboard')->with('mensaje','Cambio Realizado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $domicilio = Domicilio::findOrFail($id);
            Domicilio::destroy($id);
       
        return redirect('domicilio')->with('eliminar','ok');
    }
}
