@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'calificacion/edit'
])

@section('content')
<div class="container">
<form action="{{ url('/calificacion/'.$calificacion->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('calificacion.form',['modo'=>'Editar']);

</form>
</div>
@endsection