<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport"content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('assets/css/base.min.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-7">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="">
                                <img class="custom-app-logo" src="{{ asset('/assets/images/logo-meta.png') }}">
                            </div>
                            <h4>
                                <div class="">
                                    <h3>First Setup</h3>
                                </div>
                                <span>It looks like you've been seen for the first time</span>
                            </h4>
                            <form method="POST" action="{{ route('create.garden') }}" enctype="multipart/form-data">
                            @csrf
                                <div id="smartwizard">
                                    <ul class="forms-wizard">
                                        <li>
                                            <a href="#step-1">
                                                <em>1</em><span>Namai Kebun Anda</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-2">
                                                <em>2</em><span>Buat Jadwal Penyiraman</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-3">
                                                <em>3</em><span>Buat Kondisi Penyiraman</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-4">
                                                <em>4</em><span>Setup Selesai!</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="form-wizard-content">
                                        <div id="step-1">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="gardenName" class="">Nama Kebun</label>
                                                        <input name="garden_name" id="gardenName" placeholder="Type here..." type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="gardenDesc" class="">Deskripsi Kebun</label>
                                                        <input name="garden_desc" id="gardenDesc" placeholder="Type here..." type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="gardenPic" class="">Gambar Kebun</label>
                                                        <input name="garden_pic" id="gardenPic" placeholder="" type="file" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 position-relative form-check">
                                                <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                                <label for="exampleCheck" class="form-check-label">Accept our <a href="javascript:void(0);">Terms and Conditions</a>.</label>
                                            </div>
                                        </div>
                                        <div id="step-2">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="scheduleName" class="">Nama Jadwal</label>
                                                        <input class="form-control" name="schedule_name" id="scheduleName" type="text" placeholder="Ex : Jadwal Musim Semi">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="relayId" class="">No. Relay</label>
                                                        <input class="form-control" name="relay_id" id="relayId" type="number" placeholder="1 atau 2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="scheduleDate" class="">Waktu Siram</label>
                                                        <input name="schedule_date" id="combineScheduleDate" type="hidden">
                                                        <select multiple="multiple" class="multiselect-dropdown form-control" id="scheduleDate">
                                                            <option value="senin">Senin</option>
                                                            <option value="selasa">Selasa</option>
                                                            <option value="rabu">Rabu</option>
                                                            <option value="kamis">Kamis</option>
                                                            <option value="jumat">Jumat</option>
                                                            <option value="sabtu">Sabtu</option>
                                                            <option value="minggu">Minggu</option>
                                                            <option value="every_day">Every Day</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="scheduleCycle" class="">Frekuensi Penyiraman
                                                        <span class="text-danger">*</span>
                                                        <small class="text-muted">Dalam sehari</small>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-retweet"></i>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="schedule_cycle" id="scheduleCycle">
                                                        <select class="form-control input-mask-trigger" id="selectDynamicInput">
                                                            <option value="1">1x/Hari</option>
                                                            <option value="2">2x/Hari</option>
                                                            <option value="3">3x/Hari</option>
                                                            <option value="4">4x/Hari</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row" id="dynamicInput">
                                                {{-- Dynamic input fields will be added here --}}
                                            </div>
                                        </div>
                                        <div id="step-3">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="conditionName" class="">
                                                            Nama Kondisi
                                                            <span class="text-danger">*</span>
                                                            <small>Biarkan Jika Ingin Nilai Default</small>
                                                        </label>
                                                        <input class="form-control" name="condition_name" id="conditionName" type="text" placeholder="Ex : Default Value">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="temperatureMin" class="">Suhu (°C)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-chevron-right"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="temperature_min" id="temperatureMin" type="number" placeholder="Ex : 25°C">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Suhu Minimum (°C) Kurang Dari >
                                                    </small>
                                                </div>
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="temperatureAvg" class="">&nbsp;</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-window-minimize"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="temperature_avg" id="temperatureAvg" type="number" placeholder="Ex : 25-35°C">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Suhu Rata-Rata (°C) Diantara ~
                                                    </small>
                                                </div>
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="temperatureMax" class="">&nbsp;</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-chevron-left"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="temperature_max" id="temperatureMax" type="number" placeholder="Ex : 35°C">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Suhu Maksimum (°C) Lebih dari <
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="moistureMin" class="">Kelembaban Rh(%)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-chevron-right"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="moisture_min" id="moistureMin" type="number" placeholder="Ex : 30%">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Kelembaban Minimum (%) Kurang Dari >
                                                    </small>
                                                </div>
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="moistureAvg" class="">&nbsp;</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-window-minimize"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="moisture_avg" id="moistureAvg" type="number" placeholder="Ex : 30-60%">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Kelembaban Rata-Rata (%) Diantara ~
                                                    </small>
                                                </div>
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="moistureMax" class="">&nbsp;</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-chevron-left"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="moisture_max" id="moistureMax" type="number" placeholder="Ex : 60%">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Kelembaban Maksimum (%) Lebih dari <
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="lightMin" class="">Cahaya Cd(%)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-chevron-right"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="light_min" id="lightMin" type="number" placeholder="Ex : 40%">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Cahaya Minimum (%) Kurang Dari >
                                                    </small>
                                                </div>
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="lightAvg" class="">&nbsp;</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-window-minimize"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="light_avg" id="lightAvg" type="number" placeholder="Ex : 40-70%">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Cahaya Rata-Rata (%) Diantara ~
                                                    </small>
                                                </div>
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="lightMax" class="">&nbsp;</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-chevron-left"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="light_max" id="lightMax" type="number" placeholder="Ex : 70%">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Cahaya Maksimum (%) Lebih dari <
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="soilMin" class="">Kelembaban Tanah (%)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-chevron-right"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="soil_min" id="soilMin" type="number" placeholder="Ex : 40%">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Kelembaban Tanah Minimum (%) Kurang Dari >
                                                    </small>
                                                </div>
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="soilAvg" class="">&nbsp;</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-window-minimize"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="soil_avg" id="soilAvg" type="number" placeholder="Ex : 40-70%">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Kelembaban Tanah Rata-Rata (%) Diantara ~
                                                    </small>
                                                </div>
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="soilMax" class="">&nbsp;</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-fw fa-chevron-left"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" name="soil_max" id="soilMax" type="number" placeholder="Ex : 70%">
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        Kelembaban Tanah Maksimum (%) Lebih dari <
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-4">
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
                                                    {{-- <button class="btn-shadow btn-wide btn btn-success btn-lg" disabled>Finish</button> --}}
                                                    <button type="submit" id="submit-btn" class="btn-shadow btn-wide btn btn-success btn-lg">Buat Kebun</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="divider"></div>
                            <div class="clearfix">
                                <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reset</button>
                                {{-- <button type="button" id="submit-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-success" method="POST" action="{{ route('create.garden') }}" enctype="multipart/form-data">Buat Kebun</button> --}}
                                <button type="button" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Next</button>
                                <button type="button" id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Previous</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-lg-flex d-xs-none col-lg-5">
                        <div class="slider-light">
                            <div class="slick-slider slick-initialized">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url({{asset('assets/images/dropdown-header/create_garden_menu_1.jpg')}});"></div>
                                        <div class="slider-content">
                                            <h3>Scalable, Modular, Consistent</h3>
                                            <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--SCRIPTS INCLUDES-->

    <!--CORE-->
    <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/metismenu.js') }}"></script>
    <script src="{{ asset('js/scripts-init/app.js') }}"></script>
    <script src="{{ asset('js/scripts-init/demo.js') }}"></script>
    <!--Multiselect-->
    <script src="{{ asset('js/vendors/form-components/bootstrap-multiselect.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('js/scripts-init/form-components/input-select.js') }}"></script>

    <!--Form Validation-->
    <script src="{{ asset('js/vendors/form-components/form-validation.js') }}"></script>
    <script src="{{ asset('js/scripts-init/form-components/form-validation.js') }}"></script>

    <!--Form Wizard-->
    <script src="{{ asset('js/vendors/form-components/form-wizard.js') }}"></script>
    <script src="{{ asset('js/scripts-init/form-components/form-wizard.js') }}"></script>
    <!--Guided Tours -->
    <script src="{{ asset('js/vendors/guided-tours.js') }}"></script>
    <script src="{{ asset('js/scripts-init/guided-tours.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                // Mendengarkan perubahan pada select multiple dengan id="scheduleDate"
                $('#scheduleDate').on('change', function() {
                    var selectedValues = $(this).val();
                    var jsonArray = JSON.stringify(selectedValues);
                    $('#combineScheduleDate').val(jsonArray);
                });
            });
            function updateDynamicInputs() {
                const selectedValue = parseInt($('#selectDynamicInput').val());
                document.getElementById("scheduleCycle").value = selectedValue;

                if (isNaN(selectedValue) || selectedValue < 1 || selectedValue > 4) return;  // Pengecekan aman
                $('#dynamicInput').empty();
                for (let i = 1; i <= selectedValue; i++) {
                    const inputHtml = `
                        <div class="col-md-3">  <!-- Atau col-md-6 untuk 2 per baris jika perlu -->
                            <div class="position-relative form-group select2">
                                <label for="wateringHour${i}">Jam Siram ${i}</label>
                                <input class="form-control wateringHour" name="schedule_time[]" id="wateringHour${i}" type="time" placeholder="12:00" required>
                            </div>
                        </div>
                    `;
                    $('#dynamicInput').append(inputHtml);
                }
            }
            // Inisialisasi input dinamis saat halaman dimuat
            updateDynamicInputs();
            $('#selectDynamicInput').change(updateDynamicInputs);
            $('#scheduleDate').on('change', function() {
                // simpan sebagai JSON string array
                const selectedDates = $(this).val(); // ini sudah berupa array
            });
        });

    </script>
</body>

</html>
