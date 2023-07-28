@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush
@section('header')
    <x-header title="Permission Group"></x-header>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            @can('create permission')
                <div class="card-header">
                    <div class="btn-group">
                        <a href="#" class="btn btn-sm btn-primary" id="btn_add_group">
                            <i class="fas fa-plus"></i> Add Group Permission</a>
                    </div>
                </div>
            @endcan
            <div class="card-body table-responsive">
                <table id="datatable" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Group</th>
                            <th>Permission</th>
                            <th>Desc</th>
                            <th>CreatedAt</th>
                            @canany(['update permission', 'delete permission'])
                                <th>Action</th>
                            @endcanany
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
    @include('admin.permissions-group.modal-create-edit')
@endsection
@push('js')
    <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2-min.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {

            let datatable = $("#datatable").DataTable({
                serverSide: true,
                paginate: false,
                processing: true,
                scrollX: true,
                aaSorting: [],
                order: [
                    [1, 'asc']
                ],
                bAutoWidth: false,
                fixedColumns: true,
                ajax: route('permission-group.index'),
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'permissions',
                        searchable: false,
                    },
                    {
                        data: 'desc',
                        searchable: false,
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



            $('#btn_add_group').click(function(e) {
                e.preventDefault()
                _clearInput()
                $('#modal_edit_create_group').modal('show')
            })

            $("#form_create_group").submit(function(e) {
                e.preventDefault()
                const formData = new FormData(this)
                $.ajax({
                    type: 'POST',
                    url: route('permission-group.store'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        _showLoading()
                    },
                    success: (response) => {
                        if (response) {
                            $('#modal_edit_create_group').modal('hide')
                            datatable.ajax.reload()
                            alertSuccess()
                        }
                    },
                    error: function(response) {
                        _showError(response)
                    }
                })
            })

            $('#datatable').on('click', '.btn_edit', function(e) {
                e.preventDefault()
                $('#modal_edit_permission').modal('show')
            })


            $('#datatable').on('click', '.btn_delete', function(e) {
                e.preventDefault()
                Swal.fire({
                    title: 'Are you sure, you want to delete this Group Permission ?',
                    text: $(this).attr('data-action'),
                    icon: 'warning',
                    input: 'checkbox',
                    inputPlaceholder: 'Move all permissions to ungroup ?',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6 ',
                    confirmButtonText: 'Yes, Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (result.value) {
                           ungroup = true;
                        } else {
                           ungroup = false;
                        }
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                 ungroup : ungroup,
                                _method: 'DELETE'
                            },
                            url: $(this).attr('data-url'),
                            beforeSend: function() {
                                _showLoading()
                            },
                            success: (response) => {

                                datatable.ajax.reload()
                                alertSuccess(response.message)
                            },
                            error: function(response) {
                                _showError(response)
                            }
                        })
                    }
                })
            })


        })
    </script>
@endpush
