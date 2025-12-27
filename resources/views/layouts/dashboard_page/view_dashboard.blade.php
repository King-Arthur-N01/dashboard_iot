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
                        <a class="btn-wide btn-outline-2x mr-md-2 btn-transition btn btn-outline-secondary btn-sm" href="{{ route('edit.garden') }}"><i class="lnr-cog"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Garden Visualization -->
                    <div class="garden mb-4">
                        <img class="image-header" src="{{asset('/assets/images/dropdown-header/header_menu_4.jpg')}}" alt="">
                    </div>
                    <div class="row mb-4 g-3">
                        <div class="col-sm-6 col-md-3 col-xl-3">
                            <div class="card stat-card p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stat-icon btn-hover-shine btn-danger"><i class="bi bi-thermometer"></i></div>
                                    <div>
                                        <h4 class="text-muted widget-heading">Temperature</h4>
                                        <div class="widget-numbers">
                                            <h6 class="mb-0 custom-text" id="temp_value"></h6>
                                            <div id="wiget_temp"> {{-- Wiget deskripsi perubahan di sini --}}</div>
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
                                        <h4 class="text-muted widget-heading">Humidity</h4>
                                        <div class="widget-numbers">
                                            <h6 class="mb-0 custom-text" id="humi_value"></h6>
                                            <div id="wiget_humi"> {{-- Wiget deskripsi perubahan di sini --}}</div>
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
                                        <h4 class="text-muted widget-heading">Light</h4>
                                        <div class="widget-numbers">
                                            <h6 class="mb-0 custom-text" id="lumi_value"></h6>
                                            <div id="wiget_lumi"> {{-- Wiget deskripsi perubahan di sini --}}</div>
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
                                        <h4 class="text-muted widget-heading">Soil Moisture</h4>
                                        <div class="widget-numbers">
                                            <h6 class="mb-0 custom-text" id="soil_value"></h6>
                                            <div id="wiget_soil"> {{-- Wiget deskripsi perubahan di sini --}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 g-3">
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <div class="card stat-card p-3" style="position: relative;">
                                <div class="card-header-tab card-header">
                                    <h4 class="font-size-md">watering schedule</h4>
                                </div>
                                <div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left center-elem mr-2"><i class="pe-7s-play"></i></div>
                                                    <div class="widget-content-left">
                                                        <h5 class="widget-heading">Starting On :</h5>
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
                                                        <h5 class="widget-heading">Duration :</h5>
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
                                                        <h5 class="widget-heading">Repeat Every :</h5>
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
                                                    <span id="pump1_status" class="badge badge-secondary mr-2">....</span>
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
                                                    <span id="pump2_status" class="badge badge-secondary mr-2">....</span>
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
                                                    <input class="water-pump-toggle" id="water_pump_1" data-relay-id="1" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
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
                                                    <input class="water-pump-toggle" id="water_pump_2" data-relay-id="2" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center d-block p-3 card-footer">
                    <a class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg" href="{{ route('report.sensor.data') }}">
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
            </div>`;
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
                        updateChangeDisplay('wiget_temp', parseFloat(data.temperature), parseFloat(
                            lastData.temperature), 'Temperature');
                        updateChangeDisplay('wiget_humi', parseFloat(data.humidity), parseFloat(lastData
                            .humidity), 'Humidity');
                        updateChangeDisplay('wiget_lumi', parseFloat(data.light), parseFloat(lastData
                            .light), 'Light');
                        updateChangeDisplay('wiget_soil', parseFloat(data.soil), parseFloat(lastData
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
                    const pump1 = $('#pump1_status');
                    const pump2 = $('#pump2_status');
                    const toggle1 = $('#water_pump_1');
                    const toggle2 = $('#water_pump_2');

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

@endpush

@push('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>


</style>
@endpush
