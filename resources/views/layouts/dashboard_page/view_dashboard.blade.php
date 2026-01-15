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
                        <a class="btn-wide btn-outline-2x mr-md-2 btn-transition btn btn-outline-secondary btn-sm" href="{{ route('page.update.garden') }}"><i class="lnr-cog"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Garden Visualization -->
                    <div class="garden mb-4">
                        <img class="image-header" src="{{asset('/assets/images/dropdown-header/header_menu_4.jpg')}}" alt="">
                    </div>
                    <div class="row mb-4 g-3 element-block-example" id="realtimeData">
                        <div class="col-12">
                            <h5 class="card-title">Realtime Monitoring</h5>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xl-3">
                            <div class="card stat-card p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stat-icon btn-hover-shine btn-danger"><i class="bi bi-thermometer"></i></div>
                                    <div>
                                        <h6 class="menu-header-subtitle">Temperature</h6>
                                        <div class="widget-numbers">
                                            <h6 class="mb-0 custom-text" id="tempValue"></h6>
                                            <div id="wigetTemp"> {{-- Wiget deskripsi perubahan di sini --}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xl-3">
                            <div class="card stat-card p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stat-icon btn-hover-shine btn-info"><i class="bi bi-moisture"></i></div>
                                    <div>
                                        <h6 class="menu-header-subtitle">Humidity</h6>
                                        <div class="widget-numbers">
                                            <h6 class="mb-0 custom-text" id="humiValue"></h6>
                                            <div id="wigetHumi"> {{-- Wiget deskripsi perubahan di sini --}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xl-3">
                            <div class="card stat-card p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stat-icon btn-hover-shine btn-alternate"><i class="bi bi-sun-fill"></i></div>
                                    <div>
                                        <h6 class="menu-header-subtitle">Light</h6>
                                        <div class="widget-numbers">
                                            <h6 class="mb-0 custom-text" id="lumiValue"></h6>
                                            <div id="wigetLumi"> {{-- Wiget deskripsi perubahan di sini --}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xl-3">
                            <div class="card stat-card p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stat-icon btn-hover-shine btn-success"><i class="bi bi-water"></i></div>
                                    <div>
                                        <h6 class="menu-header-subtitle">Soil Moisture</h6>
                                        <div class="widget-numbers">
                                            <h6 class="mb-0 custom-text" id="soilValue"></h6>
                                            <div id="wigetSoil"> {{-- Wiget deskripsi perubahan di sini --}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- loading overlay --}}
                        <div class="body-block-example-1 d-none">
                            <div class="loader bg-transparent no-shadow p-0">
                                <div class="ball-grid-pulse">
                                    <div class="bg-white"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-white"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 g-3">
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <div class="card stat-card p-3" style="position: relative;">
                                <div class="card-header-tab card-header">
                                    <h6 class="card-header">watering schedule</h6>
                                </div>
                                <div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left center-elem mr-2"><i class="pe-7s-play"></i></div>
                                                    <div class="widget-content-left">
                                                        <h6 class="widget-heading">Starting On :</h6>
                                                        <p class="">2024-01-01 08:00 AM</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left center-elem mr-2"><i class="pe-7s-timer"></i></div>
                                                    <div class="widget-content-left">
                                                        <h6 class="widget-heading">Duration :</h6>
                                                        <p class="">10 Minute</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left center-elem mr-2"><i class="pe-7s-repeat"></i></div>
                                                    <div class="widget-content-left">
                                                        <h6 class="widget-heading">Repeat Every :</h6>
                                                        <p class="">Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <div class="card stat-card p-3" style="position: relative;">
                                <div class="card-header">Water Pump Control</div>
                                <ul class="todo-list-wrapper list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Water Pump 1 Status :</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <span id="pumpStatus1" class="mb-2 mr-2 badge badge-secondary">....</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <ul class="todo-list-wrapper list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Water Pump 2 Status :</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <span id="pumpStatus2" class="mb-2 mr-2 badge badge-secondary">....</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="todo-list-wrapper list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Water Pump 1 On/Off :</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <input class="water-pump-toggle" id="waterPump1" data-relay-id="1" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="todo-list-wrapper list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Water Pump 2 On/Off :</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <input class="water-pump-toggle" id="waterPump2" data-relay-id="2" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <button class="btn btn-primary mr-2 mb-2 block-element-btn-example-1">
                                    Elements Example 1
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center d-block p-3 card-footer">
                    <a class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg" href="{{ route('page.sensor.report') }}">
                        <span class="mr-2 opacity-7">
                            <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                        </span>
                        <span class="mr-1">View Complete Report</span>
                    </a>
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
                    // Hitung dan tampilkan perubahan jika ada data sebelumnya
                    if (lastData) {
                        updateChangeDisplay('wigetTemp', parseFloat(data.temperature), parseFloat(
                            lastData.temperature), 'Temperature');
                        updateChangeDisplay('wigetHumi', parseFloat(data.humidity), parseFloat(lastData
                            .humidity), 'Humidity');
                        updateChangeDisplay('wigetLumi', parseFloat(data.light), parseFloat(lastData
                            .light), 'Light');
                        updateChangeDisplay('wigetSoil', parseFloat(data.soil), parseFloat(lastData
                            .soil), 'Soil');
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
                    const toggle1 = $('#waterPump1');
                    const toggle2 = $('#waterPump2');

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
                    const isPump2On = data.relay2_status == 1;
                    pump2.text(isPump2On ? 'on' : 'off')
                        .removeClass('badge-success badge-danger')
                        .addClass(isPump2On ? 'badge-success' : 'badge-danger');
                    toggle2.data('syncing', true)
                        .prop('checked', isPump2On)
                        .bootstrapToggle(isPump2On ? 'on' : 'off');
                    toggle2.data('syncing', false);
                })
                .catch(err => console.error(err));
        }

        updatePumpStatus();
        setInterval(updatePumpStatus, 5000);
    });
</script>
<!--Circle Progress -->
<script src="{{asset('js/vendors/circle-progress.js')}}"></script>
<script src="{{asset('js/scripts-init/circle-progress.js')}}"></script>
<!--BlockUI -->
<script src="{{asset ('js/vendors/blockui.js')}}"></script>
<script src="{{asset ('js/scripts-init/blockui.js')}}"></script>
@endpush

@push('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>


</style>
@endpush
