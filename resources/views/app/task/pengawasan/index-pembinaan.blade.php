@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
    <link href="{{ asset('plugins/datatable/fixedColumns.dataTables.min.css') }} " rel="stylesheet" />
@endpush
<style>
    .dataTables_scrollBody {
        overflow-y: scroll;
        cursor: grab;
        cursor: -webkit-grab;
    }

    .dataTables_scrollBody:active {
        cursor: grabbing;
        cursor: -webkit-grabbing;
    }

    td {
        text-align: center;
    }

    .fullwidth {
        white-space: nowrap;
    }
</style>
@section('header')
    <x-header title="Task Pengawasan - Pembinaan"></x-header>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pembinaan.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Input
                    Data</a>
            </div>
            <div class="card-body">

                <x-datatable id="datatable" class="table_fixed"  :th="[
                    'No',
                    'No. Nodis',
                    'Tgl Nodis',
                    'OPD Pemohon',
                    'Nama Pemohon',
                
                    'Tgl Pemohon',
                    'Uraian Pemohon',
                
                    //   'Jenis Assurance',
                    'Jenis Consulting',
                    'No Surat Tugas',
                    'Tgl Penugasan',
                    'Lama Waktu Pelaksanaan',
                    'Verifikasi Inskpetur',
                    'Verifikasi Kabid',
                    'Status Progress',
                    'Di Input Oleh',
                    'Bidang',
                    'Tgl Input',
                    '#Aksi',
                ]"></x-datatable>
            </div>
        </div>
    </div>
    @include('app.task.pengawasan.modal-anggota', ['id' => 'modal_anggota'])
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.js"></script>
    <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://unpkg.com/scrollbooster@2/dist/scrollbooster.min.js"></script>
    <script src="{{ asset('plugins/datatable/dataTables.fixedColumns.min.js') }}"></script>
    
    <script>
        let datatable = $("#datatable").DataTable({
         serverSide: true,
                processing: true,
                searching: true,
                lengthChange: true,
                paging: true,
          
                info: true,
                ordering: true,
                scrollX: true,
            order: [
                [15, 'desc']
            ],
            fixedColumns: {
                rightColumns: 1,
                leftColumns: 0,
            },
            ajax: @json(route('pembinaan.index')),
            columns: [{
                    data: "DT_RowIndex",
                    searchable: false,
                    width: '1%'
                },
                {
                    data: "nodis_no",
                    orderable: false,
                },
                {
                    data: "nodis_tgl",
                    orderable: false,
                },

                {
                    data: "opd.nunker",
                    defaultContent: '-',
                    orderable: false,
                },
                {
                    data: "pemohon_nama",
                    orderable: false,
                },
                {
                    data: "pemohon_tgl",
                    orderable: false,
                }, {
                    data: "pemohon_perihal",
                    orderable: false,
                },

                //  {
                //      data: "assurance_jenis",
                //      defaultContent: '-',
                //      orderable: false,
                //  },
                {
                    data: "consulting_jenis",
                    searchable: false,

                    defaultContent: '-',
                    orderable: false,
                },
                {
                    data: "surat_tugas_no",
                    orderable: false,
                    defaultContent: '-',
                },

                {
                    data: "tgl_penugasan",
                    searchable: false,
                    className: 'fullwidth',
                    orderable: false,
                },
                {
                    data: "lama_waktu_penugasan",
                    defaultContent: '-',
                    searchable: false,
                    width: '130px',
                    orderable: false,
                },

                {
                    data: "verifikasi_ins",
                    defaultContent: '-',
                    searchable: false,
                    className: 'fullwidth',
                    orderable: false,
                },
                {
                    data: "verifikasi_kabid",
                    name:"verifikasi_status_kabid",
                    searchable: false,
                    className: 'fullwidth',
                    defaultContent: '-',
                    orderable: true,
                },
                {
                    data: "status_progress",
                    searchable: true,
                    defaultContent: '-',
                    orderable: false,
                },
                {
                    data: "created_by",
                    
                    defaultContent: '-',
                    className: 'fullwidth',
                    orderable: false,
                },
                {
                    data: "bidang",
                    defaultContent: '-',
                    className: 'fullwidth',
                    orderable: false,
                },
                {
                    data: "created_at",
                    defaultContent: '-',
                    className: 'fullwidth',
                    orderable: false,
                },
                
                {
                    data: "action",
                    orderable: false,
                    searchable: false,
                },
            ]
        })
        $('body').on('click', '.btn_hapus', function(e) {
            let data = $(this).attr('data-hapus');
            Swal.fire({
                title: `Apakah anda yakin ingin menghapus data Pengawasan ${data}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).find('#form-delete').submit();
                }
            })
        });

        $('body').on('click', '.btn_verifikasi', function(e) {

            e.preventDefault()

            if ($(this).attr('data-verifikasi') == "belum") {
                message = "Apakah Anda Yakin Ingin Verifikasi Data ?"
            } else {
                message = "Apakah Anda Yakin Ingin Membatalkan Verifikasi Data ?"
            }
            text = Swal.fire({
                title: 'Verifikasi',
                text: message,
                input: 'textarea',
                inputPlaceholder: 'Masukan Pesan (Opsional) ...',
                confirmButtonText: 'Ya, Lanjutkan',
                inputAttributes: {
                    'aria-label': 'Type your message here'
                },
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _method: 'POST',
                            pesan: result.value,
                        },
                        url: $(this).attr('data-url'),
                        beforeSend: function() {
                            showLoading()
                        },
                        success: (response) => {
                            datatable.ajax.reload()
                            Swal.fire({
                                icon: 'success',
                                title: "Success",
                                html: 'Berhasil',
                                showCancelButton: true,
                                allowEscapeKey: false,
                                showCancelButton: false,
                                allowOutsideClick: false,
                            }).then((result) => {
                              if (result.isConfirmed) {
                                 location.reload();
                              }
                             
                            })
                            swal.hideLoading()
                        },
                        error: function(response) {
                            showError(response)
                        }
                    })
                }
            })
        })

        $('body').on('click', '.btn_tolak', function(e) {

            e.preventDefault()
            text = Swal.fire({
                title: 'Tolak',
                text: "Apakah anda Yakin ingin Menolak Data ini ?",
                input: 'textarea',
                inputPlaceholder: 'Masukan Pesan ...',
                confirmButtonText: 'Ya, Lanjutkan',
                inputAttributes: {
                    'aria-label': 'Type your message here'
                },
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _method: 'POST',
                            pesan: result.value,
                        },
                        url: $(this).attr('data-url'),
                        beforeSend: function() {
                            showLoading()
                        },
                        success: (response) => {
                            datatable.ajax.reload()
                            Swal.fire({
                                icon: 'success',
                                title: "Success",
                                html: 'Berhasil',
                                showCancelButton: true,
                                allowEscapeKey: false,
                                showCancelButton: false,
                                allowOutsideClick: false,
                            })
                            swal.hideLoading()
                        },
                        error: function(response) {
                            showError(response)
                        }
                    })
                }
            })




        })
    </script>
@endpush
