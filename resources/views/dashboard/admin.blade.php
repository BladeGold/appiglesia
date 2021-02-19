@extends('layouts.app')
@section('title') Inicio -@endsection

@section('content')
<div class="container">
    <section class="content">
        <div class="container-fluid">
            <div>
                <h3>Bienvenido, <p><strong> Sr.(a) {{Auth::user()->name}} {{ Auth::user()->last_name}} </strong> </p></h3>
           </div>
            <!-- Small boxes (Stat box) -->
            
        <div class="card border-primary mb-3" >
            <div class="card-header">Estadisticas de la <strong> Iglesia de Dios de la Profecía Bolívar-Sur  </strong></div>


                <div class="card-body text-primary">
        
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $users_count ?? '0' }}</h3>

                            <p>Usuarios Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('users.index')}}" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $iglesias_count ?? '0' }}</h3>

                            <p>Iglesias Registradas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('iglesias.index')}}" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
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
                            <h3>{{ $miembros_registrados ?? '0' }}</h3>

                            <p>Miembros Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        
                    </div>
                </div>
                <!-- ./col -->
            </div>
             </div>
            </div>
        </div>

            
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable ui-sortable">
                    <div id='calendar'></div>
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="calendarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group">
                    <input type="text" class="form-control" name="id" id="id">
                    
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="fecha" id="fecha">

                </div>
                <div class="form-group col-8">
                    <label>Titulo:</label>
                    <input type="text" class="form-control" name="titulo" id="titulo">
                    <div class="input-group">
                        <span class=""> <strong class="titulo text-danger fs-6 fst-italic"> </strong> </span>
                    </div>
                </div>
                <div class="form-group col-4">
                    <label>Hora:</label>
                    <input type="time" class="form-control" name="hora" id="hora">
                    <div class="input-group">
                        <span class=""> <strong class="hora text-danger fs-6 fst-italic"> </strong> </span>
                    </div>
                </div>
                <div class="form-group col-8">
                    <label> Fecha de culminación: </label>
                    <input type="date" class="form-control" name="fechaend" id="fechaend">
                    <div class="input-group">
                        <span class=""> <strong class="fechaend text-danger fs-6 fst-italic"> </strong> </span>
                    </div>
                </div>
                <div class="form-group col-4">
                    <label> Hora de culminación: </label>
                    <input type="time" class="form-control" name="horaend" id="horaend">
                    <div class="input-group">
                        <span class=""> <strong class="horaend text-danger fs-6 fst-italic"> </strong> </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                    <div class="input-group">
                        <span class=""> <strong class="descripcion text-danger fs-6 fst-italic"> </strong> </span>
                    </div>
                </div>
                
        </div>

            </div>
          
        <div class="modal-footer">
            <button type="button" id="btnAgregar" class="btn btn-success" id="btnAgredar">Agregar</button>
            <button type="button" id="btnModificar" class="btn btn-warning" id="btnModificar">Modificar</button>
            <button type="button" id="btnEliminar" class="btn btn-danger" id="btnEliminar">Eliminar</button>
            <button type="button" id="btnCancelar" class="btn btn-secondary" id="btnCancelar">Cancelar</button>
         
        </div>
      </div>
    </div>
  </div>




<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->

@endsection
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
            $('#fecha').val(info.dateStr);
            $('#calendarModal').modal('toggle');
        },
        eventSources: [
            "{{url('/eventos/show')}}",
            "{{url('/eventos/regional/1')}}",
        ],
        

        eventClick: function(info){
            
            $('#id').val(info.event.id);
            $('#fecha').val(info.event.startStr);
            $('#titulo').val(info.event.title);
            $('#hora').val(info.event.start);
            $('#fechaend').val(info.event.end);
            $('#horaend').val(info.event.end);
            $('#descripcion').val(info.event.extendedProps.descripcion);
           $('#calendarModal').modal('toggle');
        },
        
        
       
      });
      calendar.render();
      $('#btnAgregar').click(function(){
        objEvento= recolertarDatos('POST');
        enviarInfo(' ',objEvento);

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
                console.log(error);
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
       

        }

      


    
    });

  </script>

@endsection