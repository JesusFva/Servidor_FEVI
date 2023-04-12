<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use App\Models\Contacto;
use App\Models\Detalle_Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactoController extends Controller
{
    public function __construct(){

    $this->middleware('permission:contacto')->only('index');
    $this->middleware('permission:create.contacto')->only(['create','store']);
    $this->middleware('permission:visualizar.contacto')->only(['index','show']);
    $this->middleware('permission:editar.contacto')->only(['edit','update']);
    $this->middleware('permission:eliminar.contacto')->only(['destroy']);


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
        $datos['contactos'] = Contacto::paginate(5);
        return view('contacto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacto.create');
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
            'correo'=>'required|email',
            'telefono'=>'required|string|max:20',
            'celular'=>'required|string|max:20',
            'otro'=>'required|string|max:20'

        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosContacto = $request->except('_token','volatil','tipo');
        
        Contacto::insert($datosContacto);

        $ultimoId = Contacto::latest('id')->first()->id;

        $detalle_contacto = new Detalle_Contacto;
        //$detalle_contacto->id_volatil = $request->input('id_volatil');
        $detalle_contacto->id_volatil = $request->volatil;
        $detalle_contacto->id_contacto = $ultimoId;
        $detalle_contacto->tipo = $request->tipo;
    

        if($detalle_contacto->save()){

            $ultimoUser = User::latest('id')->first()->id;
    
            User::where('id','=',$ultimoUser)->update(["email" => $request->correo]);
            User::where('id','=',$ultimoUser)->update(["id_volatil" => $request->volatil]);
            User::where('id','=',$ultimoUser)->update(["perfil" => $request->tipo]);

            //return response()->json($datosEmpleado);
            return view('domicilio.create', ['volatil' => $request->volatil, 'tipo' => $request->tipo]);

        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contacto = Contacto::findOrFail($id);

        return view('contacto.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'correo'=>'required|email',
            'telefono'=>'required|string|max:20',
            'celular'=>'required|string|max:20',
            'otro'=>'required|string|max:20'

        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        $datosContacto = $request->except(['_token','_method','volatil','tipo']);

        Contacto::where('id','=',$id)->update($datosContacto);

        $contacto = Contacto::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('contacto')->with('mensaje','Contacto Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contacto = Contacto::findOrFail($id);
            Contacto::destroy($id);
       
        return redirect('contacto')->with('eliminar','ok');
    }
}
