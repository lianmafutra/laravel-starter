@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
@endpush
<style>
    .fullwidth {
        white-space: nowrap;
    }
</style>
@section('header')
    <x-header title="Surat Masuk"></x-header>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            @can('surat_masuk_create')
                <div class="card-header">
                    <a href="{{ route('surat_masuk.create') }}" class="btn btn-sm btn-primary" id="btn_jenis_pengawasan"><i
                            class="fas fa-plus"></i> Input Data</a>
                </div>
            @endcan

            <div class="card-body">
                <x-datatable id="datatable" :th="[
                    'No',
                    'No Surat',
                    'Tgl Surat',
                    'Surat Tugas',
                    'Uraian',
                    'Tujuan',
                    'File Surat',
                    'Tgl Input',
                    'Penginput',
                    'Bidang',
                    '#Aksi',
                ]"></x-datatable>
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
        let datatable = $("#datatable").DataTable({
            serverSide: true,
            processing: true,
            ordering: true,
            order: [
                [7, 'desc']
            ],
            bAutoWidth: false,
            fixedColumns: true,
            ajax: @json(route('surat_masuk.index')),
            columns: [{
                    data: "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                    width: '1%'
                },
                {
                    data: 'no_surat',
                    width: '10%',
                    orderable: false,

                },
                {
                    data: 'tgl_surat',
                    className: 'fullwidth',
                    orderable: true,
                    searchable: false,
                },
                {
                    data: 'surat_tugas',
                    className: 'fullwidth',
                    defaultContent: '-',
                    className: 'dt-body-center',
                    orderable: true,
                },
                {
                    data: 'uraian',
                    orderable: true,
                },

                {
                    data: 'surat_tujuan.nama',
                    name: 'surat_tujuan.nama',
                    orderable: true,
                },

                {
                    data: 'file_surat_masuk',
                    className: 'fullwidth',
                    searchable: false,
                },

                {
                    data: 'created_at',
                    orderable: true,
                    searchable: false
                },

                {
                    data: 'penginput',
                    name: 'user.nama_lengkap',
                    orderable: true,
                      searchable: true,
                    @role('staff')
                        visible: false
                    @endrole
                },
                {
                    data: 'bidang',
                    name: '',
                    orderable: true,
                    @role('staff')
                        visible: false
                    @endrole
                },

                {
                    data: "action",
                    orderable: false,
                    searchable: false,
                },
            ]
        })
        $('.btn_file').click(function(e) {
            e.preventDefault()
            $('#modal_preview_file').modal('show')
            $('#icon').trigger('click')
        });

        $('#datatable').on('click', '.btn_hapus', function(e) {
            let data = $(this).attr('data-hapus');
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapus data Surat ?',
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
    </script>
@endpush
