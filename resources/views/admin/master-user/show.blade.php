@extends('admin.layouts.master')
@push('css')
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush
@section('content')
    <style>
        .profile-user-img {
            object-fit: cover;
            border: 3px solid #adb5bd;
            margin: 0 auto;
            padding: 3px;
            width: 130px;
        }

        .img-fluid {
            max-width: 100%;
            height: 130px;
        }
    </style>
@section('content')
    <div class="col-12">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">Data User</h5>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-3">
                                    <div class="text-center">
                                        <img class="p-5  img-fluid " src="{{ $user->getUrlFoto() }}"
                                            alt="User profile picture">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#tab_profile"
                                                    data-toggle="tab">Profile</a></li>
                                            <li class="nav-item"><a class="nav-link " href="#tab_password"
                                                    data-toggle="tab">Password</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="tab_profile">
                                                <form method="POST" action=""
                                                    class="form-horizontal">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input name="nama_lengkap" disabled type="text"
                                                                class="form-control" id="nama"
                                                                value="{{ $user->nama_lengkap }}" placeholder="Nama">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail"
                                                            class="col-sm-2 col-form-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input disabled type="email" class="form-control"
                                                                id="username" placeholder="Username"
                                                                value="{{ $user->username }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">Role</label>
                                                        <div class="col-sm-10">
                                                            <input disabled type="text" class="form-control"
                                                                placeholder="Role" value="{{ $user->getRoleName() }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">Created
                                                            At</label>
                                                        <div class="col-sm-10">
                                                            <input disabled type="text" class="form-control"
                                                                placeholder="Role" value="@tanggal($user->created_at)">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">Last
                                                            Login</label>
                                                        <div class="col-sm-10">
                                                            <input disabled type="text" class="form-control"
                                                                placeholder="Role" value="@tanggal($user->last_login_at)">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">Last Login
                                                            IP</label>
                                                        <div class="col-sm-10">
                                                            <input disabled type="text" class="form-control"
                                                                placeholder="IP" value="{{ $user->last_login_ip }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            {{-- <button type="submit" class="btn btn-primary">Update Profile</button> --}}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class=" tab-pane" id="tab_password">
                                                <div class="modal-body">
                                                    <form name="ubah-password" action="" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label>Password Lama <span style="color: red"> *</span>
                                                            </label>
                                                            <input required name="password" type="password"
                                                                class="form-control" id=""
                                                                placeholder="Password Lama">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password Baru <span style="color: red"> *</span>
                                                            </label>
                                                            <input id="password_baru" required name="password_baru"
                                                                type="password" class="form-control" id=""
                                                                placeholder="Password Baru">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password Konfirmasi <span style="color: red"> *</span>
                                                            </label>
                                                            <input id="password_konfirmasi" required
                                                                name="password_konfirmasi" type="password"
                                                                class="form-control" id=""
                                                                placeholder="Password Konfirmasi">
                                                        </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> --}}
                                                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($user->getRoleName() != 'superadmin')
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0 float-left">All Permission</h5>
                                    <a href="#" class="float-right btn btn-sm btn-primary" id="btn_add_permission">
                                        <i class="fas fa-plus"></i> Add Special Permission</a>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="datatable" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Permission</th>
                                                <th>Guard</th>
                                                <th>Type</th>
                                                <th>Desc</th>
                                                <th>CreatedAt</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="modal_upload_foto">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Upload Foto Profil</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group ">
                            <input required type="file" data-max-file-size="3 MB" class="filepond" accept="image/*"
                                name="foto">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    @include('admin.master-user.modal-create-direct-permission')
@endsection
@endsection
@push('js')
<script src="{{ URL::asset('plugins/filepond/filepond.js') }}"></script>
<script src="{{ URL::asset('plugins/filepond/filepond-plugin-file-metadata.js') }}"></script>
<script src="{{ URL::asset('plugins/filepond/filepond-plugin-file-encode.js') }}"></script>
<script src="{{ URL::asset('plugins/filepond/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{ URL::asset('plugins/filepond/filepond-plugin-file-validate-size.js') }} "></script>
<script src="{{ URL::asset('plugins/filepond/filepond-plugin-image-preview.js') }}"></script>
<script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4',
    })



    $(".btn_upload_foto").click(function() {
        $('#modal_upload_foto').modal('show')
    });
    FilePond.registerPlugin(
        FilePondPluginFileMetadata,
        FilePondPluginFileEncode,
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize);
    const inputElements = document.querySelectorAll('input.filepond');
    Array.from(inputElements).forEach(inputElement => {
        FilePond.create(inputElement, {
            storeAsFile: true,
            labelIdle: `Upload File Foto <span class="filepond--label-action">Browse</span>`,
            imageCropAspectRatio: '1:1',
            allowImagePreview: true,
            imagePreviewHeight: 300,
            imagePreviewWidth: 300,
        });
    });
    let datatable = $("#datatable").DataTable({
        serverSide: true,
        processing: true,
        scrollX: true,
        paginate: false,
        aaSorting: [],
        order: [
            [1, 'asc']
        ],
        bAutoWidth: false,
        fixedColumns: true,
        ajax: route('master-user.show', @json($user->id)),
        columns: [{
                data: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            {
                data: 'name',
                searchable: false,
            },
            {
                data: 'guard_name',
                searchable: false,
            },
            {
                data: 'type',
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

    $('#btn_add_permission').click(function(e) {
        e.preventDefault();
        $('#modal_create_direct_permission').modal('show');
    })

    $('#form_create_direct_permission').submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: @json(route('master-user.add.direct.permission')),
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
                    $('#modal_create_direct_permission').modal('hide')
                    datatable.ajax.reload()
                    alertSuccess(response.message)
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
                        user_id: @json($user->id),
                        permission_name: $(this).attr('data-action'),
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
</script>
@endpush
