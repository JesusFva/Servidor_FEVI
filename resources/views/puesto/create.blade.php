@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'puesto/create'
])

@section('content')
<div class="container">

<form action="{{ url('/puesto') }}" method="post">
@csrf
@include('puesto.form',['modo'=>'Crear'])

</form>
</div>
@endsection