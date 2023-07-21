@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush
@section('header')
    <x-header title='Role'></x-header>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            @can('create role')
                <div class="card-header">
                    <h3 class="card-title">
                        <a href={{ route('role.create') }} class="btn btn-sm btn-primary" id="btn_add"><i class="fas fa-plus"></i> Add Role</a>
                    </h3>
                </div>
            @endcan
            <div class="card-body table-responsive">
                <table id="datatable" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Guard</th>
                            <th>Description</th>
                            <th class="text-center">Users</th>
                            <th class="text-center">Permission</th>
                            <th>CreatedAt</th>
                            @canany(['update role', 'delete role'])
                                <th>Action</th>
                            @endcanany
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@include('admin.role.modal-create')

@endsection
@section('js')
    <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            let datatable = $("#datatable").DataTable({
                serverSide: true,
                processing: true,
                paginate:false,
                aaSorting: [],
                order: [
                    [1, 'asc']
                ],
                scrollX: true,
                bAutoWidth: false,
                fixedColumns: true,
                ajax: route('role.index'),
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'guard_name',
                        searchable: false,
                    },
                    {
                        data: 'desc',
                        searchable: false,
                    },
                    {
                        data: 'user',
                        className: 'dt-body-center',
                    },
                    {
                        data: 'permissions',
                        className: 'dt-body-center',
                    },
                    {
                        data: 'created_at',
                        searchable: false,
                    },
                    {
                        data: "action",
                        orderable: false,
                        searchable: false,
                        width: '10%',
                    },
                ]
            })


            $('#btn_add').click(function(e) {
                e.preventDefault()
                clearInput()
                $('#modal_create_edit').modal('show')
            })

            
            $("#form_create_edit").submit(function(e) {
                e.preventDefault()
                const formData = new FormData(this)
                $.ajax({
                    type: 'POST',
                    url: route('role.store'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        showLoading()
                    },
                    success: (response) => {
                        if (response) {
                            $('#modal_create_edit').modal('hide')
                            datatable.ajax.reload()
                            alertSuccess()
                        }
                    },
                    error: function(response) {
                        showError(response)
                    }
                })
            })


            $('#datatable').on('click', '.btn_delete', function(e) {
                e.preventDefault()
                Swal.fire({
                    title: 'Are you sure, you want to delete this data Role ?',
                    text: $(this).attr('data-action'),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6 ',
                    confirmButtonText: 'Yes, Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                _method: 'DELETE'
                            },
                            url: $(this).attr('data-url'),
                            beforeSend: function() {
                                showLoading()
                            },
                            success: (response) => {
                                datatable.ajax.reload()
                                alertSuccess(response.message)
                            },
                            error: function(response) {
                                showError(response)
                            }
                        })
                    }
                })
            })

        })
        
       
    </script>
@endsection
