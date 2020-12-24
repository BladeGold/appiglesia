@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Imagen de Perfil -->
                        <div class="card card-primary card-outline">
                            <div class="card-body ">
                                
                                <h3 class="profile-username text-center"><i class="nav-icon fa fa-user-tag"></i> Rol: {{$role->name}} </h3>

                                

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <i class="fa fa-link" aria-hidden="true"></i> <b>URL amigable: </b> <a class="float-right">{{$role->slug}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-commenting" aria-hidden="true"></i></i> <b>Descripcion: </b> <a class="float-right">{{$role->description}}</a>
                                    </li>

                                    <li class="list-group-item">
                                        <i class="fa fa-user-shield"></i> <b>Permisos: </b> <a class="float-right">@foreach($permissions as $permission)
                                           <br>
                                                <label class="text-muted text-center">
                                                {{ $permission->name }}
                                                <em>({{ $permission->description }})</em>
                                                </label>
                                           
                                            @endforeach</a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    
                
                </div><!-- /.col -->
                <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
