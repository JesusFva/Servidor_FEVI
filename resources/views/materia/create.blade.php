@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'materia/create'
])

@section('content')
<div class="container">

<form action="{{ url('/materia') }}" method="post" enctype="multipart/form-data">
@csrf
@include('materia.form',['modo'=>'Crear'])

</form>
</div>
@endsection