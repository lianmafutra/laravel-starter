@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('plugins/flatpicker/flatpickr.min.css') }}">
    <style>
      table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
    </style>
@endpush
@section('header')
    <x-header title="Upload PKA (Surat Tugas 10290)"></x-header>
@endsection
@section('content')
    <div class="col-lg-6">
        
        <div class="card">
           
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                     <table style="width:100%" class="mb-4" >
                        <tr>
                            <th>Jenis Assurance</th>
                            <td>:</td>
                            <td>Audit</td>
                        </tr>
                        <tr>
                            <th>Jenis Audit</th>
                            <td>:</td>
                            <td>Audit Kinerja</td>
                        </tr>
                        <tr>
                            <th>Nomor Surat Tugas</th>
                            <td>:</td>
                            <td> PEG.00.XX/XX/XX/XX</td>
                        </tr>
                        <tr>
                            <th>Penanggung Jawab</th>
                            <td>:</td>
                            <td>Yunita Indrawati, AP, MP</td>
                        </tr>
                        <tr>
                            <th>Ketua Tim</th>
                            <td>:</td>
                            <td>Siska Octora, SH, MHxxx</td>
                        </tr>
                        <tr>
                            <th>Anggota Tim</th>
                            <td>:</td>
                            <td> Sri Ulinaxxx</td>
                        </tr>
                        <tr>
                            <th>Anggota Tim</th>
                            <td>:</td>
                            <td>Ardhy Septa Pratamaxxx</td>
                        </tr>
                        <tr>
                            <th>Anggota Tim</th>
                            <td>:</td>
                            <td>Nurhasanahxxx</td>
                        </tr>
                        <tr>
                            <th>Anggota Tim</th>
                            <td>:</td>
                            <td> Yudi Kurniawanxxx</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai Penugasan</th>
                            <td>:</td>
                            <td> 02 Maret 2023</td>
                        </tr>
                        <tr>
                            <th>Tanggal Akhir Penugasan</th>
                            <td>:</td>
                            <td> 06 Maret 2023</td>
                        </tr>
                        <tr>
                            <th>Lama Waktu Penugasan</th>
                            <td>:</td>
                            <td>5 (Lima) hari</td>
                        </tr>
                    </table>
                        <x-filepond label='File PKA' required='true' info='( Format File PDF , Maks 5 MB)'>
                            <input id="file_pka" type="file" data-max-file-size="5 MB" required class="filepond"
                                accept='pdf/*'>
                        </x-filepond>
                        
                        
                    </div>
                </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="float-right btn_submit btn btn-primary">Simpan</button>
               <a href="{{ route('pengawasan.index') }}" class="mr-1 float-right btn_submit btn btn-success">Kembali</a>

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
    <script src="{{ asset('plugins/flatpicker/flatpickr.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpicker/id.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize)

       
        let file2 = FilePond.create(document.querySelector('#file_pka'))

       
       
    </script>
@endpush
