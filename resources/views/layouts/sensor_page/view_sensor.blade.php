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
                            <span class="nav-text">Tab Soil Moisture</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" data-toggle="tab" href="#tabRainfall">
                            <span class="nav-text">Tab Rainfall Density</span>
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
                    <div class="tab-pane" id="tabRainfall" role="tabpanel">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <h5 class="card-title">Rainfall Density Summary</h5>
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a data-toggle="tab" href="#tab-rain-last-24h" class="active nav-link">Last 24 Hour</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-rain-last-7d" class="nav-link second-tab-toggle">Last 7 Days</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-rain-last-30d" class="nav-link second-tab-toggle">Last 30 Days</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-rain-last-24h">
                                    <div id="chartRainfall24h"></div>
                                </div>
                                <div class="tab-pane fade" id="tab-rain-last-7d">
                                    <div id="chartRainfall7d"></div>
                                </div>
                                <div class="tab-pane fade" id="tab-rain-last-30d">
                                    <div id="chartRainfall30d"></div>
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
    (function() {
        'use strict';
        // Tunggu SEMUA dependencies loaded
        function waitForDependencies(callback) {
            if (window.jQuery && window.ApexCharts && window.bootstrap) {
                callback();
            } else {
                setTimeout(() => waitForDependencies(callback), 100);
            }
        }
        waitForDependencies(function() {
            initializeDashboardCharts();
        });
        function initializeDashboardCharts() {
            const sensorApi = {
                day: "{{ url('/api/sensor/data/last/day') }}",
                week: "{{ url('/api/sensor/data/last/week') }}",
                month: "{{ url('/api/sensor/data/last/month') }}"
            };
            const chartCache = {};
            const chartsConfig = {
                // Temperature
                'chartTemperature24h': { api: 'day', field: 'avg_temp', title: 'Temperature', color: '#c12e2e' },
                'chartTemperature7d': { api: 'week', field: 'avg_temp', title: 'Temperature', color: '#c12e2e' },
                'chartTemperature30d': { api: 'month', field: 'avg_temp', title: 'Temperature', color: '#c12e2e' },
                // Humidity
                'chartHumidify24h': { api: 'day', field: 'avg_humi', title: 'Humidity', color: '#29bdd1' },
                'chartHumidify7d': { api: 'week', field: 'avg_humi', title: 'Humidity', color: '#29bdd1' },
                'chartHumidify30d': { api: 'month', field: 'avg_humi', title: 'Humidity', color: '#29bdd1' },
                // Luminescence
                'chartLuminescence24h': { api: 'day', field: 'avg_lumi', title: 'Luminescence', color: '#dfd32b' },
                'chartLuminescence7d': { api: 'week', field: 'avg_lumi', title: 'Luminescence', color: '#dfd32b' },
                'chartLuminescence30d': { api: 'month', field: 'avg_lumi', title: 'Luminescence', color: '#dfd32b' },
                // Soil Moisture
                'chartSoilMoisture24h': { api: 'day', field: 'avg_soil', title: 'Soil Moisture', color: '#22d348' },
                'chartSoilMoisture7d': { api: 'week', field: 'avg_soil', title: 'Soil Moisture', color: '#22d348' },
                'chartSoilMoisture30d': { api: 'month', field: 'avg_soil', title: 'Soil Moisture', color: '#22d348' },
                // Rainfall
                'chartRainfall24h': { api: 'day', field: 'avg_rain', title: 'Rainfall', color: '#8E24AA' },
                'chartRainfall7d': { api: 'week', field: 'avg_rain', title: 'Rainfall', color: '#8E24AA' },
                'chartRainfall30d': { api: 'month', field: 'avg_rain', title: 'Rainfall', color: '#8E24AA' }
            };
            function safeGetElement(id) {
                const element = document.getElementById(id);
                if (!element) {
                    console.warn(`Element #${id} not found in DOM`);
                }
                return element;
            }
            function createChart(containerId, config) {
                const element = safeGetElement(containerId);
                if (!element) return null;
                if (chartCache[containerId]) {
                    console.log(`Chart ${containerId} already exists`);
                    return chartCache[containerId];
                }
                const apiUrl = sensorApi[config.api];
                const options = {
                    chart: {
                        type: 'area',
                        height: 300,
                        toolbar: { show: false },
                        animations: { enabled: true, speed: 800 }
                    },
                    series: [{
                        name: config.title,
                        data: []
                    }],
                    xaxis: {
                        categories: [],
                        labels: { rotate: -45, style: { fontSize: '12px' } }
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        // labels: { formatter: v => `${v}%` }
                    },
                    colors: [config.color],
                    stroke: { width: 2, curve: 'smooth' },
                    fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.7, opacityTo: 0.3 } },
                    dataLabels: { enabled: false },
                    grid: { borderColor: '#f1f3f4' },
                    noData: {
                        text: 'Loading chart data...',
                        align: 'center',
                        verticalAlign: 'middle',
                        fontSize: '16px',
                        fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto'
                    }
                };
                try {
                    const chart = new ApexCharts(element, options);
                    chart.render();
                    chartCache[containerId] = chart;

                    // Load data setelah render
                    loadChartData(chart, apiUrl, config.field, config.title);

                    console.log(`✅ Chart created: ${containerId}`);
                    return chart;
                } catch (error) {
                    console.error(`❌ Chart creation failed for ${containerId}:`, error);
                    return null;
                }
            }
            function loadChartData(chart, apiUrl, field, title) {
                fetch(apiUrl)
                    .then(response => {
                        if (!response.ok) throw new Error(`HTTP ${response.status}`);
                        return response.json();
                    })
                    .then(data => {
                        if (!data?.data || !Array.isArray(data.data)) {
                            throw new Error('Invalid data format');
                        }
                        const labels = data.data.map(item => item.label || 'N/A');
                        const values = data.data.map(item => {
                            const value = item[field];
                            return typeof value === 'number' && !isNaN(value) ? value : 0;
                        });
                        chart.updateOptions({
                            series: [{ name: title, data: values }],
                            xaxis: { categories: labels }
                        });
                    })
                    .catch(error => {
                        console.error(`Data load failed for ${title}:`, error);
                        chart.updateOptions({
                            noData: {
                                text: 'Failed to load data\nPlease check connection',
                                fontSize: '14px'
                            }
                        });
                    });
            }
            // Render semua charts yang VISIBLE saat ini
            function renderVisibleCharts() {
                Object.keys(chartsConfig).forEach(containerId => {
                    const element = safeGetElement(containerId);
                    if (element && isElementVisible(element)) {
                        createChart(containerId, chartsConfig[containerId]);
                    }
                });
            }
            function isElementVisible(element) {
                return element.offsetParent !== null;
            }
            // Event handler untuk tab changes (SAFE)
            $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function(e) {
                const targetTabId = $(e.target).attr('href');
                if (!targetTabId) return;

                // Tunggu tab fully shown
                setTimeout(() => {
                    $(targetTabId).find('[id^="chart"]').each(function() {
                        const chartId = this.id;
                        if (chartsConfig[chartId] && !chartCache[chartId]) {
                            createChart(chartId, chartsConfig[chartId]);
                        }
                    });
                }, 150);
            });
            // Initial render setelah short delay
            setTimeout(renderVisibleCharts, 300);
            console.log('Dashboard charts initialized');
        }
    })();
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
                        ...(res.relay_2 || []).map(item => item.start),
                        ...(res.relay_3 || []).map(item => item.start),
                        ...(res.relay_4 || []).map(item => item.start),
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
                        { name: 'Relay 2', data: mapData(res.relay_2) },
                        { name: 'Relay 3', data: mapData(res.relay_3) },
                        { name: 'Relay 4', data: mapData(res.relay_4) }
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
                        // colors: colors || ['#c12e2e', '#2e7dc1', '#0277BD', '#F57C00'],
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
            colors: ['#c12e2e', '#2ecc71', '#0277BD', '#F57C00']
        });
        renderRelayChart({
            elementId: '#chartRelay7d',
            apiUrl: relayApi.week,
            title: 'Monitoring Durasi Relay',
            colors: ['#c12e2e', '#2ecc71', '#0277BD', '#F57C00']
        });
        renderRelayChart({
            elementId: '#chartRelay30d',
            apiUrl: relayApi.month,
            title: 'Monitoring Durasi Relay',
            colors: ['#c12e2e', '#2ecc71', '#0277BD', '#F57C00']
        });
    });
</script>
@endpush

@push('style')
<style>
    .chart-container {
        min-height: 300px;
        width: 100%;
        position: relative;
    }
</style>
@endpush
