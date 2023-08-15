@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    @include('partials.css-settings')
@endpush
@section('header')
    <x-header title="Permission List"></x-header>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div style="box-shadow: none !important; margin-bottom:0 !important" class="card collapsed-card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm col-auto col-md-auto">
                            <a href="{{ route('sample-crud.create') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i> Create</a>
                        </div>

                        <div style="margin :auto" class="card-tools col float-right mt-3">
                            <button type="button" class="float-right btn btn-tool" data-card-widget="collapse"
                                title="Collapse">Filter
                                <i class="fas fa-filter"></i>
                            </button>
                            @include('partials.datatable-js-settings')
                        </div>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <div class="row">
                        <div class="col-6">
                            <x-select2 id="category_id" label="Filter by Category" placeholder="Select Category">
                                <option value="fiction">Fiction</option>
                                <option value="biography">Biography</option>
                            </x-select2>
                        </div>
                        <div class="col-6">
                            <x-select2 id="category_id2" label="Filter by Category" placeholder="Select Category">
                                <option value="fiction">Fiction</option>
                                <option value="biography">Biography</option>
                            </x-select2>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="float-right btn btn-sm btn-primary" id="btn_apply_filter">Apply</a>
                    <a href="#" class="mr-2 float-right btn btn-sm btn-warning" id="btn_apply_filter">Reset</a>
                </div>
            </div>
            <div class="border-top"></div>
            <div class="card-body table-responsive">
                <table id="datatable" style="width:100%" class="display table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hash Id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Categories</th>
                            <th>Price</th>
                            <th>CreatedAt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2-min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/datatableFunction.js') }}"></script>
    @include('partials.script-settings')

    <script>
        $(function() {
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            })

            let datatable = $("#datatable");
            let tableOptions = {
                serverSide: true,
                processing: true,
                lengthChange: true,
                paginate: true,
                aaSorting: [],
                order: [
                    [6, 'desc']
                ],
                scrollX: true,
                bAutoWidth: false,
                fixedColumns: true,
                ajax: route('sample-crud.index'),
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'id',
                        orderable: false,
                        searchable: true,
                    },
                    {
                        data: 'title',
                        orderable: false,
                        searchable: true,
                    },
                    {
                        data: 'category_id',
                        name: 'category_id',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'category_multi_id',
                        name: 'category_multi_id',
                        orderable: false,

                        searchable: true,
                    },
                    {
                        data: 'price_format',
                        name: 'price',
                        searchable: true,
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
                ],
            }

            _datatableButton(datatable, tableOptions, @json(Cache::store('styles')->get('action_button')));
            _datatableFixed(datatable, tableOptions,
                @json(Cache::store('styles')->get('left_fixed_action', 0)),
                @json(Cache::store('styles')->get('right_fixed_action', 0)));

            // Object.assign(tableOptions, {});
            // $('#datatable').DataTable().clear().destroy();

            // datatable.columns([2]).every(function() {
            //     var column = this;
            //     var select = $('<br><input placeholder="Search..." class=""></input>')
            //         .appendTo($(column.header()))
            //         .on('change', function() {
            //             var val = $.fn.dataTable.util.escapeRegex($(this).val());
            //             if (column.search() !== val) {
            //                 column.search(val).draw();
            //             }
            //         });
            // });

            $("#form_edit_group").submit(function(e) {
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
                            $('#modal_create_edit').modal('hide')
                            datatable.ajax.reload()
                            _alertSuccess(response.message)
                        }
                    },
                    error: function(response) {
                        _showError(response)
                    }
                })
            })

            $("#form_create_edit_permission").submit(function(e) {
                e.preventDefault()
                const formData = new FormData(this)
                $.ajax({
                    type: 'POST',
                    url: route('permission.store'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        _showLoading()
                    },
                    success: (response) => {
                        if (response) {
                            $('#modal_create_edit').modal('hide')
                            datatable.ajax.reload()
                            _alertSuccess(response.message)
                        }
                    },
                    error: function(response) {
                        _showError(response)
                    }
                })
            })

            $("#form_create_multi_permission").submit(function(e) {
                e.preventDefault()
                const formData = new FormData(this)
                $.ajax({
                    type: 'POST',
                    url: route('permission.store'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        _showLoading()
                    },
                    success: (response) => {
                        if (response) {
                            $('#modal_create_multi').modal('hide')
                            datatable.ajax.reload()
                            _alertSuccess(response.message)
                        }
                    },
                    error: function(response) {
                        _showError(response)
                    }
                })
            })

            $('#btn_add_permission').click(function(e) {
                e.preventDefault()
                _clearInput()
                $('#modal_create_edit').modal('show')
                $('#modal_create_edit .modal-title').text('Create New Permission')
            })

            $('#btn_add_multi_permission').click(function(e) {
                e.preventDefault()
                _clearInput()
                $('#modal_create_multi').modal('show')
                $('#modal_create_edit .modal-title').text('Create New Permission')
            })

            $('#datatable').on('click', '.btn_edit', function(e) {
                e.preventDefault()
                _clearInput()
                $('#modal_create_edit').modal('show')
                $('#modal_create_edit .modal-title').text('Edit Permission')
                $('.error').hide();
                $.get($(this).attr('data-url'), function(response) {
                    $("input[name='name']").val(response.data.name)
                    $("input[name='desc']").val(response.data.desc)
                    $("input[name='permission_id']").val(response.data.id)
                    //   $("input[name='permission_group_id']").val(response.data.permission_group_id)
                    $("input[name='guard_name']").val(response.data.guard_name).change()
                    $("#permission_group_id").val(response.data.permission_group_id).change()
                })
            })

            $('#datatable').on('click', '.btn_delete', function(e) {
                e.preventDefault()
                Swal.fire({
                    title: 'Are you sure, you want to delete this data Permission ?',
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
                                _showLoading()
                            },
                            success: (response) => {
                                _alertSuccess(response.message)
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
