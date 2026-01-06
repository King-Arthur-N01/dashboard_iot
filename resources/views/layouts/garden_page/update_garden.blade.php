@extends('master')
@section('title', 'Update Garden Information')

@section('content')
<div class="app-inner-layout">
    <div class="tabs-animation">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a data-toggle="tab" href="#tab-table-schedule" class="active nav-link"><i class="fa fa-fw fa-search"></i> Lihat Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" href="#tab-add-schedule" class="nav-link"><i class="fa fa-fw fa-plus-circle"></i> Tambah Jadwal</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-table-schedule" role="tabpanel">
                        <h5 class="card-title">Simple table</h5>
                        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jadwal</th>
                                    <th>Waktu Siram</th>
                                    <th>Jam Siram</th>
                                    <th>No. Relay</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Jadwal Siram Harian</td>
                                    <td>Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu</td>
                                    <td>08:00 - 17:00</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jadwal Siram Pupuk</td>
                                    <td>Minggu</td>
                                    <td>07:00</td>
                                    <td>2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab-add-schedule" role="tabpanel">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="scheduleName" class="">Nama Jadwal</label>
                                    <input class="form-control" name="schedule_name" id="scheduleName" type="text" placeholder="Jadwal Musim Semi">
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
                                    <input type="hidden" name="combined_schedule_date_value" id="combinedScheduleDateValue">
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
                        <div class="position-relative form-check">
                            <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                            <label for="exampleCheck" class="form-check-label">Check me out</label>
                        </div>
                        <div class="d-block text-right card-footer">
                            <button type="button" class="mt-2 btn btn-danger" id="cancleSchedule">Batal</button>
                            <button type="submit" class="mt-2 btn btn-primary" id="addSchedule">Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
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
            // Opsional: Jika menggunakan plugin multiselect untuk scheduleDate, tambahkan logika untuk mengisi input hidden
            $('#scheduleDate').on('change', function() { $('#combinedScheduleDateValue').val($(this).val().join(',')); });


            $('#addSchedule').on('click', function() {
                let scheduleTime = [];
                $('input[name="schedule_time[]"]').each(function() {
                    const value = $(this).val();
                    if (value) {
                        scheduleTime.push(value);
                    }
                });

                let formData = {
                    scheduleName: $('input[name="schedule_name"]').val(),
                    relayId: $('input[name="relay_id"]').val(),
                    scheduleDate: $('#combinedScheduleDateValue').val(),
                    scheduleTime: scheduleTime,  // array dinamis
                    scheduleCycle: $('input[name="schedule_cycle"]').val(),
                };

                const selectedFrequency = parseInt($('#selectDynamicInput').val());
                if (scheduleTime.length !== selectedFrequency) {
                    alert('Jumlah jam penyiraman tidak sesuai dengan frekuensi yang dipilih!');
                    return;
                }
                if (confirm("Apakah anda yakin semua data sudah terisi dengan benar?")) {
                    // Buat FormData untuk mengirim data (multipart/form-data)
                    const data = new FormData();
                    data.append('_token', '{{ csrf_token() }}');
                    data.append('schedule_name', formData.scheduleName);
                    data.append('relay_id', formData.relayId);
                    data.append('schedule_date', formData.scheduleDate);
                    data.append('schedule_time', JSON.stringify(formData.scheduleTime));
                    data.append('schedule_cycle', formData.scheduleCycle);

                    // Gunakan Fetch API
                    fetch("{{ url('/api/register/schedule/data') }}", {
                        method: 'POST',
                        body: data  // Kirim FormData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();  // Parse response sebagai JSON
                    })
                    .then(data => {
                        // Success handling
                        if (data.success) {
                            const successMessage = data.success;
                            $('#successText').text(successMessage);
                            $('#successModal').modal('show');
                            setTimeout(function() {
                                $('#successModal').modal('hide');
                            }, 2000);
                        }
                    })
                    .catch(error => {
                        // Error handling
                        console.error('Error:', error);
                        if (error.response && error.response.data) {
                            const warningMessage = error.response.data.error;
                            $('#failedText').text(warningMessage);
                            $('#failedModal').modal('show');
                            setTimeout(function() {
                                $('#failedModal').modal('hide');
                            }, 2000);
                        } else {
                            $('#failedText').text('Terjadi kesalahan saat mengirim data.');
                            $('#failedModal').modal('show');
                            setTimeout(function() {
                                $('#failedModal').modal('hide');
                            }, 2000);
                        }
                    });
                } else {
                    // User cancelled, do nothing
                }
            });
        });
    </script>

    <!--DataTables-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.19/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" crossorigin="anonymous"></script>
    <!--Bootstrap Tables-->
    <script src="{{asset('js/vendors/tables.js')}}"></script>
    <!--Tables Init-->
    <script src="{{asset('js/scripts-init/tables.js')}}"></script>
    <!--Form Validation-->
    <script src="{{asset('js/vendors/form-components/form-validation.js')}}"></script>
    <script src="{{asset('js/scripts-init/form-components/form-validation.js')}}"></script>
    <!--Form Wizard-->
    <script src="{{asset('js/vendors/form-components/form-wizard.js')}}"></script>
    <script src="{{asset('js/scripts-init/form-components/form-wizard.js')}}"></script>
    <!--Input Mask-->
    <script src="{{asset('js/vendors/form-components/input-mask.js')}}"></script>
    <script src="{{asset('js/scripts-init/form-components/input-mask.js')}}"></script>
    <!--Multiselect-->
    <script src="{{asset('js/vendors/form-components/bootstrap-multiselect.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{asset('js/scripts-init/form-components/input-select.js')}}"></script>
@endpush

@push('style')

@endpush
