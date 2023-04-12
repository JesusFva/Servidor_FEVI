@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'carrera/create'
])

@section('content')
<div class="container">

<form action="{{ url('/carrera') }}" method="post" enctype="multipart/form-data">
@csrf
@include('carrera.form',['modo'=>'Crear'])

</form>
</div>
@endsection