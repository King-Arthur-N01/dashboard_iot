@extends('master')
@section('title', 'Sensor Data Report')

@section('content')
<div class="app-inner-layout">
    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Presentase Waktu Penyiraman</h5>
                    <div id="chart-apex-area"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Vertical Columns</h5>
                    <div id="chart-apex-column"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="card-title">ApexCharts Sparklines</div>
                    <table class="table table-bordered table-hover table-stripe">
                        <thead>
                        <th>Keterangan</th>
                        <th>Percentage of Portfolio</th>
                        <th>Last 30 days</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>$32,554</td>
                            <td>15%</td>
                            <td>
                                <div id="sparkline-chart1"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>$23,533</td>
                            <td>7%</td>
                            <td>
                                <div id="sparkline-chart2"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>$54,276</td>
                            <td>9%</td>
                            <td>
                                <div id="sparkline-chart3"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>$11,533</td>
                            <td>2%</td>
                            <td>
                                <div id="sparkline-chart4"></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<!--Apex Charts-->
<script src="{{asset('js/vendors/charts/apex-charts.js')}}"></script>
<script src="{{asset('js/scripts-init/charts/apex-charts.js')}}"></script>
<script src="{{asset('js/scripts-init/charts/apex-series.js')}}"></script>

<script>
    $(document).ready(function() {
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30,40,35,50,49,60,70,91,125]
            }],
            xaxis: {
                categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
            }
        }
        var chart = new ApexCharts(document.querySelector("#chart-apex-area"), options);

        chart.render();
    });
</script>
@endpush

@push('style')

@endpush
