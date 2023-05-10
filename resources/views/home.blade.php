@extends('app')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="">
            @if (session()->has('success_message'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>{{ session('success_message') }}</p>
            </div>
            @endif
            <!-- general form elements -->
            <div class="box" style="">
                <div class="box-header with-border"
                    style="background:white!important;color:black!important;border-radius:5px">
                    <h3 class="box-title" style="    display: inline-block;
				font-size: 19px;
				margin: 0;
				line-height: 1;
				font-weight: 500;
				font-family: 'Poppins';">Bienvenido, {{{ Auth::user()->first_name }}} {{{ Auth::user()->last_name }}}.</h3>
                    <!-- <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div> -->
                </div>

            </div>


            <div class="col-lg-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="row">
                            <div class="col-12">
                                <div class="quick_activity_wrap">
                                    <div class="single_quick_activity">
                                        <h4>Registros Consultas</h4>
                                        <h3><span class="counter">23</span> </h3>
                                        <p>{{ \Carbon\Carbon::now()->formatLocalized('%B') }}</p>
                                    </div>
                                    <div class="single_quick_activity">
                                        <h4>Registro Instalaciones</h4>
                                        <h3><span class="counter">{{ $total }}</span></h3>
                                        <p>{{ \Carbon\Carbon::now()->formatLocalized('%B') }}</p>
                                    </div>

                                    <div class="single_quick_activity">
                                        <h4>Registro Daños </h4>
                                        <h3><span class="counter">23</span> </h3>
                                        <p>{{ \Carbon\Carbon::now()->formatLocalized('%B') }}</p>
                                    </div>
                                    <div class="single_quick_activity">
                                        <h4>Registro Postventas </h4>
                                        <h3><span class="counter">23</span> </h3>
                                        <p>{{ \Carbon\Carbon::now()->formatLocalized('%B') }}</p>
                                    </div>

                                </div>

                            </div>
                            <div class="col-6" style="display:flex;justify-content:space-between">
                                <div class="chart-container" style="height: 650px;width: 900px;">
                                    <canvas id="myChart"></canvas>

                                </div>
                                <div class="chart-container" style="height: 400px;width: 400px;">
                                    <canvas id="pastel-chart" width="200" height="400"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Select2 -->




<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
            "Octubre", "Noviembre", "Diciembre"
        ],
        datasets: [{
            label: "Registros Totales Mensuales",
            data: [12, 19, 3, 5, 10, 20, 3, 10, 9, 14, 19, 45],
            backgroundColor: ['rgba(7, 18, 31, 0.2)', 'rgba(28, 137, 150, 0.2)',
                'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
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


<script>
var pastelCtx = document.getElementById('pastel-chart').getContext('2d');
var pastelChart = new Chart(pastelCtx, {
    type: 'pie',
    data: {
        labels: ['HFC', 'DTH', 'ADSL', 'GPON', 'COBRE'],
        datasets: [{
            backgroundColor: ['#F99B7D', '#E76161', '#8BACAA', '#7C96AB', '#CBB279'],
            data: [12, 19, 3, 5, 10]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
    }
});
</script>


<script src="{{asset('/js/dashboard/graficos.js')}}" type="text/javascript">
</script>
<script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript">
</script>
@endsection