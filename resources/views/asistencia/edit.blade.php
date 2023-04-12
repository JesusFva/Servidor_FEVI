@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'asistencia/edit'
])

@section('content')
<div class="container">
<form action="{{ url('/asistencia/'.$asistencia->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('asistencia.form',['modo'=>'Editar']);

</form>
</div>
@endsection