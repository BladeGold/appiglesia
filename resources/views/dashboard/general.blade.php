@extends('layouts.app')


@section('content')
<div class="container">
    <section class="content">
        <div class="container-fluid">
            <div>
                <h3>Bienvenido, <p><strong> Sr.(a) {{Auth::user()->name}} {{ Auth::user()->last_name}} </strong> </p></h3>
           </div>

            
                
        

            
            
            <div class="card border-primary mb-3" >
                <div class="card-header">Usted es Miembro en <strong> Iglesia de Dios de la Profecía en  {{$iglesia->name}}</strong></div>
                <div class="card-body text-primary">
            
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 style="font-size: 
                                    22px">{{ isset($pastor) ? $pastor->name.' '.$pastor->last_name : 'Sin asignar'}}</h3>

                                    <p>Pastor</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                

                                <a href="{{route('iglesias.show', $iglesia->id)}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                            
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $miembros_count ?? 0}}</h3>

                                    <p>Miembros registrado</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                
                                <a href="{{route('iglesias.show', $iglesia->id)}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                            
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p>Notificaciones</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>

                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    
                </div>
            </div>
        @if((auth()->user()->hasRole('pastor')) || (auth()->user()->hasRole('tesorera')))
            <div class="card border-primary mb-3" >
                <div class="card-header">Estadisticas Financieras <strong> Iglesia de Dios de la Profecía Bolívar-Sur  </strong></div>
                    <div class="card-body text-primary">        
                        <div class="row justify-content-center">
                            <div class="col-sm-3 col-4">
                                <!-- small box -->
                                <div class="small-box bg">
                                    <div class="inner">
                                       
                                        <canvas id="total" width="200" height="200"></canvas>
                                    </div>  
                                </div>
                            </div>
                    
                            <!-- ./col -->
                            <div class="col-sm-3 col-4">
                                <!-- small box -->
                                <div class="small-box bg">
                                    <div class="inner">
                                        
                                        <canvas id="mes" width="200" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-sm-3 col-4">
                                <!-- small box -->
                                <div class="small-box bg">
                                    <div class="inner">
                                        
                                        <canvas id="mesanterior" width="200" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
          @endif  
        </div><!-- /.container-fluid -->
        <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable ui-sortable">
                    <div id='calendar'></div>
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                
</div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="calendarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
        </div>
        <div class="modal-body">
            <div class="d-none">
                    <input type="text" class="form-control" name="id" id="id">
                 
                    <input type="text" class="form-control" name="fecha" id="fecha">
            </div>
            <div class="form-row">
                <div class="form-group col-sm-8">
                    <label>Titulo:</label>
                    <input type="text" class="form-control" name="titulo" id="titulo">
                    <div class="input-group">
                        <span class=""> <strong class="titulo text-danger fs-6 fst-italic"> </strong> </span>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label>Hora:</label>
                    <input type="time" min="07:00" max="19:00" step="600" class="form-control" name="hora" id="hora">
                    <div class="input-group">
                        <span class=""> <strong class="hora text-danger fs-6 fst-italic"> </strong> </span>
                    </div>
                </div>
                <div class="form-group col-sm-8">
                    <label> Fecha de Fin: </label>
                    <input type="date" class="form-control" name="fechaend" id="fechaend">
                    <div class="input-group">
                        <span class=""> <strong class="fechaend text-danger fs-6 fst-italic"> </strong> </span>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label> Hora de Fin: </label>
                    <input type="time" class="form-control" name="horaend" id="horaend">
                    <div class="input-group">
                        <span class=""> <strong class="horaend text-danger fs-6 fst-italic"> </strong> </span>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label>Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3"></textarea>
                    <div class="input-group">
                        <span class=""> <strong class="descripcion text-danger fs-6 fst-italic"> </strong> </span>
                    </div>
                </div>
                
        </div>

            </div>
          
        <div class="modal-footer">
        @can('eventos.create')
            <button type="button" id="btnAgregar" class="btn btn-success" id="btnAgredar">Agregar</button>
        @endcan
        @can('eventos.edit')
            <button type="button" id="btnModificar" class="btn btn-warning" id="btnModificar">Modificar</button>
        @endcan
        @can('admin')   
            <button type="button" id="btnEliminar" class="btn btn-danger" id="btnEliminar">Eliminar</button>
        @endcan
        @can('eventos.create')
            <button type="button" data-bs-dismiss="modal" id="btnCancelar" class="btn btn-secondary" id="btnCancelar">Cancelar</button>
        @endcan
        </div>
      </div>
    </div>
  </div>




@endsection
@isset($activos)
@push('scripts')
<script>
var mesActual = "{{$mesActual}}"
var mesAnterior = "{{$mesAnterior}}"
var activos = "{{$activos}}";
var pasivos = "{{$pasivos}}";
var activosmes="{{$activosmes}}"
var pasivosmes="{{$pasivosmes}}"
var activosanterior="{{$activosanterior}}"
var pasivosanterior="{{$pasivosanterior}}"
var ctx = $('#total');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Activos', 'Pasivos'],
        datasets: [{
            label: 'Registro Financiero',
            data: [activos, pasivos],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1.5
        }]
    },
    options: {
                 responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Finanzas Totales ',
				},
				animation: {
					animateScale: true,
					animateRotate: true
				},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var ct = $('#mes');
var myChart = new Chart(ct, {
    type: 'doughnut',
    data: {
        labels: ['Activos', 'Pasivos'],
        datasets: [{
            label: 'Registro Financiero',
            data: [activosmes, pasivosmes],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1.5
        }]
    },
    options: {
                 responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Finanzas del Mes '+mesActual
				},
				animation: {
					animateScale: true,
					animateRotate: true
				},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var cx = $('#mesanterior');
var myChart = new Chart(cx, {
    type: 'doughnut',
    data: {
        labels: ['Activos', 'Pasivos'],
        datasets: [{
            label: 'Registro Financiero',
            data: [activosanterior, pasivosanterior],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1.5
        }]
    },
    options: {
                 responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Finanzas del mes Anterior '+mesAnterior
				},
				animation: {
					animateScale: true,
					animateRotate: true
				},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>    
@endpush
@endisset

@section('scripts')
<link href='{{asset('fullcalendar/lib/main.css')}}' rel='stylesheet' />
<script src='{{asset('fullcalendar/lib/main.js')}}'></script>
<script src='{{asset('fullcalendar/lib/locales/es.js')}}'></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        
        headerToolbar:{
            start: 'prev,next today',
            center:'title',
            end:'dayGridMonth,timeGridWeek,timeGridDay',
        },
        
        locale: 'es',
        dateClick: function(info){
            limpiarFormulario();
            $('#title').html(info.dateStr);

            $('#fecha').val(info.dateStr);

            $('#btnAgregar').prop("disabled",false);
            $('#btnAgregar').prop("hidden",false);

            $('#btnModificar').prop("disabled",true);
            $('#btnModificar').prop("hidden",true);

            $('#btnEliminar').prop("disabled",true);
            $('#btnEliminar').prop("hidden",true);

            $('#calendarModal').modal('toggle');
        },
        eventSources: [
            "{{url('/eventos/show')}}",
            "{{url('/eventos/regional/1')}}",
        ],
        

        eventClick: function(info){
            $('#title').html('');
            
            mes = (info.event.start.getMonth()+1);
            dia = (info.event.start.getDate());
            anio = (info.event.start.getFullYear());

            mesend = (info.event.end.getMonth()+1);
            diaend = (info.event.end.getDate());
            anioend = (info.event.end.getFullYear());
            
            mes=(mes<10)?"0"+mes:mes;
            dia=(dia<10)?"0"+dia:dia;
            
            mesend=(mes<10)?"0"+mesend:mesend;
            diaend=(dia<10)?"0"+diaend:diaend;

            hora=info.event.start.getHours();
            minuto=info.event.start.getMinutes();

            hora=(hora<10)?"0"+hora:hora;
            minuto=(minuto<10)?"0"+minuto:minuto;

            horario= (hora+":"+minuto);
            
            horaend=info.event.end.getHours();
            minutoend=info.event.end.getMinutes();
            
            horaend=(horaend<10)?"0"+horaend:horaend;
            minutoend=(minutoend<10)?"0"+minutoend:minutoend;

            horarioend= (horaend+":"+minutoend);

            $('#id').val(info.event.id);
            $('#fecha').val(anio+"-"+mes+"-"+dia);
            $('#titulo').val(info.event.title);
            $('#hora').val(horario);
            $('#fechaend').val(anioend+"-"+mesend+"-"+diaend);
            $('#horaend').val(horarioend);
            $('#descripcion').val(info.event.extendedProps.descripcion);


            $('#btnAgregar').prop("disabled",true);
            $('#btnAgregar').prop("hidden",true);

            $('#btnModificar').prop("disabled",false);
            $('#btnModificar').prop("hidden",false);

            $('#btnEliminar').prop("disabled",false);
            $('#btnEliminar').prop("hidden",false);

           $('#calendarModal').modal('toggle');
        },
        
        
       
      });
      calendar.render();
      $('#btnAgregar').click(function(){
        objEvento= recolertarDatos('POST');
        enviarInfo(' ',objEvento);

      });
      $('#btnEliminar').click(function(){
        objEvento= recolertarDatos('DELETE');
        enviarInfo('/'+$('#id').val(),objEvento);
      });
      $('#btnModificar').click(function(){
          alert('hola');
        objEvento= recolertarDatos('PUT');
        enviarInfo('/'+$('#id').val(),objEvento);
      });

      function recolertarDatos(method){
          nuevoEvento={
            id:$('#id').val(),
            titulo:$('#titulo').val(),
            descripcion:$('#descripcion').val(),
            fecha:$('#fecha').val(),
            hora:$('#hora').val(),
            fechaend:$('#fechaend').val(),
            horaend:$('#horaend').val(),
            color:$('#color').val(),
            textColor:'#FFFFFF',
            '_method':method,
           
          };
          return(nuevoEvento);           
      };
      function enviarInfo(accion,objEvento){
          url= "{{url('/eventos')}}";
          token= $("meta[name='csrf-token']").attr('content'),
            $.ajax(
                {
                    type:"POST",
                    url: url+accion,
                    data:objEvento,
                    headers: {
                                'X-CSRF-Token':token, 
                                        },
                    success: function(result){
                        $('#cerrar').click();
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        calendar.refetchEvents();
                        Swal.fire({
                            title : result.title,
                            icon: result.icon,
                        });
                    },
                    error: function(error){
                            var errors = error.responseJSON.errors;
                            $(':input').removeClass('is-invalid');
                            if(!errors.hasOwnProperty('titulo')){
                                
                                $('.titulo').html(' ');
                            }
                            if(!errors.hasOwnProperty('hora')){
                                
                                $('.hora').html(' ');
                            }
                            if(!errors.hasOwnProperty('fechaend')){
                                
                                $('.fechaend').html(' ');
                            }
                            if(!errors.hasOwnProperty('horaend')){
                                
                                $('.horaend').html(' ');
                            }
                            if(!errors.hasOwnProperty('descripcion')){
                                
                                $('.descripcion').html(' ');
                            }
                        
                            for(var i in errors){
                                if(errors.hasOwnProperty(i)){
                                    $(`input[name=${[i]}]`).addClass('is-invalid')
                                    $(`textarea[name=${[i]}]`).addClass('is-invalid')
                                    $(`.${i}`).html(`${errors[i]}`);
                                    
                                }
                            }
                    },
                }
            );
       

        };

        function limpiarFormulario(){
            $('#id').val('');
            $('#fecha').val('');
            $('#titulo').val('');
            $('#hora').val('');
            $('#fechaend').val('');
            $('#horaend').val('');
            $('#descripcion').val('');
        };

      


    
    });

  </script>

@endsection