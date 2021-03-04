@extends('layouts.app')

@section('content')

@section('content')
    <div class="container">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        

                        <div class="card card-primary ">
                            <div class="card-header">
                               <p> Editando Registro de tipo {{$finanzas->tipo}} en la categoria {{$categorias[$finanzas->categoria]}}  </p>
                            </div>
                            <div class="card-body box-profile">
                                <form method="POST" action="{{ route('finanzas.update', $finanzas->id) }}">
                                    @method('PUT')
                                    @csrf

                                        <input type="hidden" value="{{$finanzas->categoria}}" name="categoria">

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
        $('document').ready(function(){
            var categoria = '{{$finanzas->categoria}}'
            console.log(`.${categoria}`);
            
            $(`.${categoria}`).removeAttr('hidden');
            $(`.${categoria}`).removeAttr('disabled');
            $(`.${categoria}`).prop('disabled',false);
            $('#boton').removeAttr('hidden');

        });

        
        
        

        
    </script>    
@endpush