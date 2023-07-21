@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/flatpicker/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
@endpush
<style>
    .text-wrap {
        white-space: normal;
    }
</style>
@section('header')
    <x-header title="Jadwal Aktifitas"></x-header>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                {{-- <a id="btn_filter" href="#" class="btn btn-sm btn-primary"><i class="fas fa-filter"></i> Filter
                    Data</a> --}}
            </div>
            <div class="card-body">
                <x-datatable id="datatable" class="" :th="[
                    'No',
                    'Foto',
                    'Nama',
                    'Bidang',
                    'Group Task',
                    'Task',
                    'Tanggal Estimasi',
                    'Deadline',
                    'Verifikasi',
                    'Status Progress',
                ]"></x-datatable>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.js"></script>
    <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://unpkg.com/scrollbooster@2/dist/scrollbooster.min.js"></script>

    <script src="{{ asset('plugins/flatpicker/flatpickr.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpicker/id.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    @include('app.jadwal_aktifitas.modal-filter')
    <script>
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            allowClear: true
        })

        const filter_tanggal = $("#filter_tanggal").flatpickr({
            allowInput: true,
            dateFormat: "d/m/Y",
            mode: "range",
            locale: "id",
            onChange: function(dates, dateStr, instance) {
                if (dates.length == 2) {

                }
            }
        })

        let datatable = $("#datatable").DataTable({
            serverSide: true,
            processing: true,
            searching: true,
            lengthChange: true,
            paging: true,
            info: true,
            ordering: true,
            pageLength: 50,
            ajax: @json(route('jadwal_aktifitas.index')),
            columnDefs: [{
                render: function(data, type, full, meta) {
                    return "<div class='text-nowrap'>" + data + "</div>";
                },
                targets: [6, 8],

            }],


            columns: [{
                    data: "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                    width: '1%'
                },
                {
                    data: 'foto',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'user.nama_lengkap',
                    name: 'user.nama_lengkap',
                    orderable: false,
                },
                {
                    data: 'user.bidang.nama',
                    name: 'user.bidang.nama',
                    orderable: false,
                },
                {
                    data: 'kanban_group.nama',
                    name: 'kanban_group.nama',
                    orderable: false,
                },
                {
                    data: 'judul',
                    orderable: false,
                },
                {
                    data: 'tanggal',
                    visible: false,
                    orderable: false,
                },
                {
                    data: 'deadline',
                    visible: false,
                    orderable: false,
                },
                {
                    data: 'verifikasi_tgl',
                    defaultContent: '',
                    visible: false

                },
                {
                    data: 'kanban_status',
                    defaultContent: '',
                },
                

            ]
        })


        $('#btn_filter').click(function(e) {
            e.preventDefault();
            $('#modal_filter').modal('show');
        })

        $('#btn_submit_filter').click(function(e) {
            e.preventDefault();
            alert('terapkan')
        })
    </script>
@endpush
