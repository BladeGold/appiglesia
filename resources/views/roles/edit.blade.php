@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                

                <div class="panel-body">                    
                    <form action="{{route('roles.update', $role->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        @include('roles.partials.form')
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection