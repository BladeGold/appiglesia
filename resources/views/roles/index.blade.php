@extends('layouts.app')

@section('content')

    <div class="container-fluid">
     
        <a type="button" class="btn btn-sm btn-success float-right" href="{{route('roles.create')}}">Crear Rol</a>
            <h2>Lista de Roles registrados</h2> 

            <div class="row justify-content-center">
            

        <table class="table table-bordered  " id="table_roles" style="" >
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
    </div>



@push('scripts')
    <script>
        

        $('document').ready(function(){

            $('#table_roles').DataTable({
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

            $('.btn-delete').click(function(){
                var row= $(this).parents('tr');
                var id= row.data('id');
                var form= $('#form-delete');
                var url= form.attr('action').replace(':IGLESIA-ID', id);
                var data= form.serialize();

               Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no se podra recuperar la informacion! ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: `Si`,
               }).then((result)=>{
                    if(result.isConfirmed){
                        $.post(url,data, function(result){
                            row.fadeOut();
                            Swal.fire({
                                title: "¡El iglesia "+result.name+" ha sido eliminado con exito!",
                                icon: "success",
                                button: true,
                           })
                       });

                   }else{
                        Swal.fire("¡Acción Cancelada!");
                    }
               });
            });
        });
    </script>
@endpush
@endsection
