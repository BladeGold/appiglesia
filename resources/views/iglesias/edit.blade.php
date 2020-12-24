@extends('layouts.app')


@section('content')
    <div class="container">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        

                        <div class="card card-primary ">
                            <div class="card-header">
                                <h3>Editando datos de la iglesia {{$iglesia->name}}</h3>
                            </div>
                            <div class="card-body box-profile">
                                <form method="POST" action="{{route('iglesias.update',$iglesia->id)}}">
                                    @method('PUT')
                                    @csrf
                                
                                   @include('iglesias.partials.form')
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>



@endsection