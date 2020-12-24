@extends('layouts.app')

@section('title') Perfil -@endsection

@section('content')
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Imagen de Perfil -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('imgprofile/').'/'.Auth::user()->imagen }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$user->name}} {{$user->last_name}}</h3>
                                    
                                <p class="text-muted text-center">{{$rol}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <i class="fa fa-calendar" aria-hidden="true"></i> <b>Fecha de Nacimiento: </b> <a class="float-right">{{$user_date->fecha_nacimiento}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-transgender" aria-hidden="true"></i> <b>Sexo: </b> <a class="float-right">{{$user_date->sexo}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-map-pin" aria-hidden="true"></i>  <b>Lugar de Nacimiento: </b> <a class="float-right">{{$user_date->lugar_nacimiento}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-map-marker-alt mr-1"></i> <b>Localidad: </b> <a class="float-right">{{$user_date->estado}}, {{$user_date->ciudad}}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-8">
                        <!-- Otros Datos Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Otros Datos</h3>
                                <div class="col-sm-3 float-left"> <a href="{{route('users.edit', Auth::id() )}} "><button type="button" class="btn btn-block btn-warning btn-sm">Editar</button></a></div>
                                
                                    <div class="form-group" >
                                        <button type="button" class="btn btn-sm btn-secondary float-right" data-toggle="modal" data-target="#addRole">Cambiar contraseña</button>
                                    </div>
                                
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fa fa-book mr-1"></i> Estado Civil:</strong>
                                <p class="text-muted">
                                    {{$user_date->estado_civil}}
                                </p>

                                <hr>

                                <strong> <i class="fa fa-map" aria-hidden="true"></i> Dirección:</strong>
                                <p class="text-muted">{{$user_date->direccion}}</p>

                                <hr>

                                <strong> <i class="fa fa-passport" aria-hidden="true"></i> Nacionalidad: </strong>
                                <p class="text-muted">
                                    {{$user_date->nacionalidad}}
                                </p>

                                <hr>

                                <strong> <i class="fa fa-id-card-o" aria-hidden="true"></i> Cedula:</strong>
                                <p class="text-muted">{{$user_date->cedula}}</p>

                                <hr>

                                <strong> <i class="fa fa-mobile" aria-hidden="true"></i> Telefono: </strong>

                                <p class="text-muted">
                                    {{$user_date->telefono}}
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.col -->
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>


    <!--Modal-->
    <div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.updatePassword', $user->id ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input-group mb-3">
                            <input id="password"  required type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contraseña">
                            <div class="input-group">
                                
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input id="password-confirm" required type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Repetir Contraseña">
                            <div class="input-group">
                                
                            </div>
                        </div> 
                        <hr>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña actual</label>

                            <div class="col-md-6">
                                <input id="password-actual" type="password" class="form-control @error('password-actual') is-invalid @enderror" name="password-actual" required autocomplete="current-password">

                                @error('password-actual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                </div>                            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
