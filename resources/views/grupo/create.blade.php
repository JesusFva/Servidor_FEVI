@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'grupo/create'
])

@section('content')
<div class="container">

<form action="{{ url('/grupo') }}" method="post" enctype="multipart/form-data">
@csrf
@include('grupo.form',['modo'=>'Crear'])

</form>
</div>
@endsection