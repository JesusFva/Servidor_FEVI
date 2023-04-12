@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'plantel/create'
])

@section('content')
<div class="container">

<form action="{{ url('/plantel') }}" method="post" enctype="multipart/form-data">
@csrf
@include('plantel.form',['modo'=>'Crear'])

</form>
</div>
@endsection