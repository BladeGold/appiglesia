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

        <div class="">
        <h2 class="col-sm-10">Lista de balances de la iglesia {{$iglesia->name}}</h2>    
        
            <a href="{{route('finanzas.balance')}}" class="btn  btn btn-success float-right col-sm-offset-2" > Generar Balance </a>
        </div>
        <div class="row justify-content-center">
  
        <table class="table table-bordered  dt-responsive nowrap" id="table_balance" >
                <thead class="thead-dark">
                <tr>
                   
                    <th scope="col"  >Fecha</th>
                    <th scope="col"  >Categoria</th>
                    <th scope="col" >Monto</th>
                    <th scope="col" >Inicial</th>
                    <th scope="col"  >Opciones</th>

                </tr>
                </thead>
                <tbody>                                
                    @foreach ($balances as $balance)
                <tr data-id="">
                    <th>{{$balance->created_at->format('Y-m-d')}}</th>
                    <th>{{$categorias[$balance->categoria]}}</th>
                    <th>{{$balance->monto}}</th>
                    <th>{{$balance->inicial ? 'X' : ''}}</th>
                    
                    
                    <th>@include('finanzas.action')</th>

                </tr>
                @endforeach
               
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