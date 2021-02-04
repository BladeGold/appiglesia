@extends('layouts.app')

@section('title') Perfil -@endsection

@section('content')
    <div class="container">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-10">

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <form method="POST" action="{{ route('users.update', $user->id ) }}" enctype="multipart/form-data" id="formUpdate">
                                    @method('PUT')

                                @csrf
                                
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div id="imagenPreview" >
                                                    <img id="actual"   width='250' height='250' class="img-circle img-bordered" src="{{ asset('imgprofile/').'/'.Auth::user()->imagen }}" alt="User profile picture">
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span><b>Actualizar imagén de Perfil</b></span>
                                                    <input type="file" class="form-control-file" id="imagen" name="imagen">                                                    
                                                </div>  
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                        <div class="errors">
                                        </div>
                                   

                                        @include('users.partials.form')
                                        
                                        <div class="row">
                                            <!-- /.col -->
                                            <div class="col-auto">
                                                <button type="reset" class="btn btn-block btn-danger">
                                                    {{ __('Reiniciar') }}
                                                </button>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-block btn-success" id="submit">
                                                    {{ __('Actualizar') }}
                                                </button>
                                            </div>
                                        
                                            <!-- /.col -->
                                        </div>
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
        $('document').ready(function(){

            

            $('#submit').click(function(){
                var datos= $('#formUpdate').serializeArray();
                var url = "{{route('users.show', $user->id)}}";
                var data=[];
                datos.forEach(function(element,index) {
                    if((element.name !== '_method') && (element.name !== '_token')){
                         data[element.name] = element.value;                    
                    }
                });
                
                    
                $.ajax({
                    url:'/users/store',
                    data: {
                        "name" : data.name,
                        "last_name" : data.last_name,
                        "fecha_nacimiento" : data.fecha_nacimiento,
                        "lugar_nacimiento" : data.lugar_nacimiento,
                        "telefono" : data.telefono,
                        "sexo" : data.sexo,
                        "direccion" : data.direccion,
                        "ciudad" : data.ciudad,
                        "estado" : data.estado,
                        "nacionalidad" : data.nacionalidad,
                        "estado_civil" : data.estado_civil,
                        },
                    type: 'PUT',
                    
                    headers: {
                          'X-CSRF-Token': $('input[name=_token]').attr('value'), 
                                 },
                    success : function (result){
                        $(":input").removeClass("is-invalid");
                        Swal.fire({
                            title: "¡Actualización Exitosa!",
                            icon:'success',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            const content = Swal.getContent()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                b.textContent = Swal.getTimerLeft()
                                }
                            }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            $(location).attr('href', url)
                        }
                        })
                    },
                    error: function (result){
                     var errors = result.responseJSON.errors;
                     
                     var result = ``;
                     for(var i in errors){
                         if(errors.hasOwnProperty(i)){
                            result += `${errors[i]}`+"\n";
                            
                            $(`input[name=${[i]}]`).addClass("is-invalid");

                         }
                     }
                    Swal.fire({
                        title:"Error",
                        text: result.toString(),
                        icon: 'error'
                    });

                     
                     
                    },

                });

            });

        })
    </script>
    
@endpush