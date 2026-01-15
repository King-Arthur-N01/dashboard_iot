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
                        <table style="width: 100%;" id="scheduleTable" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jadwal</th>
                                    <th>Waktu Siram</th>
                                    <th>Cycle Time</th>
                                    <th>Jam Siram</th>
                                    <th>No. Relay</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab-add-schedule" role="tabpanel">
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
                                    <input type="hidden" name="combined_schedule_date_value" id="combinedScheduleDate">
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
@section('modals')
<!-- Edit Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modalHeaderEdit">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modalTextEdit">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="editScheduleName" class="">Nama Jadwal</label>
                            <input class="form-control" name="edit_schedule_name" id="editScheduleName" type="text" placeholder="Ex : Jadwal Musim Semi">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="editRelayId" class="">No. Relay</label>
                            <input class="form-control" name="edit_relay_id" id="editRelayId" type="number" placeholder="1 atau 2">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="editScheduleDate" class="">Waktu Siram</label>
                            <input type="hidden" name="combined_edit_schedule_date" id="combinedEditScheduleDate">
                            <select multiple="multiple" class="multiselect-dropdown form-control" id="editScheduleDate">
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
                        <label for="editScheduleCycle" class="">Frekuensi Penyiraman
                            <span class="text-danger">*</span>
                            <small class="text-muted">Dalam sehari</small>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-fw fa-retweet"></i>
                                </div>
                            </div>
                            <input type="hidden" name="edit_schedule_cycle" id="editScheduleCycle">
                            <select class="form-control input-mask-trigger" id="editSelectDynamicInput">
                                <option value="1">1x/Hari</option>
                                <option value="2">2x/Hari</option>
                                <option value="3">3x/Hari</option>
                                <option value="4">4x/Hari</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row" id="editDynamicInput">
                    {{-- Dynamic input fields will be added here --}}
                </div>
            </div>
            <div class="modal-footer" id="modalButtonEdit">
                <div class="d-block text-right card-footer">
                    <button type="button" class="mt-2 btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="mt-2 btn btn-primary" id="editSchedule">Tambah Data</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Modal -->

<!-- Alert Modal -->
<div class="modal fade" id="modalAlert" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modalHeader">
            </div>
            <div class="modal-body" id="modalText">
            </div>
            <div class="modal-footer" id="modalButton">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Alert Modal -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // kode javascript untuk menginisiasi datatable dan berfungsi sebagai dynamic table
            const table = $('#scheduleTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: "{{ url('/api/read/schedule/data') }}",
                    type: "GET",
                    dataType: "json",
                    dataSrc: "data"  // Default: response langsung sebagai array
                },
                columns: [
                    { data: 'number', render: function(data, type, row, meta) { return meta.row + 1; } },  // Auto-numbering
                    { data: 'schedule_name' },
                    {
                        data: 'schedule_date',
                        render: function(data) {
                            // Parse string menjadi array dan format ulang (hapus quotes ekstra)
                            try {
                                const dates = JSON.parse(data).split(',');  // Misal: ["senin", "selasa"]
                                return dates.join(', ');  // Output: "senin, selasa"
                            } catch {
                                return data;  // Fallback jika gagal parse
                            }
                        }
                    },
                    {
                        data: 'schedule_cycle',
                        render: function(data) {
                            return data + 'X/Hari';
                        }
                    },
                    {
                        data: 'schedule_time',
                        render: function(data) {
                            // Parse string menjadi array dan format ulang
                            try {
                                const times = JSON.parse(data).split(',');  // Misal: ["08:00", "17:00"]
                                return times.join(', ');  // Output: "08:00, 17:00"
                            } catch {
                                return data;  // Fallback
                            }
                        }
                    },
                    { data: 'relay_id' },
                    {
                        data: 'actions',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <div class="btn-group">
                                    <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="dropdown-toggle btn btn-primary"><i class="fa fa-fw fa-list"></i></button>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                        <button type="button" tabindex="0" class="dropdown-item btn-view" data-id="${row.id}" data-toggle="modal" data-target="modal-lg" style="color:green;"><i class="fa fa-fw fa-eye"></i>&nbsp;Detail</button>
                                        <button type="button" tabindex="0" class="dropdown-item btn-edit" data-id="${row.id}" data-toggle="modal" data-target="modal-lg" style="color:blue;"><i class="fa fa-fw fa-edit"></i>&nbsp;Edit</button>
                                        <button type="button" tabindex="0" class="dropdown-item btn-delete" data-id="${row.id}" style="color:red;"><i class="fa fa-fw fa-trash"></i>&nbsp;Delete</button>
                                    </div>
                                </div>
                            `;
                        }
                    }
                ]
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
            // Opsional: Jika menggunakan plugin multiselect untuk scheduleDate, tambahkan logika untuk mengisi input hidden
            $('#scheduleDate').on('change', function() { $('#combinedScheduleDate').val($(this).val().join(',')); });

            // Fungsi menambah data schedule
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
                    scheduleDate: $('#combinedScheduleDate').val(),
                    scheduleTime: scheduleTime,  // array dinamis
                    scheduleCycle: $('input[name="schedule_cycle"]').val(),
                };
                const selectedFrequency = parseInt($('#selectDynamicInput').val());
                if (scheduleTime.length !== selectedFrequency) {
                    alert('Jumlah jam penyiraman tidak sesuai dengan frekuensi penyiraman yang dipilih!');
                    return;
                }
                if (confirm("Apakah anda yakin semua data sudah terisi dengan benar?")) {
                    const data = new FormData();
                    data.append('_token', '{{ csrf_token() }}');
                    data.append('schedule_name', formData.scheduleName);
                    data.append('relay_id', formData.relayId);
                    data.append('schedule_date', formData.scheduleDate);
                    data.append('schedule_time', formData.scheduleTime);
                    data.append('schedule_cycle', formData.scheduleCycle);

                    fetch("{{ url('/api/create/schedule/data') }}", {
                        method: 'POST',
                        body: data
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
                    .then(data => {
                        // Success handling
                        if (data.success) {
                            const successMessage = data.success;
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
                        if (data.error && error.response.data) {
                            const warningMessage = data.error;
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
                    })
                    .finally(() => {
                        table.ajax.reload(null, false);
                    });
                } else {
                    // User cancelled, do nothing
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
                    $('#editSelectDynamicInput').val(data.schedule_cycle).trigger('change');

                    const times = data.schedule_time.replace(/"/g, '').split(',');
                    $('#editDynamicInput').empty();
                    times.forEach((time, i) => {
                        $('#editDynamicInput').append(`
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jam Siram ${i + 1}</label>
                                    <input type="time" class="form-control" name="edit_schedule_time[]" value="${time}">
                                </div>
                            </div>
                        `);
                    });
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
                // reset select2
                $('#editScheduleDate').val(null).trigger('change');
                // reset select biasa
                $('#editSelectDynamicInput').val('1').trigger('change');
                // reset dynamic input
                $('#editDynamicInput').empty();
            });

            $('#editSchedule').on('click', function () {
                if (!currentScheduleId) {
                    alert('ID jadwal tidak ditemukan');
                    return;
                }
                let times = [];
                $('input[name="edit_schedule_time[]"]').each(function () {
                    times.push($(this).val());
                });
                const payload = {
                    schedule_name: $('#editScheduleName').val(),
                    relay_id: $('#editRelayId').val(),
                    schedule_date: $('#editScheduleDate').val(),
                    schedule_time: times,
                    schedule_cycle: $('#editSelectDynamicInput').val()
                };
                fetch(`{{ url('/api/update/schedule/data') }}/${currentScheduleId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        $('#modalEdit').modal('hide');
                        table.ajax.reload(null, false);
                        alert('Data berhasil diperbarui');
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Gagal update data');
                });
            });

            // Fungsi menghapus data schedule
            $('#scheduleTable').on('click', '.btn-delete', function(e) {
                e.preventDefault();
                const button = $(this);
                const scheduleId = button.data('id');
                if (confirm("Apakah yakin menghapus schedule ini?")) {
                    const data = new FormData();
                    data.append('_token', '{{ csrf_token() }}');
                    data.append('id', scheduleId);
                    fetch("{{ url('/api/delete/schedule/data') }}/" + scheduleId, {
                        method: 'POST',
                        body: data
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(responseData => {
                        // Success handling
                        if (responseData.success) {
                            const successMessage = responseData.success;
                            const text_modal = `<div class="modal-text"><h5>${successMessage}</h5> <img class="rounded-circle icon-image" src="{{asset('/assets/images/icons/success.png')}}" alt=""></div>`;
                            $('#modalHeader').text('Success');
                            $('#modalText').html(text_modal);
                            $('#modalAlert').modal('show');
                            setTimeout(function() {
                                $('#modalAlert').modal('hide');
                            }, 2000);
                        }
                    })
                    .catch(error => {
                        // Error handling
                        console.error('Error:', error);
                        $('#modalHeader').text('Error');
                        $('#modalText').text('Terjadi kesalahan saat menghapus data.');
                        $('#modalAlert').modal('show');
                        setTimeout(function() {
                            $('#modalAlert').modal('hide');
                        }, 2000);
                    })
                    .finally(() => {
                        table.ajax.reload(null, false);
                    });
                } else {
                    // User cancelled the deletion, do nothing
                }
            });
        });
    </script>

    <!--DataTables-->
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.19/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" crossorigin="anonymous"></script> --}}
    <!--DataTables-->
    <script src="{{asset('js/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/vendors/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!--Bootstrap Tables-->
    <script src="{{asset('js/vendors/tables.js')}}"></script>
    <!--Tables Init-->
    <script src="{{asset('js/scripts-init/tables.js')}}"></script>
    <!--Form Validation-->
    <script src="{{asset('js/vendors/form-components/form-validation.js')}}"></script>
    <script src="{{asset('js/scripts-init/form-components/form-validation.js')}}"></script>
    <!--Select2-->
    <script src="{{asset('js/vendors/form-components/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('js/vendors/form-components/input-select.min.js')}}"></script>
    <script src="{{asset('js/scripts-init/form-components/input-select.js')}}"></script>
@endpush

@push('style')
@endpush
