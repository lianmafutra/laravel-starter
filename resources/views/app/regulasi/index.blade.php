@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
@endpush
<style>
   .fullwidth{
      white-space: nowrap;
   }
</style>
@section('header')
    <x-header title="Regulasi"></x-header>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('regulasi.create') }}" class="btn btn-sm btn-primary" id="btn_jenis_pengawasan"><i
                        class="fas fa-plus"></i> Input Data</a>
            </div>
            <div class="card-body">
                <x-datatable id="datatable" :th="[
                  'No', 'File','Jenis','Penginput','Bidang','Tgl Input' ,
                  '#Aksi']"></x-datatable>
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
            order: [
                [5, 'desc']
            ],
            bAutoWidth: false,
            fixedColumns: true,
            ajax: @json(route('regulasi.index')),
            columns: [
               {
                    data: "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                 
                },
                {
                    data: 'file_regulasi',
                    width: '30%',

                    orderable: false,
                   
                },
                {
                    data: 'jenis',
                    className: 'fullwidth',
                    orderable: true,
                    searchable: false,
                },
                {
                    data: 'penginput',
                    className: 'fullwidth',
                    defaultContent : '-',
                    className: 'dt-body-center',
                    orderable: true,
                },
                {
                    data: 'bidang',
                    orderable: true,
                },
                {
                    data: 'created_at',
                    orderable: true,
                    searchable: false
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
