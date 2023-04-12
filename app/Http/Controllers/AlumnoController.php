<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Contacto;
use App\Models\Domicilio;
use App\Models\detalle_contacto;
use App\Models\Detalle_domicilio;
use App\Models\Grupo;
use App\Models\Carrera;
use App\Models\Plantel;
use App\Models\Referencia_alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['alumnos'] = Alumno::paginate(3);
        return view('alumno.index',$datos);
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
        //grupo
        $grupos = Grupo::all();
        //carrera
        $carreras = Carrera::all();
        //plantel
        $plantels = Plantel::all();

        return view('alumno.create', ['vol' => $vol], compact('grupos','carreras','plantels'));
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
            'ap_p'=>'required|string|max:60',
            'ap_m'=>'required|string|max:60',
            'matricula'=>'required|string|max:100',
            'seguro_social'=>'required|string|max:100',
            'f_nacimiento'=>'required|date',
            'curp'=>'required|string|max:18|min:18',
            'nacionalidad'=>'required|string|max:20',
            'tipo_sanguineo' => 'required|string|max:5',
            'enfermedad' => 'required|string|max:100',
            'estado_civil' => 'required|string|max:20',
            'status'=>'required|string|max:50',
            'f_ingreso'=>'required|date',
            'f_egreso'=>'required|date',
            'url_foto'=>'required|max:10000',
            'id_grupo'=>'required|Integer',
            'id_carrera'=>'required|Integer',
            'id_plantel'=>'required|Integer'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
            'url_foto.required'=>'La foto es requerida',
            'curp.max' => "Ingrese la cantidad correcta de caracteres :attribute ",
            'curp.min' => "Ingrese la cantidad correcta de caracteres :attribute",
            ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosAlumno = $request->except('_token');
        
       /* if($request->hasFile('url_foto')){
            $datosAlumno['url_foto'] = $request->file('url_foto')->store('uploads','public');
        }*/
        
        if($request->hasFile('url_foto')){
            $datosAlumno['url_foto'] = $request->file('url_foto')->store('public/fotos/users');
        }

        if(Alumno::insert($datosAlumno)){

            $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); 
            $combLen = strlen($comb) - 1; 
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $combLen);
            $pass[] = $comb[$n];
        }

        $passw = implode($pass);
        $ultimoId = Alumno::latest('id')->first()->id;

        $nomcomp = $request-> nombre.' '.$request-> ap_p.' '.$request-> ap_m;

        $arrayCU = [
            'name' => $nomcomp,
            'email' => implode($pass).'@gmail.com',
            'password' => 'alumno123',
            'id_volatil' => $ultimoId,
            'perfil' => 'Alumno',
            'rol' => 'Alumno'
        ];
        
        $registrer_controller = new RegisterController;
        $registrer_controller->create($arrayCU);

        
        $tipo = 'Alumno';

            return view('contacto.create', ['volatil' => $ultimoId, 'tipo' => $tipo])->with('mensaje','Alumno registrado exitosamente');
        //return redirect('alumno')->with('mensaje','Alumno Agregado con éxito  '.$passw);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function dashe()
    {
        //
        return view('alumno.dash');
    }

    public function personal(Request $request)
    {
        //      
        $idC = DB::table('contactos')->where('correo', $request->correoR)->value('id');

        $idV = DB::table('detalle_contactos')->where('id_contacto', $idC)->value('id_volatil');

        $alumno = Alumno::findOrFail($idV);
      
        return view('alumno.misdatos', compact('alumno'));
    }



    public function contactos(Request $request)
    {
        //      
        $idC = DB::table('contactos')->where('correo', $request->correoR)->value('id');

        //$idV = DB::table('detalle_contactos')->where('id_contacto', $idC)->value('id_volatil');

        //$alumno = Alumno::findOrFail($idV);

        $contacto = Contacto::findOrFail($idC);
      
        return view('alumno.miscontactos', compact('contacto'));
    }

    public function domicilios(Request $request)
    {
        //      
         //      
         $idC = DB::table('contactos')->where('correo', $request->correoR)->value('id');

         //$idV = DB::table('detalle_contactos')->where('id_contacto', $idC)->value('id_volatil');
 
         //$alumno = Alumno::findOrFail($idV);
 
         $domicilio = Domicilio::findOrFail($idC);
      
         return view('alumno.misdomicilios', compact('domicilio'));
        }

        public function mismaterias(Request $request){
            $idC = DB::table('contactos')->where('correo', $request->correoR)->value('id');

            $idV = DB::table('detalle_contactos')->where('id_contacto', $idC)->value('id_volatil');
            
            $idG = DB::table('alumnos')->where('id', $idV)->value('id_grupo');
           
            $materias = DB::table('materias')->where('id_grupo', $idG)->get();
            
            $alumno = Alumno::findOrFail($idV);
      
        return view('alumno.mismaterias', compact('alumno', 'materias'));
        }
   
        public function miqr(Request $request){

            $idC = DB::table('contactos')->where('correo', $request->correoR)->value('id');

            $idV = DB::table('detalle_contactos')->where('id_contacto', $idC)->value('id_volatil');

            $alumno = Alumno::findOrFail($idV);
            $matricula = 0;
            $nombre = 0;
            //QrCode::format('png')->size(500)->color(0,0,255)->generate('Edwin Papucho', '../public/qrcodes/qrcode.png');
            return view('alumno.qr', ['matricu' => $matricula, 'nom' => $nombre], compact('alumno'));
            //QrCode::format('png')->merge('../public/qr/logo.png', .3, true)->generate();
            //return QrCode::size(300)->color(0,255,156)->format('png')->merge('../public/qr/logo.png', .3, true)->generate('Edwin suuuu');
        }


    public function qr_generate($id){

        $matricula = DB::table('alumnos')->where('id', $id)->value('matricula');
        $nombre = DB::table('alumnos')->where('id', $id)->value('nombre');
        //QrCode::format('png')->size(500)->color(0,0,255)->generate('Edwin Papucho', '../public/qrcodes/qrcode.png');
        
        //qr_download($id);
        
        return view('alumno.qr', ['matricu' => $matricula, 'nom' => $nombre]);

    }

    public function qr_download($id){

        //id_grupo, f_inscripcion, nombre, f_nacimiento, edad, nacionalidad,sexo, curp, tipo_sanguineo, estado_civil, enfermedad, ocupacion(estudiante)
        $alumnos = DB::table('alumnos')->where('id', $id)->get();
        $id_grupo = DB::table('alumnos')->where('id', $id)->value('id_grupo');
        $id_carrera = DB::table('alumnos')->where('id', $id)->value('id_carrera');
        $f_nacimiento = DB::table('alumnos')->where('id', $id)->value('f_nacimiento');

        $fecha = time() - strtotime($f_nacimiento);

        $edad = floor($fecha / 31556926);

        //id_cuatrimestre
        $id_cuatrimestre = DB::table('grupos')->where('id', $id_grupo)->value('id_cuatrimestre');
        
        //periodo
        $cuatrimestres = DB::table('cuatrimestres')->where('id', $id_cuatrimestre)->get();
        
        $carreras = DB::table('carreras')->where('id', $id_carrera)->get();
        
        //id_domicilio
        $id_domicilio = DB::table('detalle_domicilios')->where([
            ['id_volatil', '=', $id],
            ['tipo', '=', 'Alumno'],
        ])->value('id_domicilio');

        //domicilio, 
        $domicilios = DB::table('domicilios')->where('id', $id_domicilio)->get();


        $referencia_alumnos = DB::table('referencia_alumnos')->where('id_alumno', $id)->get();
        
        //id_contactos
        $id_contacto = DB::table('detalle_contactos')->where([
            ['id_volatil', '=', $id],
            ['tipo', '=', 'Alumno'],
        ])->value('id_contacto');

        //correo, telefono, celular, otro,  
        $contactos = DB::table('contactos')->where('id', $id_contacto)->get();
        


        return view('alumno.qr', compact('alumnos', 'cuatrimestres', 'domicilios', 'contactos', 'referencia_alumnos', 'carreras'),['edad' => $edad]);

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $alumno = Alumno::findOrFail($id);
        
        //grupo
        $grupos = Grupo::all();
        //carrera
        $carreras = Carrera::all();
        //plantel
        $plantels = Plantel::all();

        return view('alumno.edit', ['vol' => $id], compact('alumno','grupos','carreras','plantels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombre'=>'required|string|max:100',
            'ap_p'=>'required|string|max:60',
            'ap_m'=>'required|string|max:60',
            'matricula'=>'required|string|max:100',
            'seguro_social'=>'required|string|max:100',
            'f_nacimiento'=>'required|date',
            'curp'=>'required|string|max:20',
            'nacionalidad'=>'required|string|max:20',
            'tipo_sanguineo' => 'required|string|max:5',
            'enfermedad' => 'required|string|max:100',
            'estado_civil' => 'required|string|max:20',
            'status'=>'required|string|max:50',
            'f_ingreso'=>'required|date',
            'f_egreso'=>'required|date',
            'url_foto'=>'required|max:10000',

            'id_grupo'=>'required|Integer',
            'id_carrera'=>'required|Integer',
            'id_plantel'=>'required|Integer'
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
            
        ];

        if($request->hasFile('url_foto')){
            $campos = ['url_foto'=>'required|max:10000'];
            $mensaje = ['url_foto.required'=>'La foto es requerida'];
        }

        $this->validate($request, $campos, $mensaje);


        $datosAlumno = $request->except(['_token','_method']);

        if($request->hasFile('url_foto')){
            $alumno = Alumno::findOrFail($id);
            
            Storage::delete('fotos/'.$alumno->url_foto);

            $datosAlumno['url_foto'] = $request->file('url_foto')->store('users','fotos');
        }

        Alumno::where('id','=',$id)->update($datosAlumno);

        $alumno = Alumno::findOrFail($id);

        //return view('empleado.edit', compact('empleado'));
        return redirect('alumno')->with('mensaje','Alumno Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $alumno = Alumno::findOrFail($id);
        if(Storage::delete('public/'.$alumno->url_foto)){

            if(Alumno::destroy($id)){
                $id_user = DB::table('users')->where([
                    ['id_volatil', '=', $id],
                    ['perfil', '=', 'Alumno'],
                ])->value('id');

                $id_detalle_contacto = DB::table('detalle_contactos')->where([
                    ['id_volatil', '=', $id],
                    ['tipo', '=', 'Alumno'],
                ])->value('id');

                $id_detalle_domicilio = DB::table('detalle_domicilios')->where([
                    ['id_volatil', '=', $id],
                    ['tipo', '=', 'Alumno'],
                ])->value('id');
                
                $id_contacto = DB::table('detalle_contactos')->where([
                    ['id_volatil', '=', $id],
                    ['tipo', '=', 'Alumno'],
                ])->value('id_contacto');

                $id_domicilio = DB::table('detalle_domicilios')->where([
                    ['id_volatil', '=', $id],
                    ['tipo', '=', 'Alumno'],
                ])->value('id_domicilio');
                
                User::destroy($id_user);

                detalle_contacto::destroy($id_detalle_contacto);

                Detalle_domicilio::destroy($id_detalle_domicilio);

                Contacto::destroy($id_contacto);

                Domicilio::destroy($id_domicilio);
                
                return redirect('dashboard');
            }

        }
        
        return redirect('alumno')->with('eliminar','ok');
    }

    public function downloadPDF($id){

        //id_grupo, f_inscripcion, nombre, f_nacimiento, edad, nacionalidad,sexo, curp, tipo_sanguineo, estado_civil, enfermedad, ocupacion(estudiante)
        $alumnos = DB::table('alumnos')->where('id', $id)->get();
        $id_grupo = DB::table('alumnos')->where('id', $id)->value('id_grupo');
        $id_carrera = DB::table('alumnos')->where('id', $id)->value('id_carrera');
        $f_nacimiento = DB::table('alumnos')->where('id', $id)->value('f_nacimiento');

        $fecha = time() - strtotime($f_nacimiento);

        $edad = floor($fecha / 31556926);

        //id_cuatrimestre
        $id_cuatrimestre = DB::table('grupos')->where('id', $id_grupo)->value('id_cuatrimestre');
        
        //periodo
        $cuatrimestres = DB::table('cuatrimestres')->where('id', $id_cuatrimestre)->get();
        
        $carreras = DB::table('carreras')->where('id', $id_carrera)->get();
        
        //id_domicilio
        $id_domicilio = DB::table('detalle_domicilios')->where([
            ['id_volatil', '=', $id],
            ['tipo', '=', 'Alumno'],
        ])->value('id_domicilio');

        //domicilio, 
        $domicilios = DB::table('domicilios')->where('id', $id_domicilio)->get();


        $referencia_alumnos = DB::table('referencia_alumnos')->where('id_alumno', $id)->get();
        
        //id_contactos
        $id_contacto = DB::table('detalle_contactos')->where([
            ['id_volatil', '=', $id],
            ['tipo', '=', 'Alumno'],
        ])->value('id_contacto');

        //correo, telefono, celular, otro,  
        $contactos = DB::table('contactos')->where('id', $id_contacto)->get();
  
        return $pdf = PDF::loadView('alumno.qrb', compact('alumnos', 'cuatrimestres', 'domicilios', 'contactos', 'referencia_alumnos', 'carreras'),['edad' => $edad])->setOptions([['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]])->stream('archivo.pdf');
        
        //$pdf = PDF::loadView('alumno.qr', compact('alumnos', 'cuatrimestres', 'domicilios', 'contactos', 'referencia_alumnos', 'carreras'),['edad' => $edad])->setOptions(['defaultFont' => 'sans-serif']);
        //return $pdf->download('$HOME\Downloads-pum.pdf');

        
      }


}