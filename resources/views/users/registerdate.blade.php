@extends('layouts.app')
@section('content')
    <div class="container" style="padding-right:5%;  padding-left: 5%; padding-top: 2%">
        <div class="row-cols-1">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Registro de Datos </h3>

            </div>

                <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}" role="form">
                   @csrf
                   <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    @include('users.partials.form')
                </form>
            </div>
        </div>
    </div>
        <!-- Modal errors validate-->


@endsection
