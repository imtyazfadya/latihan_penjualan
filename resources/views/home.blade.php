@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div id="container" style="width: 100%;">
                    <canvas id="canvas"></canvas>
                </div>    
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://www.chartjs.org/dist/2.7.2/Chart.bundle.js"></script>
<script type="text/javascript" src="http://www.chartjs.org/samples/latest/utils.js"></script>
<script type="text/javascript">
var color = Chart.helpers.color;
var barChartData = {
    labels: {!! $label !!},
    datasets: [{
        label: 'Produk Per Kategori',
        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: {!! $value !!},
        }],
    };

window.onload = function() {
    var ctx = document.getElementById('canvas').getContext('2d');
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Grafik Data Produk'
            }
        }
    });
};
</script>
@endsection
