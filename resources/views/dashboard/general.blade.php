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
    </section>
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