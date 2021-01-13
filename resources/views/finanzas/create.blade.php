@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        

                        <div class="card card-primary ">
                            <div class="card-header">
                                <h3>Registrando finanzas en la iglesia {{$iglesia->name}} </h3>
                            </div>
                            <div class="card-body box-profile">
                                <form method="POST" action="{{ route('finanzas.store') }}">
                                    
                                    @csrf
                                    <div class="row">
                                        <label >Selecione el tipo de finanza a registrar:</label>
                                        <div class="form-group col-sm">
                                            <select name="tipo" class="form-control" id="tipo_select" >
                                                <option value='null'> Selecciona una opcion </option>
                                                <option value="activo"> Registrar Activo (ingresos) </option>
                                                <option value="pasivo"> Registrar Pasivo (egresos) </option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                        @include('finanzas.partials.form')                                  

                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>



@endsection

@push('scripts')
<script>

$(document).ready(function(){
    $('#tipo_select').change(function(){
        var  tipo =  $(this).val();
        if(tipo == 'activo'){
            
            $('#categorias').removeAttr('hidden');
            $('#boton').removeAttr('hidden');
            $('#title').html('Finanzas de tipo '+tipo+ ' (ingresos)');

            var  activos = document.querySelectorAll('.finanza');
            var  pasivos = document.querySelectorAll('.pasivo');

            pasivos.forEach(element=>{
                element.hidden=true;
            });

            activos.forEach(element=>{
                element.hidden=false;
            });

            

           
        }
        if(tipo == 'pasivo'){
            $('#categorias').removeAttr('hidden');
            $('#boton').removeAttr('hidden');
            $('#title').html('Finanzas de tipo '+tipo+ ' (egresos)' );

            var  activos = document.querySelectorAll('.finanza');
            var  pasivos = document.querySelectorAll('.pasivo');

            activos.forEach(element=>{
                element.hidden=true;
            });
            pasivos.forEach(element=>{
                element.hidden=false;
            });
        }
       
        if(tipo == 'null'){
            var label = document.querySelectorAll('.finanza');
            label.forEach(element=>{
                element.hidden=true;
            });
            document.getElementById('categorias').hidden=true;
            document.getElementById('boton').hidden=true;
            $('#title').html(''); 
        }

    });
    
    $( 'input:checkbox' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        $('.'+$(this).val()).removeAttr('hidden');
        $('.'+$(this).val()).removeAttr('disabled');
        
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        var check = document.querySelectorAll('.'+ $(this).val() );

        check.forEach(element => {
            element.hidden=true;
            element.disabled=true;
            });

        
        
        
    }
    });
    
})


</script>
    
@endpush