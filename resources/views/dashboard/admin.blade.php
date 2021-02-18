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
        initialView: 'dayGridMonth'
      });
      calendar.setOption('locale', 'es');
      calendar.render();
    });

  </script>

@endsection