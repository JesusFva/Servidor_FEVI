@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'grupo_materia/create'
])

@section('content')
<div class="container">

<form action="{{ url('/grupo_materia') }}" method="post" enctype="multipart/form-data">
@csrf
@include('grupo_materia.form',['modo'=>'Crear'])

</form>
</div>
@endsection