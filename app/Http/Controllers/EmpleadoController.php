<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Carrera;
use App\Models\Domicilio;
use App\Models\Puesto;
use App\Models\Contacto;
use App\Models\detalle_contacto;
use App\Models\Detalle_domicilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleado::paginate(3);
        return view('empleado.index',$datos);
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
        $puestos = Puesto::all();
        //
        return view('empleado.create', ['vol' => $vol], compact('puestos'));
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
            'ap_paterno'=>'required|string|max:100',
            'ap_materno'=>'required|string|max:100',
            'curp'=>'required|string|max:100',
            'rfc'=>'required|string|max:100',
            'n_cedula'=>'required|string|max:100',
            'n_empleado'=>'required|string|max:100',
            'f_nacimiento'=>'required|string|max:100',
            'f_ingreso'=>'required|string|max:100',
            'f_baja'=>'string|max:100',
            'id_puesto'=>'required|integer|',
            'estatus'=>'required|string|max:100',
            'profesion'=>'required|string|max:100',
            'url_foto'=>'required|max:10000'
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
            'url_foto.required'=>'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosEmpleado = $request->except('_token');
        
        if($request->hasFile('url_foto')){
            $datosEmpleado['url_foto'] = $request->file('url_foto')->store('user_1','fotos');
        }
        
        if(Empleado::insert($datosEmpleado)){

            $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); 
            $combLen = strlen($comb) - 1; 
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $combLen);
            $pass[] = $comb[$n];
        }


        $idPersona = $request->id_puesto;

        $nomcomp = $request-> nombre.' '.$request-> ap_paterno.' '.$request-> ap_materno;

        switch($idPersona){
            case 2:
                $passw = implode($pass);

                $ultimoId = Empleado::latest('id')->first()->id;
        
                $arrayCU = [
                    'name' => $nomcomp,
                    'email' => implode($pass).'@gmail.com',
                    'password' => 'Control Escolar123',
                    'id_volatil' => $ultimoId,
                    'perfil' => 'Control Escolar',
                    'rol' => 'Control Escolar'
                ];
                
                $registrer_controller = new RegisterController;
                $registrer_controller->create($arrayCU);
                break;
            case 3:
                $passw = implode($pass);

                $ultimoId = Empleado::latest('id')->first()->id;
        
                $arrayCU = [
                    'name' => $nomcomp,
                    'email' => implode($pass).'@gmail.com',
                    'password' => 'Profesor123',
                    'id_volatil' => $ultimoId,
                    'perfil' => 'Profesor',
                    'rol' => 'Profesor'
                ];
                
                $registrer_controller = new RegisterController;
                $registrer_controller->create($arrayCU);
                break;
            default:
                break;
        }

       
        

        $tipo = DB::table('puestos')->where('id', $request->id_puesto)->value('nombre_puesto');
        
            return view('contacto.create', ['volatil' => $ultimoId, 'tipo' => $tipo]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function dash(Empleado $empleado)
    {
        //
        return view('empleado.dash');
    }


    public function personal(Request $request)
    {
        //      
        $idC = DB::table('contactos')->where('correo', $request->correoR)->value('id');

        $idV = DB::table('detalle_contactos')->where('id_contacto', $idC)->value('id_volatil');

        $empleado = Empleado::findOrFail($idV);
      
        return view('empleado.misdatos', compact('empleado'));
    }

    public function contactos(Request $request)
    {
        //      
        $idC = DB::table('contactos')->where('correo', $request->correoR)->value('id');

        $contacto = Contacto::findOrFail($idC);
      
        return view('empleado.miscontactos', compact('contacto'));
    }

    public function domicilios(Request $request)
    {
        //      
         //      
         $idC = DB::table('contactos')->where('correo', $request->correoR)->value('id');

         //$idV = DB::table('detalle_contactos')->where('id_contacto', $idC)->value('id_volatil');
 
         //$alumno = Alumno::findOrFail($idV);
 
         $domicilio = Domicilio::findOrFail($idC);
      
         return view('empleado.misdomicilios', compact('domicilio'));
        }

        public function misgrupos(Request $request){
            $idC = DB::table('contactos')->where('correo', $request->correoR)->value('id');

            $idV = DB::table('detalle_contactos')->where('id_contacto', $idC)->value('id_volatil');
            
            $grupos = DB::table('grupos')->where('id_empleado', $idV)->get();

            $empleado = Empleado::findOrFail($idV);
      
        return view('empleado.misgrupos', compact('empleado', 'grupos'));
        }

        public function misalumnos(Request $request){

            //$idC = DB::table('contactos')->where('correo', $request->correoR)->value('id');
            
            //$alumnos = DB::table('alumnos')->where('id_grupo', $request->id_grupo)->get();
           

            //$empleado = Empleado::findOrFail($idV);
      
        //return view('empleado.misniños', ['siu' => $request->id_grupo]);
            return view('empleado.pu');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        
        $puestos = Puesto::all();

        return view('empleado.edit', ['vol' => $id], compact('empleado','puestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombre'=>'required|string|max:100',
            'ap_paterno'=>'required|string|max:100',
            'ap_materno'=>'required|string|max:100',
            'curp'=>'required|string|max:100',
            'n_cedula'=>'required|string|max:100',
            'n_empleado'=>'required|string|max:100',
            'rfc'=>'required|string|max:100',
            'f_nacimiento'=>'required|string|max:100',
            'f_ingreso'=>'required|string|max:100',
            'f_baja'=>'string|max:100',
            'id_puesto'=>'required|integer|',
            'estatus'=>'required|string|max:100',
            'profesion'=>'required|string|max:100',
            'url_foto'=>'required|max:10000|mimes:jpeg,png,jpg'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        
        ];

        if($request->hasFile('url_foto')){
            $campos = ['url_foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje = ['url_foto.required'=>'La foto es requerida'];
        }

        $this->validate($request, $campos, $mensaje);


        $datosEmpleado = $request->except(['_token','_method']);

        if($request->hasFile('url_foto')){
            $empleado = Empleado::findOrFail($id);
            
            Storage::delete('fotos/'.$empleado->url_foto);

            $datosEmpleado['url_foto'] = $request->file('url_foto')->store('users','fotos');
        }

        Empleado::where('id','=',$id)->update($datosEmpleado);

        $empleado = Empleado::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('empleado')->with('mensaje','Empleado Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado = Empleado::findOrFail($id);

        if(Storage::delete('public/'.$empleado->url_foto)){

            if(Empleado::destroy($id)){
               

                $id_users = User::where('id_volatil',$id)->where(function($query) {
                    $query->where('perfil','Control Escolar')
                                ->orWhere('perfil','Profesor');
                })->value('id');

                $id_detalle_contacto = detalle_contacto::where('id_volatil',$id)->where(function($query) {
                    $query->where('tipo','Control Escolar')
                                ->orWhere('tipo','Profesor');
                })->value('id');

                $id_detalle_domicilio = Detalle_domicilio::where('id_volatil',$id)->where(function($query) {
                    $query->where('tipo','Control Escolar')
                                ->orWhere('tipo','Profesor');
                })->value('id');

                $id_detalle_contacto = detalle_contacto::where('id_volatil',$id)->where(function($query) {
                    $query->where('tipo','Control Escolar')
                                ->orWhere('tipo','Profesor');
                })->value('id_contacto');

                $id_detalle_domicilio = Detalle_domicilio::where('id_volatil',$id)->where(function($query) {
                    $query->where('tipo','Control Escolar')
                                ->orWhere('tipo','Profesor');
                })->value('id_domicilio');

                
                User::destroy($id_users);

                detalle_contacto::destroy($id_detalle_contacto);

                Detalle_domicilio::destroy($id_detalle_domicilio);

                Contacto::destroy($id_contacto);

                Domicilio::destroy($id_domicilio);
                
                return redirect('dashboard');
            }

        }
        
        return redirect('empleado')->with('eliminar','ok');
    }
}