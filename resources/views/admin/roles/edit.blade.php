@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                

                <div class="panel-body">                    
                    <form action="{{route('admin.update',['roles', $role->id])}}" method="POST">
                        @method('PUT')
                        @csrf
                        @include('admin.roles.partials.form')
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection