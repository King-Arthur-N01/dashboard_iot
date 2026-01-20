@extends('master')
@section('title', 'Dashboard')

@section('content')
<div class="app-inner-layout">
    <div class="tabs-animation">
        <div class="mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="header-icon lnr lnr-leaf mr-3 text-muted opacity-6"></i> [Garden Name]
                </div>
                <div class="btn-actions-pane-right text-capitalize">
                    <button class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm" href="{{route('sanctum.csrf-cookie')}}"><i class="lnr-cog"></i></button>
                </div>
            </div>
            <div class="no-gutters row">
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-10 p-2 bg-danger">
                                <img class="rounded-circle" src="{{asset('/assets/images/icons/thermometer.png')}}" alt="">
                            </div>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Suhu Udara</div>
                            <div class="widget-numbers">
                                <span id="temp_value"></span>
                            </div>
                            <div id="wiget_temp">
                                {{-- Wiget deskripsi perubahan di sini --}}
                            </div>
                        </div>
                    </div>
                    <div class="divider m-0 d-md-none d-sm-block"></div>
                </div>
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-10 p-2 bg-info">
                                <img class="rounded-circle" src="{{asset('/assets/images/icons/humidity.png')}}" alt="">
                            </div>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Kelembapan Udara</div>
                            <div class="widget-numbers">
                                <span id="humi_value"></span>
                            </div>
                            <div id="wiget_humi">
                                {{-- Wiget deskripsi perubahan di sini --}}
                            </div>
                        </div>
                    </div>
                    <div class="divider m-0 d-md-none d-sm-block"></div>
                </div>
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-10 p-2 bg-warning">
                                <img class="rounded-circle" src="{{asset('/assets/images/icons/sun.png')}}" alt="">
                            </div>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Insensitas Cahaya</div>
                            <div class="widget-numbers">
                                <span id="lumi_value"></span>
                            </div>
                            <div id="wiget_lumi">
                                {{-- Wiget deskripsi perubahan di sini --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-10 p-2 bg-success">
                                <img class="rounded-circle" src="{{asset('/assets/images/icons/soil.png')}}" alt="">
                            </div>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Kelembapan Tanah</div>
                            <div class="widget-numbers">
                                <span id="soil_value"></span>
                            </div>
                            <div id="wiget_soil">
                                {{-- Wiget deskripsi perubahan di sini --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center d-block p-3 card-footer">
                <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg">
                    <span class="mr-2 opacity-7">
                        <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                    </span>
                    <span class="mr-1">View Complete Report</span>
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-c1-0" data-toggle="tab" href="#tab-animated1-0">
                                <span class="nav-text">Tab Temprature</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c1-1" data-toggle="tab" href="#tab-animated1-1">
                                <span class="nav-text">Tab Humidity</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c1-2" data-toggle="tab" href="#tab-animated1-2">
                                <span class="nav-text">Tab Luminescence</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c1-3" data-toggle="tab" href="#tab-animated1-3">
                                <span class="nav-text">Tab soilmoisture</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-animated1-0" role="tabpanel">
                            <h5 class="card-title">Diary Summary</h5>
                            <div id="chart_temprature"></div>
                        </div>
                        <div class="tab-pane" id="tab-animated1-1" role="tabpanel">
                            <h5 class="card-title">Diary Summary</h5>
                            <div id="chart_humidify"></div>
                        </div>
                        <div class="tab-pane" id="tab-animated1-2" role="tabpanel">
                            <h5 class="card-title">Diary Summary</h5>
                            <div id="chart_luminescence"></div>
                        </div>
                        <div class="tab-pane" id="tab-animated1-3" role="tabpanel">
                            <h5 class="card-title">Diary Summary</h5>
                            <div id="chart_soilmoisture"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="position-relative form-group select2">
        <label for="wateringHour" class="">Jam Siram</label>
        <input class="form-control" name="watering_hour" id="wateringHour" type="time" placeholder="12:00">
    </div>
</div>

<div class="form-row">
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="tempData" class="">Suhu</label>
            <input class="form-control" name="temp_data" id="tempData" type="text" placeholder="25°C">
        </div>
    </div>
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="humiData" class="">Kelembapan</label>
            <input class="form-control" name="humi_data" id="humiData" type="text" placeholder="60%(Rh)">
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="lumiData" class="">Cahaya</label>
            <input class="form-control" name="lumi_data" id="lumiData" type="text" placeholder="50%(Lx)">
        </div>
    </div>
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="soilData" class="">Kelembapan Tanah</label>
            <input class="form-control" name="soil_data" id="soilData" type="text" placeholder="40%(Moisture)">
        </div>
    </div>
</div>
@endsection

@push('script')

<!--Moment js-->
<script src="{{asset('js/vendors/moment.js')}}"></script>

<!--Apex Charts-->
<script src="{{asset('js/vendors/charts/apex-charts.js')}}"></script>
<script src="{{asset('js/scripts-init/charts/apex-charts.js')}}"></script>
<script src="{{asset('js/scripts-init/charts/apex-series.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let lastData = null;
        // Fungsi untuk menghitung dan menampilkan perubahan
        const updateChangeDisplay = (elementId, currentValue, previousValue, label) => {
            const element = document.getElementById(elementId);
            if (previousValue === null || previousValue === undefined) {
                element.innerHTML = '<div class="widget-description text-muted">No previous data</div>';
                return;
            }
            const change = ((currentValue - previousValue) / previousValue) * 100;
            const absChange = Math.abs(change).toFixed(2); // Format 2 desimal
            let changeText, iconClass, colorClass;

            if (change > 0) {
                changeText = `Increased by ${absChange}%`;
                iconClass = 'fa-angle-up';
                colorClass = 'text-success';
            } else if (change < 0) {
                changeText = `Decreased by ${absChange}%`;
                iconClass = 'fa-angle-down';
                colorClass = 'text-warning';
            } else {
                changeText = 'No change';
                iconClass = 'fa-minus';
                colorClass = 'text-muted';
            }

            element.innerHTML = `
                <div class="widget-description text-focus">
                    ${changeText}
                    <span class="${colorClass} pl-1">
                        <i class="fa ${iconClass}"></i>
                        <span class="pl-1">${absChange}%</span>
                    </span>
                </div>
            `;
        };

        const fetchLatestSensorData = () => {
            fetch("{{ url('/api/sensor/data/latest') }}")
                .then(response => response.json())
                .then(data => {
                    // Update nilai utama
                    document.getElementById('temp_value').textContent = data.temperature + "°C";
                    document.getElementById('humi_value').textContent = data.humidity + " (Rh)";
                    document.getElementById('lumi_value').textContent = data.light + " %";
                    document.getElementById('soil_value').textContent = data.soil + " %";
                    // Hitung dan tampilkan perubahan jika ada data sebelumnya
                    if (lastData) {
                        updateChangeDisplay('wiget_temp', parseFloat(data.temperature), parseFloat(lastData.temperature), 'Temperature');
                        updateChangeDisplay('wiget_humi', parseFloat(data.humidity), parseFloat(lastData.humidity), 'Humidity');
                        updateChangeDisplay('wiget_lumi', parseFloat(data.light), parseFloat(lastData.light), 'Light');
                        updateChangeDisplay('wiget_soil', parseFloat(data.soil), parseFloat(lastData.soil), 'Soil');
                    }
                    // Simpan data saat ini sebagai lastData untuk perbandingan selanjutnya
                    lastData = {
                        temperature: data.temperature,
                        humidity: data.humidity,
                        light: data.light,
                        soil: data.soil
                    };
                })
                .catch(err => console.error('Error fetching sensor data:', err));
        };

        // Jalankan pertama kali
        fetchLatestSensorData();
        // Jalankan ulang tiap 1 menit
        setInterval(fetchLatestSensorData, 60000);
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let chartTemp, chartHumi, chartLumi, chartSoil; // Instance terpisah per chart
        let cachedData = null; // Cache data untuk hindari fetch ulang

        // Fungsi untuk render/update chart berdasarkan data
        const renderChart = (chartInstance, elementId, seriesData, seriesName, color) => {
            if (!cachedData) return; // Jika data belum ada, skip

            const times = cachedData.times;
            const options = {
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: true
                    }
                },
                series: [{
                    name: seriesName,
                    data: seriesData,
                    color: color
                }],
                xaxis: {
                    categories: times,
                    title: { text: 'Time' }
                },
                yaxis: {
                    title: { text: 'Sensor Values' },
                    labels: { formatter: (y) => Number(y).toFixed(2) } // Format 2 desimal di chart
                }
            };

            if (!chartInstance) {
                chartInstance = new ApexCharts(document.querySelector(elementId), options);
                chartInstance.render();
            } else {
                chartInstance.updateOptions(options);
            }
            return chartInstance;
        };

        // Fungsi fetch data sekali
        const fetchSensorData = () => {
            fetch("{{ url('/api/sensor/data/last/day') }}")
                .then(response => response.json())
                .then(apiResponse => {
                    const records = apiResponse.data || [];
                    if (records.length === 0) {
                        console.warn("No data available.");
                        return;
                    }

                    cachedData = {
                        temperatures: records.map(r => parseFloat(r.avg_temp) || 0), // Gunakan avg_temp, convert ke float
                        humidities: records.map(r => parseFloat(r.avg_humi) || 0),
                        lights: records.map(r => parseFloat(r.avg_lumi) || 0),
                        soils: records.map(r => parseFloat(r.avg_soil) || 0),
                        times: records.map(r =>
                            moment(r.hour, 'YYYY-MM-DD H').format('HH:mm') // Parse hour (Y-m-d H) ke HH:mm
                        )
                    };

                    // Render semua chart jika data ready (atau hanya aktif)
                    chartTemp = renderChart(chartTemp, "#chart_temprature", cachedData.temperatures, 'Temperature', '#F14314');
                    chartHumi = renderChart(chartHumi, "#chart_humidify", cachedData.humidities, 'Humidity', '#F42523');
                    chartLumi = renderChart(chartLumi, "#chart_luminescence", cachedData.lights, 'Light', '#F67945');
                    chartSoil = renderChart(chartSoil, "#chart_soilmoisture", cachedData.soils, 'Soil', '#F15B46');
                })
                .catch(err => console.error("Error fetching data:", err));
        };

        // Event untuk tab: render chart saat tab aktif (lazy loading)
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            const targetTab = $(e.target).attr('href'); // e.g., #tab-animated1-0
            if (cachedData) {
                if (targetTab === '#tab-animated1-0' && !chartTemp) {
                    chartTemp = renderChart(chartTemp, "#chart_temprature", cachedData.temperatures, 'Temperature', '#F14314');
                } else if (targetTab === '#tab-animated1-1' && !chartHumi) {
                    chartHumi = renderChart(chartHumi, "#chart_humidify", cachedData.humidities, 'Humidity', '#F42523');
                } else if (targetTab === '#tab-animated1-2' && !chartLumi) {
                    chartLumi = renderChart(chartLumi, "#chart_luminescence", cachedData.lights, 'Light', '#F67945');
                } else if (targetTab === '#tab-animated1-3' && !chartSoil) {
                    chartSoil = renderChart(chartSoil, "#chart_soilmoisture", cachedData.soils, 'Soil', '#F15B46');
                }
            }
        });

        // Fetch pertama kali dan set interval untuk update
        fetchSensorData();
        setInterval(fetchSensorData, 60000); // Update semua chart tiap 1 menit
    });
</script>

@endpush

@push('style')

@endpush


















@extends('master')
@section('title', 'Sensor Data Report')

@section('content')
<div class="app-inner-layout">
    <div class="tabs-animation">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                    <li class="nav-item">
                        <a role="tab" class="nav-link active" id="tab-c1-0" data-toggle="tab" href="#tab-animated1-0">
                            <span class="nav-text">Tab Temprature</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c1-1" data-toggle="tab" href="#tab-animated1-1">
                            <span class="nav-text">Tab Humidity</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c1-2" data-toggle="tab" href="#tab-animated1-2">
                            <span class="nav-text">Tab Luminescence</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c1-3" data-toggle="tab" href="#tab-animated1-3">
                            <span class="nav-text">Tab soilmoisture</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-animated1-0" role="tabpanel">
                        <h5 class="card-title">Diary Summary</h5>
                        <div id="chart_temprature"></div>
                    </div>
                    <div class="tab-pane" id="tab-animated1-1" role="tabpanel">
                        <h5 class="card-title">Diary Summary</h5>
                        <div id="chart_humidify"></div>
                    </div>
                    <div class="tab-pane" id="tab-animated1-2" role="tabpanel">
                        <h5 class="card-title">Diary Summary</h5>
                        <div id="chart_luminescence"></div>
                    </div>
                    <div class="tab-pane" id="tab-animated1-3" role="tabpanel">
                        <h5 class="card-title">Diary Summary</h5>
                        <div id="chart_soilmoisture"></div>
                    </div>
                </div>
            </div>
        </div>



        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Sensor Report
                </div>
                <ul class="nav">
                    <li class="nav-item"><a data-toggle="tab" href="#tabs-temp" class="active nav-link">Temprature</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tabs-humi" class="nav-link second-tab-toggle">Humidity</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tabs-lumi" class="nav-link second-tab-toggle">Luminescence</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tabs-soil" class="nav-link second-tab-toggle">Soil Moisture</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-temp">
                        <div class="card-body">
                            <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                                <li class="nav-item">
                                    <a role="tab" class="nav-link active" id="tab-c1-0" data-toggle="tab" href="#tab-last-24h">
                                        <span class="nav-text">Last 24 Hour</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c1-1" data-toggle="tab" href="#tab-last-7d">
                                        <span class="nav-text">Last 7 Days</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c1-2" data-toggle="tab" href="#tab-last-30d">
                                        <span class="nav-text">Last 30 Days</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-last-24h" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_temp_24h"></div>
                                </div>
                                <div class="tab-pane" id="tab-last-7d" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_temp_7d"></div>
                                </div>
                                <div class="tab-pane" id="tab-last-30d" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_temp_30d"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-humi">
                        <div class="card-body">
                            <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                                <li class="nav-item">
                                    <a role="tab" class="nav-link active" id="tab-c1-0" data-toggle="tab" href="#tab-last-24h">
                                        <span class="nav-text">Last 24 Hour</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c1-1" data-toggle="tab" href="#tab-last-7d">
                                        <span class="nav-text">Last 7 Days</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c1-2" data-toggle="tab" href="#tab-last-30d">
                                        <span class="nav-text">Last 30 Days</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-last-24h" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_humi_24h"></div>
                                </div>
                                <div class="tab-pane" id="tab-last-7d" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_humi_7d"></div>
                                </div>
                                <div class="tab-pane" id="tab-last-30d" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_humi_30d"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-lumi">
                        <div class="card-body">
                            <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                                <li class="nav-item">
                                    <a role="tab" class="nav-link active" id="tab-c1-0" data-toggle="tab" href="#tab-last-24h">
                                        <span class="nav-text">Last 24 Hour</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c1-1" data-toggle="tab" href="#tab-last-7d">
                                        <span class="nav-text">Last 7 Days</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c1-2" data-toggle="tab" href="#tab-last-30d">
                                        <span class="nav-text">Last 30 Days</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-last-24h" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_lumi_24h"></div>
                                </div>
                                <div class="tab-pane" id="tab-last-7d" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_lumi_7d"></div>
                                </div>
                                <div class="tab-pane" id="tab-last-30d" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_lumi_30d"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-soil">
                        <div class="card-body">
                            <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                                <li class="nav-item">
                                    <a role="tab" class="nav-link active" id="tab-c1-0" data-toggle="tab" href="#tab-last-24h">
                                        <span class="nav-text">Last 24 Hour</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c1-1" data-toggle="tab" href="#tab-last-7d">
                                        <span class="nav-text">Last 7 Days</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c1-2" data-toggle="tab" href="#tab-last-30d">
                                        <span class="nav-text">Last 30 Days</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-last-24h" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_soil_24h"></div>
                                </div>
                                <div class="tab-pane" id="tab-last-7d" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_soil_7d"></div>
                                </div>
                                <div class="tab-pane" id="tab-last-30d" role="tabpanel">
                                    <h5 class="card-title">Sensor Summary</h5>
                                    <div id="chart_soil_30d"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="no-results">
    <div class="swal2-icon swal2-success swal2-animate-success-icon">
        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
        <span class="swal2-success-line-tip"></span>
        <span class="swal2-success-line-long"></span>
        <div class="swal2-success-ring"></div>
        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
    </div>
    <div class="results-subtitle mt-4">Finished!</div>
    <div class="results-title">You arrived at the last form wizard step!</div>
    <div class="mt-3 mb-3"></div>
    <div class="text-center">
        <button class="btn-shadow btn-wide btn btn-success btn-lg">Finish</button>
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
    document.addEventListener("DOMContentLoaded", function () {
        // const text_modal = `Jadwal ${formData.scheduleName} Berhasil Ditambahkan!`;
        let chartTemp, chartHumi, chartLumi, chartSoil; // Instance terpisah per chart
        let cachedData = null; // Cache data untuk hindari fetch ulang

        // Fungsi untuk render/update chart berdasarkan data
        const renderChart = (chartInstance, elementId, seriesData, seriesName, color) => {
            if (!cachedData) return; // Jika data belum ada, skip

            const times = cachedData.times;
            const options = {
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: true
                    }
                },
                series: [{
                    name: seriesName,
                    data: seriesData,
                    color: color
                }],
                xaxis: {
                    categories: times,
                    title: { text: 'Time' }
                },
                yaxis: {
                    title: { text: 'Sensor Values' },
                    labels: { formatter: (y) => Number(y).toFixed(2) } // Format 2 desimal di chart
                }
            };

            if (!chartInstance) {
                chartInstance = new ApexCharts(document.querySelector(elementId), options);
                chartInstance.render();
            } else {
                chartInstance.updateOptions(options);
            }
            return chartInstance;
        };

        // Fungsi fetch data sekali
        const fetchSensorData = () => {
            fetch("{{ url('/api/sensor/data/last/day') }}")
                .then(response => response.json())
                .then(apiResponse => {
                    const records = apiResponse.data || [];
                    if (records.length === 0) {
                        console.warn("No data available.");
                        return;
                    }

                    cachedData = {
                        temperatures: records.map(r => parseFloat(r.avg_temp) || 0), // Gunakan avg_temp, convert ke float
                        humidities: records.map(r => parseFloat(r.avg_humi) || 0),
                        lights: records.map(r => parseFloat(r.avg_lumi) || 0),
                        soils: records.map(r => parseFloat(r.avg_soil) || 0),
                        times: records.map(r =>
                            moment(r.hour, 'YYYY-MM-DD H').format('HH:mm') // Parse hour (Y-m-d H) ke HH:mm
                        )
                    };

                    // Render semua chart jika data ready (atau hanya aktif)
                    chartTemp = renderChart(chartTemp, "#chart_temprature", cachedData.temperatures, 'Temperature', '#F14314');
                    chartHumi = renderChart(chartHumi, "#chart_humidify", cachedData.humidities, 'Humidity', '#F42523');
                    chartLumi = renderChart(chartLumi, "#chart_luminescence", cachedData.lights, 'Light', '#F67945');
                    chartSoil = renderChart(chartSoil, "#chart_soilmoisture", cachedData.soils, 'Soil', '#F15B46');
                })
                .catch(err => console.error("Error fetching data:", err));
        };

        // Event untuk tab: render chart saat tab aktif (lazy loading)
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            const targetTab = $(e.target).attr('href'); // e.g., #tab-animated1-0
            if (cachedData) {
                if (targetTab === '#tab-animated1-0' && !chartTemp) {
                    chartTemp = renderChart(chartTemp, "#chart_temprature", cachedData.temperatures, 'Temperature', '#F14314');
                } else if (targetTab === '#tab-animated1-1' && !chartHumi) {
                    chartHumi = renderChart(chartHumi, "#chart_humidify", cachedData.humidities, 'Humidity', '#F42523');
                } else if (targetTab === '#tab-animated1-2' && !chartLumi) {
                    chartLumi = renderChart(chartLumi, "#chart_luminescence", cachedData.lights, 'Light', '#F67945');
                } else if (targetTab === '#tab-animated1-3' && !chartSoil) {
                    chartSoil = renderChart(chartSoil, "#chart_soilmoisture", cachedData.soils, 'Soil', '#F15B46');
                }
            }
        });

        // Fetch pertama kali dan set interval untuk update
        fetchSensorData();
        setInterval(fetchSensorData, 60000); // Update semua chart tiap 1 menit
    });
</script>

<!--Apex Charts-->
<script src="{{asset('js/vendors/charts/apex-charts.js')}}"></script>
<script src="{{asset('js/scripts-init/charts/apex-charts.js')}}"></script>
<script src="{{asset('js/scripts-init/charts/apex-series.js')}}"></script>

<!--Sparklines-->
<script src="{{asset('js/vendors/charts/charts-sparklines.js')}}"></script>
<script src="{{asset('js/scripts-init/charts/charts-sparklines.js')}}"></script>

<!--Chart.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="{{asset('js/scripts-init/charts/chartsjs-utils.js')}}"></script>
<script src="{{asset('js/scripts-init/charts/chartjs.js')}}"></script>

<!--Circle Progress -->
<script src="{{asset('js/vendors/circle-progress.js')}}"></script>
<script src="{{asset('js/scripts-init/circle-progress.js')}}"></script>

<script>
    function generateEditTimeInputs(count, existingTimes = []) {
        $('#editDynamicInput').empty();

        for (let i = 0; i < count; i++) {
            const value = existingTimes[i] ?? '';
            $('#editDynamicInput').append(`
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Jam Siram ${i + 1}</label>
                        <input type="time"
                            class="form-control"
                            name="edit_schedule_time[]"
                            value="${value}">
                    </div>
                </div>
            `);
        }
    }
    $('#editSelectDynamicInput').on('change', function () {
        const count = parseInt($(this).val());
        if (!isNaN(count)) {
            generateEditTimeInputs(count);
        }
    });
    let currentScheduleId = null;
    $('#scheduleTable').on('click', '.btn-edit', function () {
        currentScheduleId = $(this).data('id');
        $('#modalEdit').modal('show');
        fetch(`{{ url('/api/read/schedule/data') }}/${currentScheduleId}`, {
            method: 'GET',
            headers: { 'Accept': 'application/json' }
        })
        .then(res => res.json())
        .then(res => {
            const data = res.data; // ambil objek di dalam "data"
            $('#editScheduleName').val(data.schedule_name);
            $('#editRelayId').val(data.relay_id);
            const cycle = parseInt(data.schedule_cycle);
            const times = data.schedule_time.replace(/"/g, '').split(',');

            $('#editSelectDynamicInput').val(cycle);
            generateEditTimeInputs(cycle, times);

            const dates = data.schedule_date.replace(/"/g, '').split(',');
            $('#editScheduleDate').val(dates).trigger('change');
        })

        .catch(err => {
            console.error(err);
            alert('Gagal memuat data');
        });
    });

    $('#modalEdit').on('hidden.bs.modal', function () {
        currentScheduleId = null;
        $('#editScheduleName').val('');
        $('#editRelayId').val('');
        $('#editScheduleDate').val(null).trigger('change');
        $('#editSelectDynamicInput').val('1');
        $('#editDynamicInput').empty();
    });


    $('#editSchedule').on('click', function () {
        if (!currentScheduleId) {
            alert('ID jadwal tidak ditemukan');
            return;
        }
        let editScheduleTime = [];
        $('input[name="edit_schedule_time[]"]').each(function() {
            const value = $(this).val();
            if (value) {
                editScheduleTime.push(value);
            }
        });

        const editSelectedFrequency = parseInt($('#editSelectDynamicInput').val());
        if (editScheduleTime.length !== editSelectedFrequency) {
            alert('Jumlah jam penyiraman tidak sesuai dengan frekuensi penyiraman yang dipilih!');
            return;
        }
        if (confirm("Apakah anda yakin semua data sudah terisi dengan benar?")) {
            const editData = {
                schedule_name: $('#editScheduleName').val(),
                relay_id: $('#editRelayId').val(),
                schedule_date: $('#editScheduleDate').val(),
                schedule_time: editScheduleTime,
                schedule_cycle: $('#editSelectDynamicInput').val()
            };
            fetch(`{{ url('/api/update/schedule/data') }}/${currentScheduleId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(editData)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                    $('#modalHeader').text('Error');
                    $('#modalText').text(`Network response was not ok.`);
                    $('#modalAlert').modal('show');
                }
                return response.json();
            })
            .then(editData => {
                // Success handling
                if (editData.success) {
                    const successMessage = editData.success;
                    const text_modal = `<div class="modal-text"><h5>${successMessage}</h5> <img class="rounded-circle icon-image" src="{{asset('/assets/images/icons/success.png')}}" alt=""></div>`;
                    $('#modalHeader').text('Success');
                    $('#modalText').html(text_modal);
                    $('#modalAlert').modal('show');
                    setTimeout(function() {
                        $('#modalAlert').modal('hide');
                        // Reset form setelah sukses
                        $('#scheduleName').val('');
                        $('#relayId').val('');
                        $('#scheduleDate').val(null).trigger('change');
                        $('#combinedScheduleDate').val('');
                        $('#selectDynamicInput').val('1').trigger('change');
                        $('#dynamicInput').empty();
                    }, 2000);
                }
            })
            .catch(error => {
                // Error handling
                console.error('Error:', error);
                if (editData.error && error.response.editData) {
                    const warningMessage = editData.error;
                    const text_modal = `<div class="modal-text">><h5>${warningMessage}></h5> <img class="rounded-circle icon-image" src="{{asset('/assets/images/icons/warning.png')}}" alt=""></div>`;
                    $('#modalHeader').text('Failed');
                    $('#modalText').html(text_modal);
                    $('#modalAlert').modal('show');
                    setTimeout(function() {
                        $('#modalAlert').modal('hide');
                    }, 2000);
                } else {
                    $('#modalHeader').text('Error');
                    $('#modalText').text('Terjadi kesalahan saat mengirim data.');
                    $('#modalAlert').modal('show');
                    setTimeout(function() {
                        $('#modalAlert').modal('hide');
                    }, 2000);
                }
            });
        } else {
            // User cancelled, do nothing
        }
    });
</script>
@endpush

@push('style')

@endpush
