@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'asistencia/create'
])

@section('content')
<div class="container">

<form action="{{ url('/tipo_asistencia') }}" method="post">
@csrf
@include('tipo_asistencia.form',['modo'=>'Crear'])

</form>
</div>
@endsection