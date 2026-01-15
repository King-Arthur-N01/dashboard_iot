@extends('master')
@section('title', 'Sensor Data Report')

@section('content')
<div class="app-inner-layout">
    <div class="tabs-animation">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        <h5 class="card-title">Relay History</h5>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a data-toggle="tab" href="#tab-relay-last-24h" class="active nav-link">Last 24 Hour</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-relay-last-7d" class="nav-link second-tab-toggle">Last 7 Days</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-relay-last-30d" class="nav-link second-tab-toggle">Last 30 Days</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-relay-last-24h">
                            <div id="chartRelay24h"></div>
                        </div>
                        <div class="tab-pane fade" id="tab-relay-last-7d">
                            <div id="chartRelay7d"></div>
                        </div>
                        <div class="tab-pane fade" id="tab-relay-last-30d">
                            <div id="chartRelay30d"></div>
                        </div>
                    </div>
                </div>
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
    document.addEventListener("DOMContentLoaded", function () {
        const sensorApi = {
            day:   "{{ url('/api/sensor/data/last/day') }}",
            week:  "{{ url('/api/sensor/data/last/week') }}",
            month: "{{ url('/api/sensor/data/last/month') }}"
        };
        const chartCache = {}; // cache chart instance
        const dataCache  = {}; // cache API data

        function renderSensorChart({
            elementId,
            apiUrl,
            field,
            title,
            color
        }) {
            // Pengecekan elemen: Pastikan elemen ada di DOM
            const element = document.querySelector(elementId);
            if (!element) {
                console.error(`Element ${elementId} not found. Skipping render.`);
                return;  // Jangan lanjutkan jika elemen tidak ada
            }
            // Jika chart sudah ada di cache → skip
            if (chartCache[elementId]) {
                console.log(`Chart for ${elementId} already exists. Skipping render.`);
                return;
            }
            // Fetch data dari API
            fetch(apiUrl)
                .then(res => {
                    if (!res.ok) {
                        throw new Error(`HTTP error! Status: ${res.status}`);
                    }
                    return res.json();
                })
                .then(res => {
                    // Validasi data: Pastikan res.data ada dan array
                    if (!res || !res.data || !Array.isArray(res.data)) {
                        throw new Error(`Invalid data structure from API for ${elementId}`);
                    }
                    // Ekstrak labels dan values
                    const labels = res.data.map(d => d.label);
                    const values = res.data.map(d => {
                        const val = d[field];
                        // Pastikan value adalah number, jika tidak, set ke 0 atau null
                        return typeof val === 'number' ? val : 0;
                    });
                    // Opsi chart ApexCharts
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
                            width: 2
                        },
                        dataLabels: { enabled: false }
                    };
                    // Buat dan render chart
                    try {
                        chartCache[elementId] = new ApexCharts(element, options);
                        chartCache[elementId].render();
                        console.log(`Chart rendered for ${elementId}`);
                    } catch (chartError) {
                        console.error(`Error rendering chart for ${elementId}:`, chartError);
                    }
                })
                .catch(err => {
                    console.error(`Error fetching or processing data for ${elementId}:`, err);
                });
        }
        // Render chart untuk tab aktif default (Temperature)
        renderChartsForTab('#tabTemperature');

        // Fungsi helper untuk render chart berdasarkan tab
        function renderChartsForTab(tabId) {
            if (tabId === '#tabTemperature') {
                renderSensorChart({ elementId: '#chartTemperature24h', apiUrl: sensorApi.day, field: 'avg_temp', title: 'Temperature', color: '#c12e2e' });
                renderSensorChart({ elementId: '#chartTemperature7d', apiUrl: sensorApi.week, field: 'avg_temp', title: 'Temperature', color: '#c12e2e' });
                renderSensorChart({ elementId: '#chartTemperature30d', apiUrl: sensorApi.month, field: 'avg_temp', title: 'Temperature', color: '#c12e2e' });
            } else if (tabId === '#tabHumidity') {
                renderSensorChart({ elementId: '#chartHumidify24h', apiUrl: sensorApi.day, field: 'avg_humi', title: 'Humidity', color: '#29bdd1' });
                renderSensorChart({ elementId: '#chartHumidify7d', apiUrl: sensorApi.week, field: 'avg_humi', title: 'Humidity', color: '#29bdd1' });
                renderSensorChart({ elementId: '#chartHumidify30d', apiUrl: sensorApi.month, field: 'avg_humi', title: 'Humidity', color: '#29bdd1' });
            } else if (tabId === '#tabLuminescence') {
                renderSensorChart({ elementId: '#chartLuminescence24h', apiUrl: sensorApi.day, field: 'avg_lumi', title: 'Luminescence', color: '#dfd32b' });
                renderSensorChart({ elementId: '#chartLuminescence7d', apiUrl: sensorApi.week, field: 'avg_lumi', title: 'Luminescence', color: '#dfd32b' });
                renderSensorChart({ elementId: '#chartLuminescence30d', apiUrl: sensorApi.month, field: 'avg_lumi', title: 'Luminescence', color: '#dfd32b' });
            } else if (tabId === '#tabSoilMoisture') {
                renderSensorChart({ elementId: '#chartSoilMoisture24h', apiUrl: sensorApi.day, field: 'avg_soil', title: 'Soil Moisture', color: '#22d348' });
                renderSensorChart({ elementId: '#chartSoilMoisture7d', apiUrl: sensorApi.week, field: 'avg_soil', title: 'Soil Moisture', color: '#22d348' });
                renderSensorChart({ elementId: '#chartSoilMoisture30d', apiUrl: sensorApi.month, field: 'avg_soil', title: 'Soil Moisture', color: '#22d348' });
            }
        }

        // Event listener untuk switch tab (menggunakan Bootstrap)
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            const targetTab = $(e.target).attr('href');
            renderChartsForTab(targetTab);
        });

        // Temperature default → 24h
        renderSensorChart({
            elementId: '#chartTemperature24h',
            apiUrl: sensorApi.day,
            field: 'avg_temp',
            title: 'Temperature',
            color: '#c12e2e'
        });
        // Temperature default → 7d
        renderSensorChart({
            elementId: '#chartTemperature7d',
            apiUrl: sensorApi.week,
            field: 'avg_temp',
            title: 'Temperature',
            color: '#c12e2e'
        });
        // Temperature default → 30d
        renderSensorChart({
            elementId: '#chartTemperature30d',
            apiUrl: sensorApi.month,
            field: 'avg_temp',
            title: 'Temperature',
            color: '#c12e2e'
        });

        // Humidity default → 24h
        renderSensorChart({
            elementId: '#chartHumidify24h',
            apiUrl: sensorApi.day,
            field: 'avg_humi',
            title: 'Humidity',
            color: '#29bdd1'
        });
        // Humidity default → 7d
        renderSensorChart({
            elementId: '#chartHumidify7d',
            apiUrl: sensorApi.week,
            field: 'avg_humi',
            title: 'Humidity',
            color: '#29bdd1'
        });
        // Humidity default → 30d
        renderSensorChart({
            elementId: '#chartHumidify30d',
            apiUrl: sensorApi.month,
            field: 'avg_humi',
            title: 'Humidity',
            color: '#29bdd1'
        });

        // Luminescence default → 24h
        renderSensorChart({
            elementId: '#chartLuminescence24h',
            apiUrl: sensorApi.day,
            field: 'avg_lumi',
            title: 'Luminescence',
            color: '#dfd32b'
        });
        // Luminescence default → 7d
        renderSensorChart({
            elementId: '#chartLuminescence7d',
            apiUrl: sensorApi.week,
            field: 'avg_lumi',
            title: 'Luminescence',
            color: '#dfd32b'
        });
        // Luminescence default → 30d
        renderSensorChart({
            elementId: '#chartLuminescence30d',
            apiUrl: sensorApi.month,
            field: 'avg_lumi',
            title: 'Luminescence',
            color: '#dfd32b'
        });

        // Soilmoisture default → 24h
        renderSensorChart({
            elementId: '#chartSoilMoisture24h',
            apiUrl: sensorApi.day,
            field: 'avg_soil',
            title: 'Soil Moisture',
            color: '#22d348'
        });
        // Soilmoisture default → 7d
        renderSensorChart({
            elementId: '#chartSoilMoisture7d',
            apiUrl: sensorApi.week,
            field: 'avg_soil',
            title: 'Soil Moisture',
            color: '#22d348'
        });
        // Soilmoisture default → 30d
        renderSensorChart({
            elementId: '#chartSoilMoisture30d',
            apiUrl: sensorApi.month,
            field: 'avg_soil',
            title: 'Soil Moisture',
            color: '#22d348'
        });
    });
</script>
<script>
    // Relay History Chart
    document.addEventListener("DOMContentLoaded", function () {
        const chartCache = {}; // cache chart instance
        const relayApi = {
            day: "{{ url('/api/relay/data/last/day') }}",
            week: "{{ url('/api/relay/data/last/week') }}",
            month: "{{ url('/api/relay/data/last/month') }}"
        };

        function renderRelayChart({
            elementId,
            apiUrl,
            title,
            colors // Diubah menjadi plural karena ada 2 series
        }) {
            const element = document.querySelector(elementId);
            if (!element) return;
            if (chartCache[elementId]) return;

            fetch(apiUrl)
                .then(res => res.json())
                .then(res => {
                    // --- 1. PROSES DATA UNTUK SUMBU X (LABELS) ---
                    // Mengambil semua timestamp unik dari kedua relay dan mengurutkannya
                    const allLabels = [...new Set([
                        ...(res.relay_1 || []).map(item => item.start),
                        ...(res.relay_2 || []).map(item => item.start)
                    ])].sort();
                    // --- 2. PEMETAAN DATA KE SERIES ---
                    const mapData = (relayArray) => {
                        return allLabels.map(label => {
                            const found = (relayArray || []).find(item => item.start === label);
                            return found ? found.duration : 0;
                        });
                    };
                    const seriesData = [
                        { name: 'Relay 1', data: mapData(res.relay_1) },
                        { name: 'Relay 2', data: mapData(res.relay_2) }
                    ];
                    // --- 3. KONFIGURASI APEXCHARTS ---
                    const options = {
                        chart: {
                            type: 'bar',
                            height: 350,
                            toolbar: { show: true }
                        },
                        title: {
                            text: title,
                            align: 'left'
                        },
                        colors: colors || ['#c12e2e', '#2e7dc1'], // Default warna jika tidak diisi
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                            },
                        },
                        dataLabels: { enabled: false },
                        series: seriesData,
                        xaxis: {
                            categories: allLabels,
                            title: { text: 'Waktu Mulai' }
                        },
                        yaxis: {
                            title: { text: 'Durasi (Detik)' }
                        },
                        tooltip: {
                            y: {
                                formatter: (val) => val + " detik"
                            }
                        }
                    };
                    // Render Chart
                    chartCache[elementId] = new ApexCharts(element, options);
                    chartCache[elementId].render();
                })
                .catch(err => {
                    console.error(`Chart error (${elementId})`, err);
                });
        }

        // --- 4. PEMANGGILAN FUNGSI ---
        // Anda bisa mengirimkan array warna untuk masing-masing relay
        renderRelayChart({
            elementId: '#chartRelay24h',
            apiUrl: relayApi.day,
            title: 'Monitoring Durasi Relay',
            colors: ['#c12e2e', '#2ecc71'] // Merah untuk Relay 1, Hijau untuk Relay 2
        });
        // renderRelayChart({
        //     elementId: '#chartRelay7d',
        //     apiUrl: relayApi.week,
        //     title: 'Monitoring Durasi Relay',
        //     colors: ['#c12e2e', '#2ecc71']
        // });
        // renderRelayChart({
        //     elementId: '#chartRelay30d',
        //     apiUrl: relayApi.month,
        //     title: 'Monitoring Durasi Relay',
        //     colors: ['#c12e2e', '#2ecc71']
        // });
    });
</script>
@endpush

@push('style')

@endpush
