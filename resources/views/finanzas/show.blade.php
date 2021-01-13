@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h2>Lista finanzas de la iglesia {{$iglesia->name}}</h2>    
        <div class="row justify-content-center">

        

        <table class="table table-bordered  dt-responsive nowrap" id="table_finanzas" style="" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col" >Categoria</th>
                    <th scope="col" >Monto</th>
                    <th scope="col"  >Fecha</th>
                    <th scope="col"  >Descripcion</th>
                    <th scope="col"  >Tipo</th>
                    <th scope="col"  >Opciones</th>

                </tr>
                </thead>
                <tbody>                                
                @foreach ($finanzas as $finanza)

                <tr data-id="{{$finanza->id}}">
                    <th>{{$categorias[$finanza->categoria]}}</th>
                    <th>{{$finanza->monto}}</th>
                    <th>{{$finanza->fecha}}</th>
                    <th>{{$finanza->descripcion ?? 'Sin Descripción'}}</th>
                    <th>{{$finanza->tipo}}</th>
                    <th>@include('finanzas.action')</th>

                </tr>
                    
                @endforeach
                </tbody>
            </table>

    
        </div>


        <h2>Lista de balances de la iglesia {{$iglesia->name}}</h2>    
        <div class="row justify-content-center">

        

        <table class="table table-bordered  dt-responsive nowrap" id="table_balance" style="" >
                <thead class="thead-dark">
                <tr>
                   
                    <th scope="col"  >Fecha</th>
                    <th scope="col" >Monto</th>
                    <th scope="col"  >Opciones</th>

                </tr>
                </thead>
                <tbody>                                
                
                <tr data-id="">
                    <th></th>
                    <th></th>
                    
                    <th>@include('finanzas.action')</th>

                </tr>
                    
               
                </tbody>
            </table>

    
        </div>

    </div>
    
@endsection
@push('scripts')


    <script>
        $(function () {
            $(document).ready(function() {
                $('#table_finanzas').DataTable({
                    
                    
                });
            } );
        });

        $(function () {
            $(document).ready(function() {
                $('#table_balance').DataTable({
                    
                    
                });
            } );
        });
    </script>

@endpush