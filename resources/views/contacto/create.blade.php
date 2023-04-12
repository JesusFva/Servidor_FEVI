@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'contacto/create'
])
@section('content')

<div class="container">
<br>
<br>
<br>

<form action="{{ url('/contacto') }}" method="post">
@csrf
@include('contacto.form',['modo'=>'Crear'])

</form>
</div>
@endsection