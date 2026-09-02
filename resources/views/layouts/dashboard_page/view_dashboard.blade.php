@extends('master')
@section('title', 'Dashboard')

@section('content')
    <div class="app-inner-layout">
        <div class="tabs-animation">
            <div class="mb-3 card iot-main-card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg font-weight-bold">
                        <i class="header-icon lnr lnr-leaf mr-2" style="color: var(--accent-green);"></i>
                        <span class="iot-page-title">Meja Mini Garden</span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Garden Banner -->
                    <div class="garden-banner mb-3 animate__animated animate__fadeIn">
                        <div class="garden-banner__bg" style="background-image: url('{{asset('/assets/images/dashboard_image.jpg')}}');"></div>
                        <div class="garden-banner__overlay">
                             <h4 class="garden-banner__title">Area Pantau Aktif</h4>
                             <span class="garden-banner__badge">STATUS: ONLINE</span>
                        </div>
                    </div>

                    <!-- Realtime Monitoring Section -->
                    <div class="sensor-section mb-3">
                        <div class="mb-2">
                            <h6 class="iot-section-title">Realtime Monitoring</h6>
                        </div>
                        <div class="sensor-grid" id="realtimeData">
                            <div class="sensor-card animate__animated animate__fadeInUp">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="sensor-icon temp"><i class="bi bi-thermometer"></i></div>
                                    <div>
                                        <div class="sensor-label">Temperature</div>
                                        <div class="sensor-value" id="tempValue"></div>
                                        <div id="wigetTemp"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="sensor-card animate__animated animate__fadeInUp" style="animation-delay: 0.05s;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="sensor-icon humi"><i class="bi bi-moisture"></i></div>
                                    <div>
                                        <div class="sensor-label">Humidity</div>
                                        <div class="sensor-value" id="humiValue"></div>
                                        <div id="wigetHumi"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="sensor-card animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="sensor-icon light"><i class="bi bi-sun-fill"></i></div>
                                    <div>
                                        <div class="sensor-label">Light</div>
                                        <div class="sensor-value" id="lumiValue"></div>
                                        <div id="wigetLumi"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="sensor-card animate__animated animate__fadeInUp" style="animation-delay: 0.15s;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="sensor-icon soil"><i class="bi bi-water"></i></div>
                                    <div>
                                        <div class="sensor-label">Soil Moisture</div>
                                        <div class="sensor-value" id="soilValue"></div>
                                        <div id="wigetSoil"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="sensor-card animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="sensor-icon rain"><i class="bi bi-droplet-fill"></i></div>
                                    <div>
                                        <div class="sensor-label">Rainfall</div>
                                        <div class="sensor-value" id="rainfallValue"></div>
                                        <div id="wigetRainfall"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Schedule + Pump Control -->
                    <div class="row mb-2 g-3">
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <div class="iot-inner-card p-2">
                                <div class="card-header">Watering Schedule</div>
                                <div class="mt-2" style="overflow-x: hidden; flex: 1;">
                                    <table id="scheduleTable" class="table table-sm align-middle w-100" style="font-size: 0.9rem;">
                                        <thead class="text-center">
                                            <tr>
                                                <th class="text-center" style="width: 50px;">No</th>
                                                <th class="text-center">Waktu Siram</th>
                                                <th class="text-center">Cycle Time</th>
                                                <th class="text-center">Jam Siram</th>
                                                <th class="text-center">No. Relay</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="text-center mt-auto pt-3 pb-2">
                                    <a class="btn-gradient-report" href="{{ route('page.sensor.report') }}">
                                        <i class="icon ion-ios-analytics-outline"></i>
                                        View Complete Report
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <div class="iot-inner-card">
                                <div class="card-header">Water Pump Control Manual</div>
                                <ul class="todo-list-wrapper list-group list-group-flush" style="font-size: 0.85rem;">
                                    <li class="list-group-item">
                                        <div class="pump-row">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="pump-label">Water Pump 1 :</span>
                                                <span id="pumpStatus1" class="ml-2 badge badge-secondary" style="text-transform: uppercase; font-size: 0.7rem;">....</span>
                                            </div>
                                            <div>
                                                <input class="water-pump-toggle" id="waterPump1" data-relay-id="1" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="sm">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pump-row">
                                            <span class="pump-label" style="color: var(--text-muted);">Water Pump 2 :</span>
                                            <span class="pump-badge-soon">Coming Soon</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pump-row">
                                            <span class="pump-label" style="color: var(--text-muted);">Water Pump 3 :</span>
                                            <span class="pump-badge-soon">Coming Soon</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pump-row">
                                            <span class="pump-label" style="color: var(--text-muted);">Water Pump 4 :</span>
                                            <span class="pump-badge-soon">Coming Soon</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<!--Moment js-->
<script src="{{asset('js/vendors/moment.js')}}"></script>
<!--Toggle Switch -->
<script src="{{asset('js/vendors/form-components/toggle-switch.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let overlay = $('.loading-overlay');
        overlay.appendTo('body');
        // Set automatic soft refresh table
        setInterval(function() {
            overlay.addClass('is-active');
            table.ajax.reload(null, false);
            table.on('draw.dt', function() {
                overlay.removeClass('is-active');
            });
        }, 60000);
        // kode javascript untuk menginisiasi datatable dan berfungsi sebagai dynamic table
        const table = $('#scheduleTable').DataTable({
            "searching": false,
            "paging":   false,
            "ordering": false,
            "info":     false,
            "dom": "t",
            processing: true,
            serverSide: false,
            ajax: {
                url: "{{ url('/api/read/schedule/data') }}",
                type: "GET",
                dataType: "json",
                dataSrc: "data"  // Default: response langsung sebagai array
            },
            columns: [
                { data: 'number', className: 'text-center align-middle', render: function(data, type, row, meta) { return meta.row + 1; } },
                {
                    data: 'schedule_date',
                    className: 'text-center align-middle',
                    render: function(data) {
                        const dates = JSON.parse(data);
                        if (!Array.isArray(dates)) return data;
                        if (dates.length === 7) return '<span class="badge badge-info text-white">Setiap Hari</span>';
                        const shortDays = dates.map(d => d.substring(0, 3).charAt(0).toUpperCase() + d.substring(1, 3).toLowerCase());
                        return shortDays.join(', ');
                    }
                },
                {
                    data: 'schedule_cycle',
                    className: 'text-center align-middle',
                    render: function(data) {
                        return '<span class="text-muted">' + data + 'x/hr</span>';
                    }
                },
                {
                    data: 'schedule_time',
                    className: 'text-center align-middle',
                    render: function(data) {
                        const times = JSON.parse(data);
                        if (!Array.isArray(times)) return data;
                        return times.map(t => `<span class="badge badge-light border mr-1 mb-1">${t}</span>`).join('');
                    }
                },
                {
                    data: 'relay_id',
                    className: 'text-center align-middle',
                    render: function(data) {
                        return '<span class="font-weight-bold text-success">R' + data + '</span>';
                    }
                }
            ]
        });

        let lastData = null;
        let lastRelayStatus = null;

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
                changeText = `Increased by`;
                iconClass = 'fa-angle-up';
                colorClass = 'text-success';
            } else if (change < 0) {
                changeText = `Decreased by`;
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
            </div>`;
        };

        const fetchLatestSensorData = () => {
            fetch("{{ url('/api/sensor/data/latest') }}")
                .then(response => response.json())
                .then(data => {
                    // Update nilai utama
                    document.getElementById('tempValue').textContent = data.temperature + "°C";
                    document.getElementById('humiValue').textContent = data.humidity + " (Rh)";
                    document.getElementById('lumiValue').textContent = data.light + " %";
                    document.getElementById('soilValue').textContent = data.soil + " %";
                    document.getElementById('rainfallValue').textContent = data.rain + " mm";
                    // Hitung dan tampilkan perubahan jika ada data sebelumnya
                    if (lastData) {
                        updateChangeDisplay('wigetTemp', parseDecimal(data.temperature), parseDecimal(lastData.temperature), 'Temperature');
                        updateChangeDisplay('wigetHumi', parseDecimal(data.humidity), parseDecimal(lastData.humidity), 'Humidity');
                        updateChangeDisplay('wigetLumi', parseDecimal(data.light), parseDecimal(lastData.light), 'Light');
                        updateChangeDisplay('wigetSoil', parseDecimal(data.soil), parseDecimal(lastData.soil), 'Soil');
                        updateChangeDisplay('wigetRainfall', parseDecimal(data.rain), parseDecimal(lastData.rain), 'Rainfall');
                    }
                    // Simpan data saat ini sebagai lastData untuk perbandingan selanjutnya
                    lastData = {
                        temperature: data.temperature,
                        humidity: data.humidity,
                        light: data.light,
                        soil: data.soil,
                        rainfall: data.rain
                    };
                })
                .catch(err => console.error('Error fetching sensor data:', err));
        };
        // Jalankan pertama kali
        fetchLatestSensorData();
        // Jalankan ulang tiap 1 menit
        setInterval(fetchLatestSensorData, 60000);
        const fetchGardenData = () => {
            fetch("{{ url('/api/read/garden/data') }}")
                .then(response => response.json())
                .then(data => {
                    if (data.data.length === 0) {
                        // document.getElementById('gardenName').textContent = "Belum buat Kebun";
                    } else {
                        // Jika ada data, ambil elemen pertama
                        let gardenData = data.data[0];
                        // document.getElementById('gardenName').textContent = gardenData.garden_name;
                    }
                })
                .catch(err => console.error('Error fetching sensor data:', err));
        };

        const fetchScheduleData = () => {
            fetch("{{ url('/api/read/schedule/data') }}")
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(err => console.error('Error fetching sensor data:', err));
        };
        fetchGardenData();
        fetchScheduleData();
    });
</script>
<script>
    $(document).ready(function () {
        function sendManualToggle(relayId, isOn) {
            fetch("{{ url('/api/relay/data/manual') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    relay: isOn ? 'on' : 'off',
                    relay_id: relayId
                })
            })
            .then(res => res.json())
            .then(res => console.log(res))
            .catch(err => console.error(err));
        }

        // Bind toggle handler
        $('.water-pump-toggle').on('change', function () {
            if ($(this).data('syncing')) return; // abaikan jika sedang sinkronisasi
            const relayId = $(this).data('relay-id');
            const isOn = $(this).prop('checked');
            sendManualToggle(relayId, isOn);
        });

        function updatePumpStatus() {
            fetch("{{ url('/api/relay/data/status') }}")
                .then(res => res.json())
                .then(data => {
                    const pump1 = $('#pumpStatus1');
                    const pump2 = $('#pumpStatus2');
                    const pump3 = $('#pumpStatus3');
                    const pump4 = $('#pumpStatus4');
                    const toggle1 = $('#waterPump1');
                    const toggle2 = $('#waterPump2');
                    const toggle3 = $('#waterPump3');
                    const toggle4 = $('#waterPump4');
                    // Pump 1
                    const isPump1On = data.relay1_status == 1;
                    pump1.text(isPump1On ? 'on' : 'off')
                        .removeClass('badge-success badge-danger')
                        .addClass(isPump1On ? 'badge-success' : 'badge-danger');
                    toggle1.data('syncing', true)
                        .prop('checked', isPump1On)
                        .bootstrapToggle(isPump1On ? 'on' : 'off');
                    toggle1.data('syncing', false);
                    // Pump 2
                    // const isPump2On = data.relay2_status == 1;
                    // pump2.text(isPump2On ? 'on' : 'off')
                    //     .removeClass('badge-success badge-danger')
                    //     .addClass(isPump2On ? 'badge-success' : 'badge-danger');
                    // toggle2.data('syncing', true)
                    //     .prop('checked', isPump2On)
                    //     .bootstrapToggle(isPump2On ? 'on' : 'off');
                    // toggle2.data('syncing', false);
                    // Pump 3
                    // const isPump3On = data.relay3_status == 1;
                    // pump3.text(isPump3On ? 'on' : 'off')
                    //     .removeClass('badge-success badge-danger')
                    //     .addClass(isPump3On ? 'badge-success' : 'badge-danger');
                    // toggle3.data('syncing', true)
                    //     .prop('checked', isPump3On)
                    //     .bootstrapToggle(isPump3On ? 'on' : 'off');
                    // toggle3.data('syncing', false);
                    // Pump 4
                    // const isPump4On = data.relay4_status == 1;
                    // pump4.text(isPump4On ? 'on' : 'off')
                    //     .removeClass('badge-success badge-danger')
                    //     .addClass(isPump4On ? 'badge-success' : 'badge-danger');
                    // toggle4.data('syncing', true)
                    //     .prop('checked', isPump4On)
                    //     .bootstrapToggle(isPump4On ? 'on' : 'off');
                    // toggle4.data('syncing', false);


                })
                .catch(err => console.error(err));
        }
        updatePumpStatus();
        setInterval(updatePumpStatus, 5000);
    });
</script>
<!--DataTables-->
<script src="{{asset('js/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/vendors/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!--Bootstrap Tables-->
<script src="{{asset('js/vendors/tables.js')}}"></script>
<!--Tables Init-->
<script src="{{asset('js/scripts-init/tables.js')}}"></script>
<!--Circle Progress -->
<script src="{{asset('js/vendors/circle-progress.js')}}"></script>
<script src="{{asset('js/scripts-init/circle-progress.js')}}"></script>
<!--BlockUI -->
<script src="{{asset ('js/vendors/blockui.js')}}"></script>
<script src="{{asset ('js/scripts-init/blockui.js')}}"></script>
@endpush

@push('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<style>
    :root {
        --bg-page: #f0f4f8;
        --bg-card: #ffffff;
        --bg-card-alt: #f8fafc;
        --accent-green: #10B981;
        --accent-teal: #06b6d4;
        --accent-amber: #f59e0b;
        --accent-emerald: #059669;
        --accent-blue: #3b82f6;
        --accent-red: #ef4444;
        --text-primary: #1e293b;
        --text-muted: #64748b;
        --border-soft: rgba(0,0,0,0.06);
    }

    /* === GLOBAL === */
    .app-container, .app-main, .app-main__outer {
        background: var(--bg-page) !important;
    }
    .app-main__inner { font-family: 'Inter', sans-serif !important; }

    /* === STRIP HOVER/TRANSITION === */
    *, *::before, *::after { transition: none !important; }
    .toggle-group, .toggle-handle, .toggle.btn, .toggle-on, .toggle-off { transition: all 0.25s ease !important; }
    .btn-hover-shine::before, .btn-hover-shine::after { display: none !important; }

    /* === MAIN CARD === */
    .iot-main-card {
        background: var(--bg-card) !important;
        border: 1px solid var(--border-soft);
        border-radius: 16px !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        color: var(--text-primary);
    }
    .iot-main-card .card-header-tab.card-header,
    .iot-main-card .card-header {
        background: transparent !important;
        border-bottom: 1px solid var(--border-soft) !important;
    }

    /* === PAGE TITLE === */
    .iot-page-title {
        font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 1.3rem;
        background: linear-gradient(135deg, var(--accent-green), var(--accent-teal));
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .iot-section-title {
        font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 0.8rem;
        color: var(--text-muted); text-transform: uppercase; letter-spacing: 1.5px;
    }

    /* === GARDEN BANNER === */
    .garden-banner {
        position: relative; width: 100%; height: 140px;
        border-radius: 14px; overflow: hidden;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }
    .garden-banner__bg {
        position: absolute; inset: 0;
        background-size: cover; background-position: center;
        filter: blur(3px) brightness(0.5); transform: scale(1.08); z-index: 1;
    }
    .garden-banner__overlay {
        position: absolute; inset: 0; z-index: 2;
        background: linear-gradient(135deg, rgba(16,185,129,0.2) 0%, rgba(0,0,0,0.4) 100%);
        display: flex; align-items: center; justify-content: center; flex-direction: column;
    }
    .garden-banner__title {
        font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 1.6rem;
        color: #fff; text-shadow: 0 2px 12px rgba(0,0,0,0.5); letter-spacing: 1.5px; margin-bottom: 6px;
    }
    .garden-banner__badge {
        font-size: 0.75rem; font-weight: 600; padding: 4px 16px;
        background: linear-gradient(135deg, var(--accent-green), var(--accent-emerald));
        color: #fff; border-radius: 20px; letter-spacing: 0.5px;
        box-shadow: 0 0 12px rgba(16,185,129,0.3);
        animation: pulse-glow 2.5s ease-in-out infinite;
    }
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 8px rgba(16,185,129,0.2); }
        50% { box-shadow: 0 0 20px rgba(16,185,129,0.5); }
    }

    /* === SENSOR SECTION (separated box) === */
    .sensor-section {
        background: var(--bg-card-alt);
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        padding: 16px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    }

    /* === SENSOR GRID (full width, equal) === */
    .sensor-grid {
        display: flex;
        gap: 12px;
        width: 100%;
    }
    .sensor-grid > .sensor-card {
        flex: 1;
        min-width: 0;
    }

    /* === SENSOR CARDS === */
    .sensor-card {
        background: var(--bg-card);
        border: 1px solid var(--border-soft);
        border-radius: 12px;
        padding: 14px;
        color: var(--text-primary);
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    .sensor-icon {
        width: 42px; height: 42px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.15rem; color: #fff; flex-shrink: 0;
    }
    .sensor-icon.temp { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .sensor-icon.humi { background: linear-gradient(135deg, #06b6d4, #0891b2); }
    .sensor-icon.light { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .sensor-icon.soil { background: linear-gradient(135deg, #10b981, #059669); }
    .sensor-icon.rain { background: linear-gradient(135deg, #3b82f6, #2563eb); }
    .sensor-label { font-size: 0.7rem; color: var(--text-muted); font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; }
    .sensor-value { font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 1rem; color: var(--text-primary); }

    /* === INNER CARDS (schedule, pump) === */
    .iot-inner-card {
        background: var(--bg-card);
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        color: var(--text-primary);
        height: 100%;
        display: flex; flex-direction: column;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    }
    .iot-inner-card .card-header {
        background: transparent !important;
        border-bottom: 1px solid var(--border-soft) !important;
        color: var(--text-primary) !important;
        font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 0.85rem;
        text-transform: uppercase; letter-spacing: 1px;
        padding: 12px 16px !important; min-height: auto !important;
    }

    /* === PUMP === */
    .pump-row {
        padding: 12px 16px;
        border-bottom: 1px solid var(--border-soft);
        display: flex; align-items: center; justify-content: space-between;
    }
    .pump-row:last-child { border-bottom: none; }
    .pump-label { font-weight: 600; font-size: 0.85rem; color: var(--text-primary); }
    .pump-badge-soon { background: #f1f5f9; color: var(--text-muted); font-size: 0.65rem; padding: 3px 10px; border-radius: 12px; font-weight: 600; border: 1px solid var(--border-soft); }

    /* === BUTTON === */
    .btn-gradient-report {
        display: inline-flex; align-items: center; gap: 6px;
        background: linear-gradient(135deg, var(--accent-green), var(--accent-teal));
        color: #fff; font-weight: 600; font-size: 0.8rem;
        padding: 8px 24px; border-radius: 24px; border: none;
        box-shadow: 0 4px 12px rgba(16,185,129,0.25);
        text-decoration: none;
    }

    /* === WIDGET (JS-generated) === */
    .widget-description { font-size: 0.7rem; }
    .widget-description .text-focus { color: var(--text-muted) !important; }

    /* === LIST GROUP (pump) === */
    .list-group-item { background: transparent !important; border: none !important; padding: 0 !important; }
    .widget-heading { color: var(--text-primary) !important; }
    .widget-heading .badge-secondary { background: var(--accent-red) !important; color: #fff !important; font-size: 0.65rem; border-radius: 10px; padding: 2px 10px; }
    .badge-warning { background: #f1f5f9 !important; color: var(--text-muted) !important; font-size: 0.65rem; border-radius: 10px; border: 1px solid var(--border-soft) !important; }

    /* === DATATABLE === */
    #scheduleTable { border-collapse: separate !important; border-spacing: 0 !important; width: 100% !important; margin: 0 !important; }
    #scheduleTable thead th {
        background-color: #0f172a !important; /* Dark Slate for high contrast */
        color: #ffffff !important;
        border: none !important;
        font-size: 0.75rem !important;
        text-transform: uppercase !important;
        letter-spacing: 0.8px !important;
        font-weight: 700 !important;
        padding: 12px 10px !important;
        text-align: center !important;
        vertical-align: middle !important;
    }
    #scheduleTable thead th:first-child { border-top-left-radius: 8px !important; border-bottom-left-radius: 8px !important; }
    #scheduleTable thead th:last-child { border-top-right-radius: 8px !important; border-bottom-right-radius: 8px !important; }
    #scheduleTable tbody td {
        background-color: transparent !important;
        color: var(--text-primary) !important;
        border-bottom: 1px solid var(--border-soft) !important;
        border-top: none !important; border-left: none !important; border-right: none !important;
        padding: 12px 10px !important;
        text-align: center !important;
        vertical-align: middle !important;
    }
    #scheduleTable tbody tr:nth-child(even) td { background-color: var(--bg-card-alt) !important; }
    #scheduleTable tbody tr:last-child td { border-bottom: none !important; }
    .badge-info { background: linear-gradient(135deg, var(--accent-green), var(--accent-teal)) !important; color: #fff !important; border: none !important; padding: 6px 12px !important; border-radius: 8px !important; font-weight: 700 !important; letter-spacing: 0.5px !important; }
    .badge-light { background-color: #e2e8f0 !important; color: #0f172a !important; border: none !important; padding: 6px 12px !important; font-weight: 700 !important; border-radius: 6px !important; margin: 2px !important; display: inline-block !important; }
    .text-success { color: var(--accent-green) !important; font-weight: 800 !important; font-size: 0.9rem !important; }

    /* === TOGGLE SWITCH (Default shape + Motion) === */
    .toggle.btn { border: none !important; }
    /* Override colors to match requested theme (ON=Green, OFF=Red) */
    .toggle-on.btn-success { background: #10B981 !important; border-color: #10B981 !important; color: #fff !important; }
    .toggle-off.btn-danger { background: #ef4444 !important; border-color: #ef4444 !important; color: #fff !important; }

    /* Pump Status Badges */
    #pumpStatus1 {
        padding: 3px 10px !important;
        border-radius: 12px !important;
        font-weight: 700 !important;
        letter-spacing: 0.5px !important;
    }
    #pumpStatus1.badge-success {
        background-color: #10B981 !important;
        color: #ffffff !important;
    }
    #pumpStatus1.badge-danger {
        background-color: #ef4444 !important;
        color: #ffffff !important;
    }

    /* === RESPONSIVE === */
    @media (max-width: 768px) {
        .sensor-grid { flex-wrap: wrap; }
        .sensor-grid > .sensor-card { flex: 1 1 calc(50% - 8px); min-width: calc(50% - 8px); }
    }
    @media (max-width: 480px) {
        .sensor-grid > .sensor-card { flex: 1 1 100%; min-width: 100%; }
        .garden-banner { height: 110px; }
        .garden-banner__title { font-size: 1.2rem; }
    }
</style>
@endpush
