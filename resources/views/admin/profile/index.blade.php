@extends('admin.layouts.master')
@push('css')
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
@endpush
@section('content')
@section('header')
    <x-header title="Profile"></x-header>
@endsection
<div class="col-12">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
     
                        <img class="profile-user-img img-fluid img-circle" src="{{ $user->field('foto')->getFile() }}"
                            alt="User profile picture">
                    </div>
                    <h6 class="profile-username text-center">{{ $user->nama_lengkap }}</h6>
                    <h6 class=" text-center">{{ $user->username }}</h6>
                    <div class="form-group row">
                        <div class="text-center col-sm-12">
                            <button class="btn_upload_foto btn btn-secondary btn-sm"> <i class="fas fa-upload"></i>
                                Change Photo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#tab_profile"
                                data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link " href="#tab_password" data-toggle="tab">Password</a>
                        </li>
                        {{-- <li class="nav-item"><a class="nav-link " href="#settings"
                                      data-toggle="tab">Activity</a></li> --}}
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="tab_profile">
                            <form method="POST" action="{{ route('user.update', auth()->user()->id) }}"
                                class="form-horizontal">
                                @csrf
                                @method('PUT')

                                <x-input id='username' value='{{ $user->username }}' name='username' placeholder=''
                                    label='Username' required='false' disabled />
                                <x-input id='role' value='{{ $user->getRoleName() }}' name='role' placeholder=''
                                    label='Role' required='false' disabled />
                                <x-input id='nama_lengkap' value='{{ $user->nama_lengkap }}' name='nama_lengkap'
                                    placeholder='Nama Lengkap' label='Nama' required='true' />

                                <x-input id='kontak' value='{{ $user->kontak }}' name='kontak' placeholder='Kontak'
                                    label='Contact' required='true' />

                                <x-input id='email' value='{{ $user->email }}' name='email' placeholder='Email'
                                    label='Email' required='true' />

                                <x-select2 required="true" id="jenis_kelamin" label="Jenis Kelamin" placeholder="Jenis Kelamin"
                                    name="jenis_kelamin">
                                    <option value='L'>Pria</option>
                                    <option value='P'>Wanita</option>
                                </x-select2>

                                <x-textarea id="alamat" label="Alamat" name="alamat" hint="Alamat" required="false" spellcheck="false">
                                 {{ $user->alamat }}
                                </x-textarea>

                                <div class="modal-footer ">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class=" tab-pane" id="tab_password">
                            <div class="modal-body">
                                <form name="ubah-password" action="{{ route('password.ubah') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Password Lama <span style="color: red"> *</span> </label>
                                        <input required name="password" type="password" class="form-control"
                                            id="" placeholder="Password Lama">
                                    </div>
                                    <div class="form-group">
                                        <label>Password Baru <span style="color: red"> *</span> </label>
                                        <input id="password_baru" required name="password_baru" type="password"
                                            class="form-control" id="" placeholder="Password Baru">
                                    </div>
                                    <div class="form-group">
                                        <label>Password Konfirmasi <span style="color: red"> *</span> </label>
                                        <input id="password_konfirmasi" required name="password_konfirmasi"
                                            type="password" class="form-control" id=""
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
<div class="modal fade" id="modal_upload_foto">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Upload Foto Profil</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('user.change.photo') }}" enctype="multipart/form-data">
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
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('plugins/filepond/filepond.js') }}"></script>
<script src="{{ asset('plugins/filepond/filepond-plugin-file-metadata.js') }}"></script>
<script src="{{ asset('plugins/filepond/filepond-plugin-file-encode.js') }}"></script>
<script src="{{ asset('plugins/filepond/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{ asset('plugins/filepond/filepond-plugin-file-validate-size.js') }} "></script>
<script src="{{ asset('plugins/filepond/filepond-plugin-image-preview.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4',
    })
    $('#jenis_kelamin').val(@json($user->jenis_kelamin)).trigger("change");

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
</script>
@endpush
