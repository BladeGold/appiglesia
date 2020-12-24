@extends('layouts.app')


@section('content')
    <div class="container">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-10">

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <form method="POST" action="{{route('iglesias.store')}}">
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