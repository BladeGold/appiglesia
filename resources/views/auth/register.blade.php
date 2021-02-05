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

                            @include('auth.partials.form')

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