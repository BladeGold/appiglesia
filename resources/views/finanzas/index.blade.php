@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">
        <div class="container-fluid">
            
            
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
            <hr>
           
            {{-- <div class="row justify-content-center">
                <div class="col-sm-3 col-4">
                    <!-- small box -->
                    <div class="small-box bg">
                        <div class="inner">
                            <p>Balances Totales</p>
                            <canvas id="balanceTotal" width="200" height="200"></canvas>
                        </div>  
                    </div>
                </div>
        
                <!-- ./col -->
                <div class="col-sm-3 col-4">
                    <!-- small box -->
                    <div class="small-box bg">
                        <div class="inner">
                            <p>Balances del Mes</p>
                            <canvas id="balanceMes" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-sm-3 col-4">
                    <!-- small box -->
                    <div class="small-box bg">
                        <div class="inner">
                            <p>Balances del Mes anterior</p>
                            <canvas id="balanceMesanterior" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>
            
            </div>
             </div>
            </div>
        </div> --}}

            
            <!-- /.row -->
            <!-- Main row -->
            
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
</div>


    
@endsection

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