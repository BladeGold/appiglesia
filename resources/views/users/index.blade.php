@extends('layouts.app')

@section('content')

    <div class="container-fluid">
       

            <h2>Lista de usuarios registrados</h2>
            <div class="row justify-content-center">
        <table class="table table-bordered  " id="table_users" style="" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col" >Nombre</th>
                    <th scope="col" >Apellido</th>
                    <th scope="col"  >Email</th>
                    <th scope="col"  >Rol</th>
                    <th scope="col"  >Opciones</th>

                </tr>
                </thead>
                <tbody>                                
                   @foreach ($users as $user)
                   <tr data-id="{{$user->id}}">
                       <td>{{$user->name}}</td>
                       <td>{{$user->last_name}}</td>
                       <td>{{$user->email}}</td>
                       <td>{{$user->roles->pluck('name')->last()}}</td>
                       <td>@include('users.action')</td>

                   </tr>
                       
                   @endforeach
                </tbody>
            </table>
            </div>
    </div>

    
@endsection
    
    

@push('scripts')
    <script>
       

        
        $('document').ready(function(){

            $('#table_users').DataTable({
                    "language": {
                        "search": "Buscar:",
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

            $('.btn-delete').click(function(){
                var row= $(this).parents('tr');
                var id= row.data('id');
                var form= $('.form-delete');
                var url= form.attr('action').replace(':USER-ID', id);
                var datos= form.serialize();
               
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no se podra recuperar la informacion! ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: `Si`,
                   
                }) .then((result)=>{
                    if(result.isConfirmed){
                        $.post(url,datos, function(result){
                            row.fadeOut();
                            Swal.fire({
                                title: "¡El usuario "+result.name+" "+result.last_name+" ha sido eliminado con exito!",
                                icon: "success",
                                button: true,
                            })
                        });
                    }else{
                        Swal.fire("¡Acción cancelada");
                    }

                });
                    
                
            }); //Fin del Alert

            
                
        });
        
        

           

    </script>
@endpush

