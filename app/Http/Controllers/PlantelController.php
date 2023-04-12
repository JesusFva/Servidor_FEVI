<?php

namespace App\Http\Controllers;

use App\Models\Plantel;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PlantelController extends Controller
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
        $datos['plantels'] = Plantel::paginate(3);
        return view('plantel.index',$datos);
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
        $idVolatilControl Escolar =  2;
        $empleados = DB::table('empleados')->where('id_puesto', $idVolatilControl Escolar)->get();
        //
        return view('plantel.create', ['vol' => $vol], compact('empleados'));
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
            'cct'=>'required|string|max:30',
            'nombre'=>'required|string|max:100',
            'id_empleado'=>'required|Integer'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosPlantel = $request->except('_token');
    
        
        Plantel::insert($datosPlantel);

        //return response()->json($datosEmpleado);
        return redirect('plantel')->with('mensaje','Plantel agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plantel  $plantel
     * @return \Illuminate\Http\Response
     */
    public function show(Plantel $plantel)
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
        $plantel = Plantel::findOrFail($id);
        
        $idVolatilControl Escolar =  2;
        $empleados = DB::table('empleados')->where('id_puesto', $idVolatilControl Escolar)->get();

        //$empleados = Empleado::all();

        return view('plantel.edit', ['vol' => $id], compact('plantel','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plantel  $plantel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'cct'=>'required|string|max:30',
            'nombre'=>'required|string|max:100',
            'id_empleado'=>'required|Integer'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        
        ];

        $this->validate($request, $campos, $mensaje);


        $datosPlantel = $request->except(['_token','_method']);

        

        Plantel::where('id','=',$id)->update($datosPlantel);

        $plantel = Plantel::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('plantel')->with('mensaje','Plantel Modificado');
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
        $plantel = Plantel::findOrFail($id);
        
        Plantel::destroy($id);
        
        
        return redirect('plantel')->with('eliminar','ok');
    }
}
