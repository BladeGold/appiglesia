@extends('layouts.app')

@section('content')

    <div class="container-fluid">
     
        <a type="button" class="btn btn-sm btn-success float-right" href="{{route('roles.create')}}">Crear Rol</a>
            <h2>Lista de usuarios registrados</h2> 

      
            

        <table class="table table-bordered  dt-responsive nowrap" id="data_table" style="" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col" >Nombre</th>
                    <th scope="col" >Slug</th>
                    <th scope="col"  >Descripción</th>                    
                    <th scope="col"  >Opciones</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr data-id="{{$role->id}}">
                        <td>{{$role->name}}</td>
                        <td>{{$role->slug}}</td>
                        <td>{{$role->description}}</td>
                        <td>@include('roles.action')</td>
                    </tr>
                        
                    @endforeach
                   
                </tbody>
            </table>

    </div>



@push('scripts')
    <script>
        $(function () {
            $(document).ready(function() {
                $('#data_table').DataTable();
            } );
        });

        $('document').ready(function(){
            $('.btn-delete').click(function(){
                var row= $(this).parents('tr');
                var id= row.data('id');
                var form= $('#form-delete');
                var url= form.attr('action').replace(':ROLE-ID', id);
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
                        
                        $.post(url, data, function(result){
                            row.fadeOut();
                            swal({
                                title: "¡El rol "+result.name+" ha sido eliminado con exito!",
                                icon: "success",
                                button: true,
                            })
                        });
                    }else{
                        swal("¡Acción Cancelada!");
                    }

                });

                
                
            });
        });
    </script>
@endpush
@endsection
