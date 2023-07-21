@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
@endpush
<style>

</style>
@section('header')
    <x-header title="Data User/user"></x-header>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="#" id="btn_create_user" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Input
                    Data</a>
            </div>
            <div class="card-body">
                <x-datatable id="datatable" 
                 :th="[
                  'No',
                  'Foto',
                   'Username',
                   'NIP',
                  //  'Username',
                   'Nama Lengkap',
                   'Bidang',
                   'Kontak',
                   'Role',
                   'Jabatan',
                   'Status',
                    'Action']"></x-datatable>
            </div>
        </div>
    </div>
  
@endsection
@push('js')
   @include('app.user.modal-create-edit')
   @include('app.user.modal-reset-password')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.js"></script>
    <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://unpkg.com/scrollbooster@2/dist/scrollbooster.min.js"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>

        $('.select2bs4').select2({
                theme: 'bootstrap4',
            })

        let datatable = $("#datatable").DataTable({
                serverSide: true,
                processing: true,
                searching: true,
                lengthChange: true,
                paging: true,
                scrollX: true,
                info: true,
                ordering: true,
                order: [
                    [4, 'desc']
                ],
                ajax: @json(route('user.index')),
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        width: '1%'
                    },
                    {
                        data: 'foto',
                        orderable: false,
                        searchable : false
                    },
                    {
                        data: 'username',
                        orderable: false,
                    },
                    
                    {
                        data: 'nip',
                        orderable: false,
                    },
                 
                    {
                        data: 'nama_lengkap',
                        orderable: true,
                    },
                    {
                        data: 'bidang',
                        nama : 'bidang.nama',
                        orderable: true,
                    },
                    {
                        data: 'kontak',
                        orderable: true,
                    },
                    
                    {
                        data: 'role',
                        orderable: true,
                    },
                    {
                        data: 'njab',
                        orderable: true,
                    },
                    {
                        data: 'status',
                        orderable: true,
                        searchable: false,
                    },
                    {
                        data: "action",
                        orderable: false,
                        searchable: false,
                    },
                ]
            })

            
            $('#btn_create_user').click(function (e) { 
               e.preventDefault()
               clearInput()
               $('#modal_create_edit_user').modal('show')
               $('.modal-title').text('Input user')
               $('#btn_action').text('Simpan')
            })

            $('#form_modal_create_edit').submit(function (e) { 
               e.preventDefault();
               const formData = new FormData(this);
            
               $.ajax({
                    type: 'POST',
                    url: @json(route('user.store')),
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
                            $('#modal_create_edit_user').modal('hide')
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showCancelButton: true,
                                allowEscapeKey: false,
                                showCancelButton: false,
                                allowOutsideClick: false,
                            }).then((result) => {
                                swal.hideLoading()
                                datatable.ajax.reload();
                            })
                            swal.hideLoading()
                        }
                    },
                    error: function(response) {
                        showError(response)
                    }
                })
            })

            $('#datatable').on('click', '.btn_edit', function(e) {
               clearInput()
                $('#modal_create_edit_user').modal('show')
                $('.modal-title').text('Ubah Data')
                $('.error').hide();
                let url = $(this).attr('data-url');
                $.get(url, function(response) {
                  $('#nip').val(response.data.nip)
                  $('#id').val(response.data.id)
                  $('#username').val(response.data.username)
                  $('#nama_lengkap').val(response.data.nama_lengkap)
                  $('#kontak').val(response.data.kontak)
                  $('#role').val(response.data.role).trigger("change");
                  $('#bidang_id').val(response.data.bidang.id).trigger("change");
                  $('#njab').val(response.data.njab);
                })
            })
            
            $('#datatable').on('click', '.btn_hapus', function(e) {
                let data = $(this).attr('data-hapus');
                Swal.fire({
                    title: 'Apakah anda yakin ingin menghapus data User?',
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
            })

            $('body').on('click', '.btn_reset_password', function(e) {
                e.preventDefault();
                $('#modal_reset_password').modal('show')
                let name = $(this).attr('data-name');
                let id = $(this).attr('data-id');
                $('#user_id').val(id)
            })

            
            $('body').on('click', '.btn_nonaktifkan', function(e) {
                e.preventDefault();
                let data = $(this).attr('data-user');
                let status = $(this).attr('data-status');

                Swal.fire({
                    title: 'Apakah anda yakin ingin '+status+' User ?',
                    text: data,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, NonAktifkan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).find('#form-nonaktifkan').submit();
                    }
                })
            })
             
        
    </script>
@endpush
