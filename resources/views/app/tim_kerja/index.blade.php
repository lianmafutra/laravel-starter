@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
@endpush
@section('header')
    <x-header title="Tim Kerja"></x-header>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-sm btn-primary" id="btn_jenis_pengawasan"><i
                        class="fas fa-plus"></i> Input Data</a>
            </div>
            <div class="card-body">
                <x-datatable id="datatable" :th="['No', 'Tim', 'Anggota', '#Aksi']"></x-datatable>
            </div>
        </div>
    </div>

    <x-modal_preview_file id='preview_file' title='Preview File' size='lg'><input hidden name='preview_file' />
        <embed src="{{ asset('file/file-example.pdf#page=0&navpanes=1&scrollbar=1') }}" frameborder="0" width="100%"
            height="700px">

        <x-slot:footer>
            <button type='submit' class='btn_submit btn btn-primary'>Tutup</button>
        </x-slot:footer>
    </x-modal_preview_file>
@endsection
@push('js')
    <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        var dataSet = [
            [1, 'Irban I',
                '<span class="badge badge-secondary">Siska Octora</span> <span class="badge badge-secondary"> Hj. Tin Suhartini</span> ',
                '<a href="{{ route('time_kerja.edit', 1) }}" class="button btn btn-primary"><i class="fas fa-pencil-alt"></i></a> <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> '
            ],
            [2, 'Irban II',
                '<span class="badge badge-secondary">Siska Octora</span> <span class="badge badge-secondary"> Hj. Tin Suhartini</span> ',
                '<a href="{{ route('time_kerja.edit', 1) }}" class="button btn btn-primary"><i class="fas fa-pencil-alt"></i></a> <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> '
            ],
            [3, 'Irban IV',
                '<span class="badge badge-secondary">Siska Octora</span> <span class="badge badge-secondary"> Hj. Tin Suhartini</span> ',
                '<a href="{{ route('time_kerja.edit', 1) }}" class="button btn btn-primary"><i class="fas fa-pencil-alt"></i></a> <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> '
            ],

        ]

        $('#datatable').DataTable({
            data: dataSet,
        })
    </script>
@endpush
