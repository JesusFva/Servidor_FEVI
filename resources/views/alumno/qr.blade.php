@extends('layouts.main', [
'class' => 'alumno/qr'
])
@section('content')



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>QR</title>
</head>

<body>
<div class="content">
<div class="container">
             <div class="card-body shadow" >
              <div class="card-header bg-transparent border-0" style="background-color: #fff;"> 

    <table width="100%" cellpadding="1" cellspacing="1" bordercolor="#4E9797">
        <col width=10%>
        <col width=10%>
        <col width=10%>
        <col width=10%>
        <col width=10%>
        <col width=10%>
        <col width=10%>
        <col width=10%>
        <col width=10%>
        <col width=10%>

        <tbody>
            <tr>
                <td></td>
                <td valign=" middle" align="center"> <br><br>
                    <img src="{{ asset('/img/logo2.png') }}">
                </td>
                <td colspan="7" valign=" middle" align="center">
                    <h4>CENTRO DE ESTUDIOS SUPERIORES FELIPE VILLANUEVA</h4>
                </td>

            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="7" class="text-center">
                    <h4>Ficha de inscripción</h4>
                </td>

                <td class="text-center">
                </td>
            </tr>
            <tr>
                <td></td>
                <td rowspan="6" class="text-center" style="border: solid #000000">FOTO</td>
                <td></td>
                @foreach($alumnos as $alumno)
                @foreach($carreras as $carrera)
                <td colspan="3">{{$carrera->nivel_educativo}}: {{$carrera->nombre}} </td>
                @endforeach
                <td colspan="3">Modalidad: {{$alumno->modalidad}} <br>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3">Cuatrimestre: {{$alumno->no_cuatrimestre}}</td>
                @foreach($cuatrimestres as $cuatrimestres)
                <td colspan="3">Periodo: {{$cuatrimestres->periodo}} </td>
                @endforeach
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3">Inscripción/reinscripción:</td>
                <td colspan="3">Fecha de inscripción: {{$alumno->f_ingreso}} </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3">Colegiatura mensual:</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3">Costo titulación:</td>
            </tr>

            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="4">Nombre del alumno: {{$alumno->nombre}} {{$alumno->ap_p}} {{$alumno->ap_m}} </td>
                <td colspan="4">Fecha de nacimiento: {{$alumno->f_nacimiento}} </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2">Edad: {{$edad}} </td>
                <td colspan="3">Nacionalidad: {{$alumno->nacionalidad}} </td>
                <td colspan="3">Sexo: {{$alumno->seguro_social}} </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="4">CURP: {{$alumno->curp}} </td>
                <td colspan="4">Grupo sanguíneo: {{$alumno->tipo_sanguineo}} </td>
            </tr>

            <tr>
                @foreach($contactos as $contacto)
                <td></td>
                <td colspan="8">Correo electrónico: {{$contacto->correo}} </td>
            </tr>
            <tr>
                <td></td>
                @foreach($domicilios as $domicilio)
                <td colspan="8">Domicilio: {{$domicilio->calle}}, {{$domicilio->no_exterior}}, {{$domicilio->no_interior}},
                {{$domicilio->colonia}}, {{$domicilio->municipio}}, {{$domicilio->cp}}
                </td>
                @endforeach
            </tr>

            <tr>
                <td></td>
                <td colspan="8">Enfermedades, alergias o limitaciones físicas: {{$alumno->enfermedad}} </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="3">Teléfono Personal: {{$contacto->telefono}} </td>
                <td colspan="3">Teléfono de casa: {{$contacto->celular}} </td>
                <td colspan="2">Otro: {{$contacto->otro}} </td>
            @endforeach
            </tr>

            <tr>
                <td></td>
                <td colspan="4">Estado civil: {{$alumno->estado_civil}} </td>
                <td colspan="4">Ocupación: Estudiante </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="8" class="text-center">
                    <h3>Datos de una referencia</h3>
                </td>
            </tr>

            <tr>
                <td></td>
                @foreach($referencia_alumnos as $referencia_alumno)
                <td colspan="8">Nombre: {{$referencia_alumno->nombre}} {{$referencia_alumno->ap_p}} {{$referencia_alumno->ap_m}} </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="3">Teléfono de casa: {{$referencia_alumno->tel_casa}} </td>
                <td colspan="2">Teléfono celular: {{$referencia_alumno->tel_celular}} </td>
                <td colspan="3">Correo electrónico: {{$referencia_alumno->correo}} </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="8">Dirección: {{$referencia_alumno->direccion}}</td>
            </tr>
                @endforeach
            <tr>
                <td></td>
                <td colspan="4" style="border:solid #008A8A">
                    <h4>Documentos Recibidos:</h4>
                </td>
                <td colspan="1">
                    <h4>Observaciones:</h4>
                </td>
                <td colspan="3" style="border-bottom:solid #000000"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="border:solid #008A8A">Documentos</td>
                <td colspan="1" class="text-center" style="border:solid #008A8A">Original</td>
                <td colspan="1" class="text-center" style="border:solid #008A8A">Copia</td>
                <td colspan="1"></td>
                <td colspan="3" style="border-bottom:solid #000000"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="border:solid #008A8A">Acta de nacimiento</td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1"></td>
                <td colspan="3" style="border-bottom:solid #000000"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="border:solid #008A8A">Certificado 
                Bachillerato/Licenciatura/Maestría</td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1"></td>
                <td colspan="3" style="border-bottom:solid #000000"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="border:solid #008A8A">CURP</td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1"></td>
                <td colspan="3" style="border-bottom:solid #000000"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="border:solid #008A8A">Comprobante de domicilio</td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1"></td>
                <td colspan="3"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="border:solid #008A8A">Certificado Médico</td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1"></td>
                <td colspan="3" style="border-bottom:solid #000000"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="border:solid #008A8A">INE</td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1"></td>
                <td colspan="3" style="border-bottom:solid #000000"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="border:solid #008A8A">Certificado parcial/Historial académico
                (En caso de una equivalencia)</td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1"></td>
                <td colspan="3" style="border-bottom:solid #000000"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="border:solid #008A8A">4 Fotografías tamaño infantil</td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1" style="border:solid #008A8A"></td>
                <td colspan="1"></td>
                <td colspan="3" style="border-bottom:solid #000000"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="3" style="border-bottom:solid #000000"><br><br></td>
                <td colspan="1"></td>
                <td colspan="3" style="border-bottom:solid #000000"><br></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="3" class="text-center">Nombre y firma del alumno</td>
                <td colspan="1"></td>
                <td colspan="3" class="text-center">Firma del responsable de la Inscripción</td>
            </tr>

            <tr>
                <td<td>
                    </td>
                    <td colspan="8"><br><br></td>
            </tr>

        </tbody>
    @endforeach
    </table> 

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </div>
    
    </div>
    </div>
    </div>
    </div>
  
</body>


@endsection

