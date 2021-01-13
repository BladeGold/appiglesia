@extends('layouts.app')

@section('content')

    <div class="container-fluid">
     
        <a type="button" class="btn btn-sm btn-success float-right" href="{{route('iglesias.create')}}">Crear una nueva iglesia</a>
            <h2>Lista de usuarios registrados</h2> 

      
            <div class="row justify-content-center">
        <table class="table table-bordered  dt-responsive nowrap" id="data_table" style="" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col" width="100px">Nombre</th>
                    <th scope="col" width="100px">Dirección</th>
                    
                    
                    <th scope="col"  width="80px">Opciones</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($iglesias as $iglesia)
                    <tr data-id="{{$iglesia->id}}">
                        <td>{{$iglesia->name}}</td>
                        <td>{{$iglesia->direccion}}</td>
                        
                        <td>@include('iglesias.action')</td>
                    </tr>
                        
                    @endforeach
                   
                </tbody>
            </table>
            </div>
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

        $('document').ready(function(){
            $('.btn-delete').click(function(){
                var row= $(this).parents('tr');
                var id= row.data('id');
                var form= $('#form-delete');
                var url= form.attr('action').replace(':IGLESIA-ID', id);
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
                       $.post(url,data,function(result){
                            row.fadeOut();
                           swal({
                                title: "¡El iglesia "+result.name+" ha sido eliminado con exito!",
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
