@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h2>Lista finanzas de la iglesia {{$iglesia->name}}</h2>    
        <div class="row justify-content-center">

        

        <table class="table table-bordered " id="table_finanzas" style="" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col" >Categoria</th>
                    <th scope="col" >Monto</th>
                    <th scope="col"  >Fecha</th>
                    <th scope="col"  >Descripcion</th>
                    <th scope="col"  >Tipo</th>
                    <th scope="col"  >Opciones</th>

                </tr>
                </thead>
                <tbody> 
                                               
                @foreach ($finanzas as $finanza)

                <tr data-id="{{$finanza->id ?? ''}}" value="{{$finanza->fecha ?? ''}}" class="{{$finanza->fecha ?? ''}}">
                    <th>{{$categorias[$finanza->categoria]}}</th>
                    <th>{{$finanza->monto}}</th>
                    <th>{{$finanza->fecha}}</th>
                    <th>{{$finanza->descripcion ?? 'Sin Descripción'}}</th>
                    <th>{{$finanza->tipo}}</th>
                    <th>@include('finanzas.action')</th>

                </tr>
                    
                @endforeach
                
                </tbody>
            </table>

    
        </div>

        
       

    </div>
    
    
@endsection
@push('scripts')


    <script>
        


        
            $(document).ready(function() {
                $('#table_finanzas').DataTable({
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
                    "order": [[ 3, "desc" ]]
                });

                $('.btn-delete').click(function(){
                var row= $(this).parents('tr');
                var id= row.data('id');
                var balance= row.attr('value');
                var form= $('#form-delete');
                var url= form.attr('action').replace(':FINANZA-ID', id);
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
                            $("tr[value="+balance+"]").fadeOut();
                            Swal.fire({
                                title: "¡Los Registros correspondientes a la fecha "+result.fecha+" ha sido eliminado con exito!",
                                icon: "success",
                                button: true,
                            })
                        });
                    }else{
                        Swal.fire("¡Acción cancelada");
                    }

                });
                    
                
            })
            });
        

        

        
    </script>

@endpush