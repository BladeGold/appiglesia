<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        
        <link rel="stylesheet" type="text/css" href="{{public_path('css/custom.css')}}">
        

        
    
    </head>
    <body >
        <section class="content"> 
            <div class="container">
                <div class="">    
                    
                    <div class="header">
                        
                        <img src="{{public_path('img/logo_iglesia.png')}}" class="logo" widtd="120" height="120" alt="Logo de la Iglesia" >
                        <img src="{{public_path('img/bandera_idp.png')}}"  class="bandera" widtd="120" height="80" alt="Bandera de la Iglesia" >
                            <div class="text-center" style="display: ">
                                
                                <p class="p"> <span> <b class="text-title"> IGLESIA DE DIOS DE LA PROFECÍA EN VENEZUELA </b> <br>
                                 RIF: J-29775519-5 APARTADO 4552 - CODIGO 2101 -A <br>
                                MARACAY, ESTADO ARAGUA - VENEZUELA <br>
                                TELEFONOS: (+58) 2243 - 263 22 63 / FAZ (+58) 0243 - 263 22 63 <br>
                                Correo Electrónico: reporteoficinanacional@hotmail.com  </span> </p>
                            </div>
                        
                    </div>
                    <div class="body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2"> INFORME MENSUAL A LA OFICINA NACIONAL </th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody> 
                            <tr>
                                <td colspan="2"> Iglesia de Dios de la Profecía en <b> {{$iglesia->name}} </b> </td>
                            </tr>
                            <tr>
                                <td colspan="2"> <b> Direccion: </b> {{$iglesia->direccion}}  </td>
                            </tr>                                
                            <tr>
                                <td colspan="2" class="text-center" > Finanzas del Mes: <b> {{$fecha->isoformat('MMMM')}}  </b> </td>
                                
                            </tr>   @php 
                                        $total = 0;
                                        $pastor = 0;
                                    @endphp                             
                                    @foreach ($categorias as $key  => $categoria)
                                            @php
                                                
                                                $suma[$key]=0;
                                            @endphp
                                        @if($loop->iteration == 2)
                                        <tr> 
                                            <td> Oficina General</td>
                                            <td> {{$general}}</td>
                                        </tr>
                                        <tr>
                                            <td>Oficina Nacional </td>
                                            <td> {{$nacional}}</td>
                                        </tr>
                                        @endif
                                        @if( ($key !== 'Fondo_Local') && ($key !== 'Diezmo_Restante') )
                                        <tr>
                                                    
                                                    <td>{{$categoria}} </td>
                                                @foreach ($finanzas as $finanza)
                                                    @if ($finanza->categoria === $key)
                                                        @php
                                                            $suma[$key] += $finanza->monto;
                                                           
                                                        @endphp
                                                                                    
                                                    @endif  
                                                @endforeach
                                                @php    
                                                    if($key === 'Diezmo_Pastor'){
                                                        if(isset($suma['Diezmo_Pastor'])){
                                                            $pastor = $suma[$key] * 0.02;
                                                        }
                                                        
                                                    }
                                                     $total+=$suma[$key];
                                                    
                                                        if($key==='Diezmo_Total'){
                                                            $general = $suma[$key] * 0.1;
                                                            $nacional = $suma[$key] * 0.05;

                                                        }  
                                                        
                                                @endphp
                                                <td>{{$key==='Diezmo_Pastor'? $pastor : $suma[$key] }}</td> 
                                        </tr>
                                        @endif
                                        @endforeach 
                                        
                                       
                                        
                                        
                                       
                            </tbody>
                        </table>
                    </div>
                    <div class="footer"></div>
                </div>
            </div>
        </section>
    </body>        
</html>
 