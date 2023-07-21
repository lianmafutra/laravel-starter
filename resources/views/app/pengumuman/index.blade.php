@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
@endpush
@section('header')
    <x-header x-title="Pengumuman"></x-header>
   
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pengumuman.create') }}" class="btn btn-sm btn-primary" id="btn_jenis_pengawasan"><i
                        class="fas fa-plus"></i> Input Data</a>
            </div>
            <div class="card-body">
                <x-datatable id="datatable" :th="['No','Judul', 'Pesan','Created At', '#Aksi']"></x-datatable>
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
            [1, 'Info Penting',
                "<p style='width:90%'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>",
                '<p>  15-03-2023  </p>',
                '<a class="button btn btn-primary"><i class="fas fa-pencil-alt"></i></a> <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> '
            ],
        ]

        $('#datatable').DataTable({
            data: dataSet,
        })
    </script>
@endpush
