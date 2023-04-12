@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'contacto/create'
])

@section('content')
<div class="container">

<form action="{{ url('/cuatrimestre') }}" method="post">
@csrf
@include('cuatrimestre.form',['modo'=>'Crear'])

</form>
</div>
@endsection

