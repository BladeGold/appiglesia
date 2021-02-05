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
@can('users.createMiembro')
<button type="button" class="btn btn-primary" id="nuevoMiembro" data-toggle="modal" data-target="#createMiembro"> Registrar Miembro</button>                                   
@endcan
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
    @push('scripts')
    <script>
        $(function () {
            $(document).ready(function() {
                $('#data_table').DataTable({
                    "language": {
                        "search": "Buscar:",
                        "lengthMenu": "Muestra _MENU_ registros por página",
                        "zeroRecords": "No se encontraron datos",
                        "infoEmpty": "No hay datos para mostrar",
                        "info": "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas",
                        "paginate": {
                            "first": "Primeros",
                            "last": "Ultimos",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                    },
                });

            $('#guardar').click(function(){
                var form=$('#nuevoMiembroForm');
                var url = form.attr('action');
                var data = form.serializeArray();
                
                $.ajax({
                    url: url,
                    data: data,
                    headers: {
                        'X-CSRF-Token': $('input[name=_token]').attr('value') 
                        },
                    type: "POST",
                    success:function(result){
                        $('#name').val('');
                        $('#last_name').val('');
                        $('#email').val('');
                        $('#password').val('');
                        $('#password-confirm').val('');
                        $('#cerrarCreateMiembro').click();
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        Swal.fire({
                            title : result.title,
                            icon: result.icon,
                        
                        });
                    },
                    error:function(error){
                        var errors = error.responseJSON.errors;
                        $(':input').removeClass('is-invalid');
                        if(!errors.hasOwnProperty('name')){
                            
                            $('.name').html(' ');
                        }
                        if(!errors.hasOwnProperty('last_name')){
                            
                            $('.last_name').html(' ');
                        }
                        if(!errors.hasOwnProperty('email')){
                            
                            $('.email').html(' ');
                        }
                        if(!errors.hasOwnProperty('password')){
                            
                            $('.password').html(' ');
                        }
                        for(var i in errors){
                            if(errors.hasOwnProperty(i)){
                                $(`input[name=${[i]}]`).addClass('is-invalid')
                                $(`.${i}`).html(`${errors[i]}`);
                            }
                        }
                    },
                });
            });

            });
           // $('#data_table').addClass('card');
            $('#data_table').addClass('table-responsive');

        });
    </script>
@endpush

