@extends('master')
@section('title', 'Sensor Data Report')

@section('content')
<div class="app-inner-layout">
    <div class="tabs-animation">
        <div class="main-card mb-3 card">
            <div class="card-body">

            </div>
            <div class="card-body">
                <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                    <li class="nav-item">
                        <a role="tab" class="nav-link active" data-toggle="tab" href="#tabTemperature">
                            <span class="nav-text">Tab Temperature</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" data-toggle="tab" href="#tabHumidity">
                            <span class="nav-text">Tab Humidity</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" data-toggle="tab" href="#tabLuminescence">
                            <span class="nav-text">Tab Luminescence</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" data-toggle="tab" href="#tabSoilMoisture">
                            <span class="nav-text">Tab soilmoisture</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabTemperature" role="tabpanel">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <h5 class="card-title">Temperature Summary</h5>
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a data-toggle="tab" href="#tab-temp-last-24h" class="active nav-link">Last 24 Hour</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-temp-last-7d" class="nav-link second-tab-toggle">Last 7 Days</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-temp-last-30d" class="nav-link second-tab-toggle">Last 30 Days</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-temp-last-24h">
                                    <div id="chartTemperature24h"></div>
                                </div>
                                <div class="tab-pane fade" id="tab-temp-last-7d">
                                    <div id="chartTemperature7d"></div>
                                </div>
                                <div class="tab-pane fade" id="tab-temp-last-30d">
                                    <div id="chartTemperature30d"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabHumidity" role="tabpanel">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <h5 class="card-title">Humidity Summary</h5>
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a data-toggle="tab" href="#tab-humi-last-24h" class="active nav-link">Last 24 Hour</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-humi-last-7d" class="nav-link second-tab-toggle">Last 7 Days</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-humi-last-30d" class="nav-link second-tab-toggle">Last 30 Days</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-humi-last-24h">
                                    <div id="chartHumidify24h"></div>
                                </div>
                                <div class="tab-pane fade" id="tab-humi-last-7d">
                                    <div id="chartHumidify7d"></div>
                                </div>
                                <div class="tab-pane fade" id="tab-humi-last-30d">
                                    <div id="chartHumidify30d"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabLuminescence" role="tabpanel">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <h5 class="card-title">Luminescence Summary</h5>
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a data-toggle="tab" href="#tab-lumi-last-24h" class="active nav-link">Last 24 Hour</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-lumi-last-7d" class="nav-link second-tab-toggle">Last 7 Days</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-lumi-last-30d" class="nav-link second-tab-toggle">Last 30 Days</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-lumi-last-24h">
                                    <div id="chartLuminescence24h"></div>
                                </div>
                                <div class="tab-pane fade" id="tab-lumi-last-7d">
                                    <div id="chartLuminescence7d"></div>
                                </div>
                                <div class="tab-pane fade" id="tab-lumi-last-30d">
                                    <div id="chartLuminescence30d"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabSoilMoisture" role="tabpanel">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <h5 class="card-title">Soilmoisture Summary</h5>
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a data-toggle="tab" href="#tab-soil-last-24h" class="active nav-link">Last 24 Hour</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-soil-last-7d" class="nav-link second-tab-toggle">Last 7 Days</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-soil-last-30d" class="nav-link second-tab-toggle">Last 30 Days</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-soil-last-24h">
                                    <div id="chartSoilMoisture24h"></div>
                                </div>
                                <div class="tab-pane fade" id="tab-soil-last-7d">
                                    <div id="chartSoilMoisture7d"></div>
                                </div>
                                <div class="tab-pane fade" id="tab-soil-last-30d">
                                    <div id="chartSoilMoisture30d"></div>
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

@push('script')
<!--Apex Charts-->
<script src="{{asset('js/vendors/charts/apex-charts.js')}}"></script>
<script src="{{asset('js/scripts-init/charts/apex-charts.js')}}"></script>
<script src="{{asset('js/scripts-init/charts/apex-series.js')}}"></script>
<!--Moment js-->
<script src="{{asset('js/vendors/moment.js')}}"></script>

<script>
    const api = {
        day:   "{{ url('/api/sensor/data/last/day') }}",
        week:  "{{ url('/api/sensor/data/last/week') }}",
        month: "{{ url('/api/sensor/data/last/month') }}"
    };

    const chartCache = {}; // cache chart instance
    const dataCache  = {}; // cache API data
</script>

<script>
    function renderSensorChart({
        elementId,
        apiUrl,
        field,
        title,
        color
    }) {
        // jika chart sudah ada → skip
        if (chartCache[elementId]) return;

        fetch(apiUrl)
            .then(res => res.json())
            .then(res => {
                const labels = res.data.map(d => d.label);
                const values = res.data.map(d => d[field]);

                const options = {
                    chart: {
                        type: 'area',
                        height: 300,
                        toolbar: { show: false }
                    },
                    series: [{
                        name: title,
                        data: values
                    }],
                    xaxis: {
                        categories: labels,
                        labels: { rotate: -45 }
                    },
                    yaxis: {
                        min: 0,
                        max: 100
                    },
                    colors: [color],
                    stroke: {
                        curve: 'smooth',
                        width: 2
                    },
                    dataLabels: { enabled: false }
                };

                chartCache[elementId] = new ApexCharts(
                    document.querySelector(elementId),
                    options
                );

                chartCache[elementId].render();
            })
            .catch(err => console.error(err));
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Temperature default → 24h
        renderSensorChart({
            elementId: '#chartTemperature24h',
            apiUrl: api.day,
            field: 'avg_temp',
            title: 'Temperature',
            color: '#c12e2e'
        });
        // Temperature default → 7d
        renderSensorChart({
            elementId: '#chartTemperature7d',
            apiUrl: api.week,
            field: 'avg_temp',
            title: 'Temperature',
            color: '#c12e2e'
        });
        // Temperature default → 30d
        renderSensorChart({
            elementId: '#chartTemperature30d',
            apiUrl: api.month,
            field: 'avg_temp',
            title: 'Temperature',
            color: '#c12e2e'
        });

        // Humidity default → 24h
        renderSensorChart({
            elementId: '#chartHumidify24h',
            apiUrl: api.day,
            field: 'avg_humi',
            title: 'Humidity',
            color: '#29bdd1'
        });
        // Humidity default → 7d
        renderSensorChart({
            elementId: '#chartHumidify7d',
            apiUrl: api.week,
            field: 'avg_humi',
            title: 'Humidity',
            color: '#29bdd1'
        });
        // Humidity default → 30d
        renderSensorChart({
            elementId: '#chartHumidify30d',
            apiUrl: api.month,
            field: 'avg_humi',
            title: 'Humidity',
            color: '#29bdd1'
        });

        // Luminescence default → 24h
        renderSensorChart({
            elementId: '#chartLuminescence24h',
            apiUrl: api.day,
            field: 'avg_lumi',
            title: 'Luminescence',
            color: '#dfd32b'
        });
        // Luminescence default → 7d
        renderSensorChart({
            elementId: '#chartLuminescence7d',
            apiUrl: api.week,
            field: 'avg_lumi',
            title: 'Luminescence',
            color: '#dfd32b'
        });
        // Luminescence default → 30d
        renderSensorChart({
            elementId: '#chartLuminescence30d',
            apiUrl: api.month,
            field: 'avg_lumi',
            title: 'Luminescence',
            color: '#dfd32b'
        });

        // Soilmoisture default → 24h
        renderSensorChart({
            elementId: '#chartSoilMoisture24h',
            apiUrl: api.day,
            field: 'avg_soil',
            title: 'Soil Moisture',
            color: '#22d348'
        });
        // Soilmoisture default → 7d
        renderSensorChart({
            elementId: '#chartSoilMoisture7d',
            apiUrl: api.week,
            field: 'avg_soil',
            title: 'Soil Moisture',
            color: '#22d348'
        });
        // Soilmoisture default → 30d
        renderSensorChart({
            elementId: '#chartSoilMoisture30d',
            apiUrl: api.month,
            field: 'avg_soil',
            title: 'Soil Moisture',
            color: '#22d348'
        });
    });
</script>

@endpush

@push('style')

@endpush
