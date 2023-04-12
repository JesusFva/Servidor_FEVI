@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'domicilio/create'
])

@section('content')
<div class="container">

<form action="{{ url('/domicilio') }}" method="post">
@csrf
@include('domicilio.form',['modo'=>'Crear'])

</form>
</div>
@endsection