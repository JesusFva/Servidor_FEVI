@extends('layouts.main', [
    'class' => 'register-page',
    'backgroundImagePath' => 'img/bg/jan-sendereks.jpg'
])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ml-auto" style="margin: 0px 0px 67px 0px">
                    <div class="info-area info-horizontal mt-5">
                        <div class="icon icon-primary" style="font-size: 18px;">
                            <i class="fa fa-university" aria-hidden="true" style="margin: 0px 15px 0px 0px"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title" style="font-size: 18px;">{{   __('Bachillerato') }}</h5>
                            <p class="description">
                                {{ __('Especialízate en el área que elijas y haz tu bachillerato al mismo tiempo.') }}
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="info-area info-horizontal">
                        <div class="icon icon-primary" style="font-size: 18px;">
                            <i class="fa fa-graduation-cap" aria-hidden="true" style="margin: 0px 15px 0px 0px"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title" style="font-size: 18px;">{{ __('Licenciaturas') }}</h5>
                            <p class="description">
                                {{ __('Estudia tu licenciatura sin dejar de trabajar y continúa con tu crecimiento académico.') }}
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="info-area info-horizontal">
                        <div class="icon icon-info" style="font-size: 18px;">
                            <i class="fa fa-briefcase" aria-hidden="true" style="margin: 0px 15px 0px 0px"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title" style="font-size: 18px;">{{ __('Especialidades') }}</h5>
                            <p class="description">
                                {{ __('Mejora tu cv o bien especializate en el área de tu preferencia, mejora increíblemente en tu área de trabajo con nuestras especialidades') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mr-auto">
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Registro') }}</h4>
                        </div>
                        <div class="card-body ">
                            <form class="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input name="name" type="text" class="form-control" placeholder="Nombre" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input name="email" type="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input name="password_confirmation" type="password" class="form-control" placeholder="Confirmar contraseña" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-check text-left">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="agree_terms_and_conditions" type="checkbox">
                                        <span class="form-check-sign"></span>
                                            {{ __('Estoy de acuerdo con los') }}
                                        <a href="https://felipevillanueva.edu.mx/quienes-somos/aviso-de-privacidad/">{{ __('términos y condiciones') }}</a>.
                                    </label>
                                    @if ($errors->has('agree_terms_and_conditions'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('agree_terms_and_conditions') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Guardar') }}</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <br> <br> <br> <br> <br> <br>
     </div> 
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush
