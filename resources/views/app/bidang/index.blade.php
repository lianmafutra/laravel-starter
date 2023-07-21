@extends('admin.layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('header')
    <x-header title="Data Bidang"></x-header>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="#" id="btn_create" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Input
                    Data</a>
            </div>
            <div class="card-body">
                <x-datatable id="datatable" class="text-nowrap" :th="['No', 'Nama', 'Kepala Bidang', 'Deskripsi', 'Action']"></x-datatable>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2-min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    @include('app.bidang.modal-create-edit')
    <script>
        $(document).ready(function() {

            $('.select2bs4').select2({
                theme: 'bootstrap4',
            })
            
            let datatable = $("#datatable").DataTable({
                serverSide: true,
                processing: true,
                searching: true,
                lengthChange: true,
                paging: true,
                info: true,
                ordering: true,

                ajax: @json(route('bidang.index')),

                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        width: '1%'
                    },
                    {
                        data: 'nama',
                        orderable: false,
                    },
                    {
                        data: 'kepala_bidang',
                        orderable: false,
                    },
                    {
                        data: 'desc',
                        orderable: false,
                    },
                    {
                        data: "action",
                        orderable: false,
                        searchable: false,
                    },
                ]
            });

            $("#btn_create").click(function() {
                clearInput()
                $('#modal_create_edit').modal('show')
                $('.modal-title').text('Tambah Data')
            });


            $("#form_tambah").submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: @json(route('bidang.store')),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend: function() {
                        showLoading()
                    },
                    success: (response) => {
                        if (response) {
                            this.reset()
                            $('#modal_create_edit').modal('hide')
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showCancelButton: true,
                                allowEscapeKey: false,
                                showCancelButton: false,
                                allowOutsideClick: false,
                            }).then((result) => {
                                swal.hideLoading()
                                datatable.ajax.reload()
                            })
                            swal.hideLoading()
                        }
                    },
                    error: function(response) {
                        showError(response)
                    }
                });
            });

            $('#datatable').on('click', '.btn_edit', function(e) {
                clearInput()
                $('#modal_create_edit').modal('show')
                $('.modal-title').text('Ubah Data')
                $('.error').hide();
                let url = $(this).attr('data-url');
                $.get(url, function(response) {
                    $('#id').val(response.data.id)
                    $('#nama').val(response.data.nama)
                    $('#desc').val(response.data.desc)
                    $('#kepala_bidang').val(response.data.kepala_bidang).trigger("change");
                })
            });

            $('#datatable').on('click', '.btn_hapus', function(e) {
                let data = $(this).attr('data-hapus');
                Swal.fire({
                    title: 'Apakah anda yakin ingin menghapus data Bidang?',
                    text: data,
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

        })
    </script>
@endpush
