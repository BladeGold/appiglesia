@extends('layouts.app')

@section('content')


    <div class="container-fluid">
       
        <div class="">
        <h2 class="col-sm-10">Lista de balances de la iglesia {{$iglesia->name}} </h2>    
        
        <button type="button" class="btn btn-success float-right btn-alert" data-toggle="modal" >Generar Balances</button>
        </div>
        <div class="row justify-content-center">
            @csrf
        <table class="table table-bordered " id="table_balance" >
                <thead class="thead-dark">
                <tr>
                   
                    <th scope="col"  >Categoria</th>
                    <th scope="col" >Monto</th>
                    <th scope="col"  >Fecha</th>
                    <th scope="col" >Inicial</th>
                    <th scope="col"  >Opciones</th>

                </tr>
                </thead>
                <tbody>    
                                               
                    @foreach ($balances as $balance)
                <tr data-id="{{$balance->id}}" value="{{$balance->fecha}}" class="{{$balance->fecha}}">
                    <th data-id="">{{$categorias[$balance->categoria]}}</th>
                    <th>{{$balance->monto}}</th>
                    <th>{{$balance->fecha}}</th>
                    <th>{{$balance->inicial ? 'X' : ''}}</th>                    
                    <th>@include('balances.action')</th>

                </tr>
                
                @endforeach
               
                </tbody>
            </table>

    {}
        </div>

    </div>
    
    
@endsection
@push('scripts')


    <script>
        


        $(function () {
            $(document).ready(function() {
                $('#table_balance').DataTable({
                    
                    
                });
            } );
        });

        $('document').ready(function(){
            $('.btn-alert').click(function(){
                var id= "{{$iglesia->id}}";
                var token= $('input[name=_token]').attr('value');
                
                Swal.fire({
                    title: 'Selecciona el tipo de Balance:',
                    input: 'radio',
                    inputOptions: {
                        'mensual': 'Mensual',
                        'ahora': 'Hasta el momento',
                        
                    },
                    inputValidator: function(result) {
                        if (!result) {
                        return '¡Selecciona una Opción!';
                        }
                    }
                    }).then(function(result)  {
                    if (result.value) {
                        
                        $.ajax({
                                url: 'store',
                                
                                data: { tipo: result.value},
                                headers: {
                                        'X-CSRF-Token': token 
                                 }, 
                                type : 'POST',
                                success : function(result) {
                                    Swal.fire({
                                        icon: result.icon,
                                        title: result.title,
                                        text: result.text,
                                        confirmButtonText: `Ok`,
                                    }).then((resul) => {
                                        if(resul.isConfirmed){
                                            
                                        }
                                    });

                                },
                                error: function (result){
                                    
                                        Swal.fire({
                                            icon: result.responseJSON.icon,
                                            title: result.responseJSON.title,
                                            text: result.responseJSON.text,
                                        });
                                    
                                   
                                }
                        })
                       
                    }
                    
                });
            });

            $('.btn-delete').click(function(){
                var row= $(this).parents('tr');
                var id= row.data('id');
                var balance= row.attr('value');
                var form= $('#form-delete');
                var url= form.attr('action').replace(':BALANCE-ID', id);
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
                                title: "¡Los Balances correspondientes a la fecha "+result.fecha+" ha sido eliminado con exito!",
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