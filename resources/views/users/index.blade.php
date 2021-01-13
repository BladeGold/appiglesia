@extends('layouts.app')

@section('content')

    <div class="container-fluid">
       

            <h2>Lista de usuarios registrados</h2>
            <div class="row justify-content-center">
        <table class="table table-bordered  dt-responsive nowrap" id="data_table" style="" >
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
                       <th>{{$user->name}}</th>
                       <th>{{$user->last_name}}</th>
                       <th>{{$user->email}}</th>
                       <th>{{$user->roles->pluck('name')->last()}}</th>
                       <th>@include('users.action')</th>

                   </tr>
                       
                   @endforeach
                </tbody>
            </table>
            </div>
    </div>

    
@endsection
    
    

@push('scripts')
    <script>
        $(function () {
            $(document).ready(function() {
                $('#data_table').DataTable({
                    
                    
                });
            } );
        });

        $('document').ready(function(){
            $('.btn-delete').click(function(){
                var row= $(this).parents('tr');
                var id= row.data('id');
                var form= $('#form-delete');
                var url= form.attr('action').replace(':USER-ID', id);
                var data= form.serialize();

                swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no se podra recuperar la informacion!",
                    icon: "warning",
                    buttons: ["Cancelar", "Eliminar"],
                    dangerMode: true,
                })
                .then((willDelete)=>{
                    if(willDelete){
                        $.post(url,data, function(result){
                            row.fadeOut();
                            swal({
                                title: "¡El usuario "+result.name+" "+result.last_name+" ha sido eliminado con exito!",
                                icon: "success",
                                button: true,
                            })
                        });
                    }else{
                        swal("¡Acción cancelada");
                    }

                });

                
                
            });
        });

        
        

           

    </script>
@endpush

