@extends('layouts.app')
@section('content')
    <div class="container" style="padding-right:5%;  padding-left: 5%; padding-top: 2%">
        <div class="row-cols-1">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Registro de Datos </h3>

            </div>

                <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}" role="form" id="regdata">
                   @csrf
                   <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    @include('users.partials.form')
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-auto">
                            <button type="reset" class="btn btn-block btn-danger">
                                {{ __('Limpiar') }}
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-block btn-success" id="submit">
                                {{ __('Registar') }}
                            </button>
                        </div>
                    
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- Modal errors validate-->


@endsection
@push('scripts')
    <script>
        $('document').ready(function(){ //lee al cargar el documento
            $('#submit').click(function(){//acciona al darle click al boton registrar
                var form=$('#regdata'); //seleciona el formulario
                var url= form.attr('action'); //obtiene la ruta a enviar
                var data= form.serializeArray(); //obtiene los datos
                var redirect = "{{route('dashboard')}}";

                $.ajax({
                    url: url,
                    data: data,
                    type: 'POST',
                    headers: {
                          'X-CSRF-Token': $('input[name=_token]').attr('value'), 
                        },
                    success: function(result){
                        Swal.fire({
                            title: result,
                            icon: 'success',
                            timer:1500,
                        }).then(
                            $(location).attr('href', redirect)
                        );
                    },
                    error: function(error){
                        var errors = error.responseJSON.errors;
                for(var i in errors){
                    if(errors.hasOwnProperty(i)){
                        $(`input[name=${[i]}]`).addClass('is-invalid')
                        $(`select[name=${[i]}]`).addClass('is-invalid')
                        $(`.${i}`).html(`${errors[i]}`);
                    }
                }
                    }
                });


            });

        })
    </script>
    
@endpush