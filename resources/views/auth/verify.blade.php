@extends('layouts.main', [
    'class' => 'verify-page'
])

@section('content')
<div class="container ">
<div class="row justify-content-center">
            <div class="col-lg-5 col-md-7" style="margin: 0px 0px 20px 0px">
                  <br> <br> <br> <br> <br> <br>  <br> <br> <br>
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <h3>{{ __('Verifica tu email') }}</h3>
                    </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verificación ha sido enviado a tu correo.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, revisa tu correo por el link de verificación.') }}
                    
                    @if (Route::has('verification.resend'))
                        @csrf
                        {{ __('Si no recibiste el email con el link,') }},
                        <a href="{{ route('verification.resend') }}">{{ __('haz click aquí para reenviarlo') }}</a>.
                    @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

