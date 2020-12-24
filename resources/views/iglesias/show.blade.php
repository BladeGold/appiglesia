@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Imagen de Perfil -->
                        <div class="card card-primary card-outline">
                            <div class="card-body ">
                                
                                <h3 class="profile-username text-center"><i class="nav-icon fa fa-church"></i> Iglesia de Dios de la Profecía en {{$iglesia->name}} </h3>

                                

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <i class="fa fa-map-marker" aria-hidden="true"> </i> <b>Dirección:</b> <a class="float-right">{{$iglesia->direccion}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-user-tie"></i> <b>Pastor: </b> <a class="float-right">@if(isset($pastor)){{$pastor->name }}  {{$pastor->last_name}} @else Sin asignar @endif</a>
                                    </li>
                                        
                                    <li class="list-group-item">
                                        <i class="fa fa-user-friends"></i> <b>Miembros: </b> 
                                            
                                           <br>
                                           <table class="table table-bordered  dt-responsive nowrap" id="data_table" style="" >
                                            <thead class="thead-dark">
                                            <tr>
                                                <th scope="col" width="100px">Nombre</th>
                                                <th scope="col" width="100px">Apellido </th>
                            
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($miembros as $miembro)
                                                <tr>
                                                    <td>{{$miembro->name}}</td>
                                                    <td>{{$miembro->last_name}}</td>
                                                    
                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                           
                                            
                                        
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

    @push('scripts')
    <script>
        $(function () {
            $(document).ready(function() {
                $('#data_table').DataTable();
            } );
           // $('#data_table').addClass('card');
            $('#data_table').addClass('table-responsive');

        });
    </script>
@endpush
@endsection
