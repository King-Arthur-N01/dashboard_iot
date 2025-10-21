@extends('dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="app-inner-layout">
    <div class="row">
        <div class="col-lg-6 col-xl-4">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr lnr-leaf mr-3 text-muted opacity-6"></i> [Garden Name]
                    </div>
                    <div class="btn-actions-pane-right actions-icon-btn">
                        <div class="btn-group dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                <i class="pe-7s-menu btn-icon-wrapper"></i>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-inbox"> </i><span>Menus</span></button>
                                <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span></button>
                                <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-book"> </i><span>Actions</span></button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <div class="p-1 text-right">
                                    <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                    <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-chart widget-chart2 text-left p-0">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content widget-chart-content-lg" style="background-image: url({{asset('assets/images/dropdown-header/header_menu_1_1.jpg')}});">
                            <div class="widget-chart-flex">
                                <div class="widget-title text-custom text-uppercase">[Tanaman Jahe]</div>
                            </div>
                            <div class="widget-numbers">
                                <div class="widget-chart-flex">
                                    <div style="color: white">
                                        <span class="opacity-10 text-success pr-2">
                                        <i class="fa fa-angle-up"></i>
                                    </span>
                                        <span>9</span>
                                        <small>%</small>
                                    </div>
                                    {{-- <div class="widget-title ml-2 font-size-lg font-weight-normal text-muted">
                                        <span class="text-danger pl-2">+14% failed</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-2 pb-0 card-body">
                    <h6 class="text-muted text-uppercase font-size-md opacity-9 mb-2 font-weight-normal">Sensor</h6>
                    <div class="scroll-area-md shadow-overflow">
                        <div class="scrollbar-container">
                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <img width="38" class="rounded-circle" src="{{asset('/assets/images/icons/thermometer.png')}}" alt="">
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Suhu Udara</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="fsize-1 text-focus">
                                                    <span id="temp-value"></span>
                                                    <small class="text-warning pl-2">
                                                        <i class="fa fa-angle-down"></i>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <img width="38" class="rounded-circle" src="{{asset('/assets/images/icons/humidity.png')}}" alt="">
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Kelembapan Udara</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="fsize-1 text-focus">
                                                    <span id="humi-value"></span>
                                                    <small class="text-danger pl-2">
                                                        <i class="fa fa-angle-up"></i>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <img width="38" class="rounded-circle" src="{{asset('/assets/images/icons/sun.png')}}" alt="">
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Insensitas Cahaya</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="fsize-1 text-focus">
                                                    <span id="light-value"></span>
                                                    <small class="text-muted pl-2">
                                                        <i class="fa fa-angle-down"></i>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <img width="38" class="rounded-circle" src="{{asset('/assets/images/icons/soil.png')}}" alt="">
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Kelembapan Tanah</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="fsize-1 text-focus">
                                                    <span id="soil-value"></span>
                                                    <small class="text-primary pl-2">
                                                        <i class="fa fa-angle-up"></i>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-block text-center rm-border card-footer">
                    <button class="btn btn-primary">
                        View complete report
                        <span class="text-white pl-2 opacity-3">
                        <i class="fa fa-arrow-right"></i>
                    </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fetchSensorData = () => {
            fetch("{{ url('/api/sensor/latest') }}")
                .then(response => response.json())
                .then(data => {
                    // Update nilai di UI
                    document.getElementById('temp-value').textContent = data.temperature + "°C";
                    document.getElementById('humi-value').textContent = data.humidity + " (Rh)";
                    document.getElementById('light-value').textContent = data.light + " %";
                    document.getElementById('soil-value').textContent = data.soil + " %";

                    // Optional: tampilkan waktu update terakhir
                    // document.getElementById('last-update').textContent = new Date(data.updated_at).toLocaleTimeString();
                })
                .catch(err => console.error('Error fetching sensor data:', err));
        };

        // Jalankan pertama kali
        fetchSensorData();
        // Jalankan ulang tiap 1 menit
        setInterval(fetchSensorData, 60000);
    });
</script>
@endpush

@push('style')

@endpush

