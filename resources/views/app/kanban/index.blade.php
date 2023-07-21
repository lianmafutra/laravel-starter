@extends('admin.layouts.master-origin')
@push('css')
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('plugins/flatpicker/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kanban.css') }}">
@endpush
@section('content')
    <div style="padding: 0; background-image: url({{ asset('img/bg1.jpg') }})" class="content-wrapper kanban" >
        <section style="background-color:#ffffff3d;" class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 style="padding-left: 10px" id="kanban_board_nama"></h1>
                    </div>
                    <div class="col-sm-6 d-none d-sm-block">
                        <ol class="breadcrumb float-sm-right">
                            <div class=" d-flex flex-row-reverse">
                                <div class="p-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input placeholder="Filter Tanggal" type="text"
                                            class="tanggal flatpickr flatpickr-input  form-control float-right"
                                            id="tgl_filter_kanban">
                                        <a id="btn_filter_tanggal_refresh" href=""><span style="padding: 8px"
                                                class="input-group-text"> <i class="fas fa-sync-alt"> </i> </span></a>
                                    </div>
                                </div>
                                <div class="pt-2 pr-2">
                                    <a href="#" id="btn_anggota" style="line-height: 2.0"
                                        class="btn btn-sm btn-primary"><i class="fas fa-users"></i> <span
                                            class="jumlah_anggota"></span>
                                    </a>
                                </div>
                                <div class="pt-2 pr-2">
                                    <a href="#" id="btn_info" style="line-height: 2.0"
                                        class="btn btn-sm btn-primary"><i class="fas fa-info-circle"></i> Info & Settings
                                    </a>
                                </div>
                                <input hidden  class="home_kanban_group_id" value="">
                                <div class="pt-2 pr-2">
                                    <a href="#" id="btn_create_task" style="line-height: 2.0"
                                        class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Create Task </a>
                                </div>
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content pb-3 pt-10">
            <div id="loading_board" style="display: none !important; color: #037e48; font-weight: bold;"
                class="col-12 text-center">
                Updating Board
                <img style="margin-left: 3px" height="22px" width="auto" src="{{ asset('img/loading_mini_green.gif') }}">
            </div>
            <div class="container-fluid h-100 body_kanban">
                <div class="card card-row card-secondary">
                    <div class="card-header backlog-color">
                        <div class="d-flex">
                            <div class="mr-auto p-2">
                                <h3 class="card-title">
                                    To Do
                                </h3>
                            </div>
                            {{-- <div><button type="button" id="btn_input_task" class="btn btn-md">
                                    <i class="fas fa-plus " style="color: #dddddd;"></i></button></div> --}}
                        </div>
                    </div>
                    <div id="kanban_1" class="card-body card-kanban">
                        {{-- data --}}
                    </div>
                    <div style="height: 50px; margin-top: 8px" class="footer">

                    </div>
                </div>
                <div class="card card-row card-primary">
                    <div class="card-header backlog-color">
                        <div class="d-flex">
                            <div class="mr-auto p-2">
                                <h3 class="card-title">
                                    In Progress
                                </h3>
                            </div>
                            {{-- <div><button type="button" class=" btn  btn-md">
                                    <i class="fas fa-plus " style="color: #dddddd;"></i></button></div> --}}
                        </div>
                    </div>
                    <div id="kanban_2" class="card-body card-kanban">
                    </div>
                    <div style="height: 50px; margin-top: 10px" class="footer">

                    </div>
                </div>
                <div class="card card-row card-default">
                    <div class="card-header bg-info">
                        <div class="d-flex">
                            <div class="mr-auto p-2">
                                <h3 class="card-title">
                                    Checking
                                </h3>
                            </div>
                            {{-- <div><button type="button" class=" btn  btn-md">
                                    <i class="fas fa-plus " style="color: #dddddd;"></i></button></div> --}}
                        </div>
                    </div>
                    <div id="kanban_3" class=" card-body card-kanban">
                    </div>
                    <div style="height: 50px; margin-top: 10px" class="footer">

                    </div>
                </div>
                <div class="card card-row card-success">
                    <div class="card-header ">
                        <div class="d-flex">
                            <div class="mr-auto p-2">
                                <h3 class="card-title">
                                    Done
                                </h3>
                            </div>
                            {{-- <div><button type="button" class=" btn  btn-md">
                                    <i class="fas fa-plus " style="color: #dddddd;"></i></button></div> --}}
                        </div>
                    </div>
                    <div id="kanban_4" class="card-body card-kanban">
                    </div>
                    <div style="height: 50px; margin-top: 10px" class="footer">

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('js')
    <script src="{{ asset('plugins/filepond/filepond.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-file-metadata.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-file-encode.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-file-validate-type.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-file-validate-size.js') }} "></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-image-preview.js') }}"></script>
    <script src="{{ asset('plugins/flatpicker/flatpickr.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpicker/id.min.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/dragula/dragula.min.js') }}"></script>

    @include('app.kanban.modal-create-edit-task')
    @include('app.kanban.modal-anggota-create')
    @include('app.kanban.modal-info')
    @include('app.kanban_group.modal-create-edit')
    @include('app.kanban.modal-anggota')
    @include('app.kanban.modal-detail-task')
    @include('app.kanban.modal-upload-file-task')
    @include('app.kanban.modal-create-edit-komentar')

    {{-- scripts --}}
    @include('app.kanban.scripts.kanban-state-js')
    @include('app.kanban.scripts.kanban-filter-tanggal-js')
    @include('app.kanban.scripts.kanban-task-js')
    @include('app.kanban.scripts.kanban-info-js')
    @include('app.kanban.scripts.kanban-detail-js')
    @include('app.kanban.scripts.kanban-anggota-js')
    @include('app.kanban.scripts.kanban-komentar-js')
    @include('app.kanban.scripts.kanban-file-task-js')
    <script>
        // top action task
        $('#btn_info').click(function(e) {
            e.preventDefault();
            $('#modal_info').modal('show')
        })

       

        $('#btn_anggota').click(function(e) {
            e.preventDefault();
            $('#modal_anggota').modal('show')
        })

        //   Item list task
        //   kanban detail task show by id task
     

        $('#btn_edit_kanban').click(function(e) {
            e.preventDefault()
            $('#modal_create_edit').modal('show')
            $('#modal_create_edit .modal-title').text('Edit Data')
        })

        //   hanlde nested modal state
        $(document).on('hidden.bs.modal', function(event) {
            if ($('.modal:visible').length) {
                $('body').addClass('modal-open');
            }
        });

      
    </script>
@endpush
