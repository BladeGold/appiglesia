@extends('layouts.app')

@section('title') Perfil -@endsection

@section('content')
    <div class="container">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-10">

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <form method="POST" action="{{ route('users.update', $user->id ) }}" enctype="multipart/form-data">
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
                                    
                                    

                                   

                                        @include('users.partials.form')
                                </form>

                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>



@endsection