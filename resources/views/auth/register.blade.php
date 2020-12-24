@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="register-box col-sm-6">
                <div class="register-logo">
                    <a href="{{ url('/') }}"><b>{{config('app.name')}}</b></a>
                </div>

                <div class="card ">
                    <div class="card-body register-card-body">
                        <p class="login-box-msg">Registrar un nuevo miembro</p>

                        <form  action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="input-group mb-3">
                                <input id="name" required type="text" autocapitalize="sentences" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Nombres">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <ion-icon name="person-sharp"></ion-icon>
                                    </div>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input id="last_name" required type="text" autocapitalize="sentences" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus placeholder="Apellidos">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <ion-icon name="person-sharp"></ion-icon>
                                    </div>
                                </div>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input id="email" required type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Correo">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <ion-icon name="mail-sharp"></ion-icon>

                                    </div>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input id="password"  required type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contraseña">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <ion-icon name="lock-closed-sharp"></ion-icon>
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input id="password-confirm" required type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Repetir Contraseña">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <ion-icon name="lock-closed-sharp"></ion-icon>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="rol" value="Usuario">

                            <label for="chec">Desea insertar foto de Perfil?</label>
                            <input name="chec" type="checkbox" id="check" onChange="comprobar(this);" >
                            <div class="row">
                                <div  class="input-group  col-auto">
                                    <input id="imagen" disabled type="file" accept="image/png image/jpg image/jpeg" class="form-control-file col-sm-7 @error('imagen') is-invalid @enderror" name="imagen">
                                    <div id="imagenPreview" class="col-sm-5">

                                    </div>
                                    <div class="input-group-append">
                                    @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <a href="login" class="text-center">Ya poseo una cuenta</a>
                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
            <!-- /.register-box -->
    </div>
</div>
        <!-- Main Footer -->

    <!-- ./wrapper -->
    <!-- Modal errors validate-->


@endsection