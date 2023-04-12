<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siuuu!</title>
</head>
<body>
    <h2>Siuuuu!</h2>

 @if($parcialesAlumno == null)
    <h3>kskjshs</h3>
 @endif

 @if($parcialesAlumno != null)
    @foreach($parcialesAlumno as $pA)
        <h3>Parcial nulo{{$pA->parcial}}</h3>
    @endforeach
@endif


    <h3> AlumnoID {{$id_alumno}} </h3>
    <h3> GMID {{$id_grupo_materia}} </h3>
    <h3> Parcial {{$parcial}} </h3>
    <h3>hhhh{{$pruebaa}}</h3>

</body>
</html>