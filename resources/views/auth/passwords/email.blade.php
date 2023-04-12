@extends('layouts.main', [
    'class' => 'email-page'
])

@section('content')


<div class="container ">
<div class="row justify-content-center">
            <div class="col-lg-5 col-md-7" style="margin: 0px 0px 12px 0px">
                  <br> <br> <br> <br> <br> <br>  <br> <br> <br>
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5"  style="background-color: #fff">
                    <div class="text-center text-muted mb-4">
                        <h3>{{ __('Recordar contraseña') }} </h3>
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('info'))
                            <div class="alert alert-info" role="alert">
                                {{ session('info') }}
                            </div>
                        @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                        <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">  <i class="fa fa-envelope" ></i></span>
                                    </div>
                                    
                                    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="  Email" required autocomplete="email" autofocus>
                             </div> 
                                

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                     
                        </div>

                        <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">
                                    {{ __('Enviar contraseña por correo') }}
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <br> <br> <br> <br> <br> <br>  
    </div>
</div>
<br> <br> <br> <br> <br> <br>  
</div>
@endsection