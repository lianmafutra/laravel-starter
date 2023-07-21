@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('plugins/flatpicker/flatpickr.min.css') }}"> --}}
@endpush
@section('header')
    <x-header title="Input Regulasi"></x-header>
@endsection
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <form id="form_regulasi" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                           
                            <x-input 
                            id='judul' label='Judul Regulasi' 
                            placeholder="Perwal    No Tahun     Tentang" 
                            required=true
                            info='Contoh Format : Perwal No. 4 Tahun 2022 Tentang Perjalanan Dinas Di Lingkungan Pemerintahan Kota Jambi'
                            />
                          
                            {{-- <x-datepicker id='tgl_surat' label='Tanggal Surat' required=true /> --}}
                            {{-- <x-textarea id="uraian" label="Uraian" hint="" required="true"></x-textarea> --}}
                            <x-select2 id="jenis" label="Jenis Regulasi" required="true"
                                placeholder="Pilih Jenis Regulasi">
                                <option selected value="">-- Pilih Jenis Regulasi --</option>
                               {{-- {{  dd($jenis) }} --}}
                                @foreach ($jenis as $item)
                                    <option value={{ $item }}>{{ $item }}</option>
                                @endforeach
                            </x-select2>
                            <x-filepond label='File Regulasi' required='true' info='( Format File PDF , Maks 5 MB)'>
                                <input required type="file" class="filepond" name="file_regulasi"
                                    id="file_regulasi" data-max-file-size="5MB" accept='application/pdf' />
                            </x-filepond>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="button btn_submit float-right button btn btn-primary">Simpan</button>
                </div>
            </form>
            {{-- <div class="card-footer">
                  <button type="submit" class="float-right btn_submit btn btn-primary">Simpan</button>
               </div> --}}
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
    {{-- <script src="{{ asset('plugins/flatpicker/flatpickr.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpicker/id.min.js') }}"></script> --}}
    <script>
        FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize)
        let file_regulasi = FilePond.create(document.querySelector('#file_regulasi'))
        
        $('.select2bs4').select2({
            theme: 'bootstrap4',
        })

        file_regulasi.setOptions({
            storeAsFile: true,
        });
 
  
        $("#form_regulasi").submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah anda yakin ingin Menginput Data ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Lanjutkan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = new FormData(this);
                    $.ajax({
                        type: 'POST',
                        url: @json(route('regulasi.store')),
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
                                Swal.fire({
                                    icon: 'success',
                                    title: response.message,
                                    showCancelButton: true,
                                    allowEscapeKey: false,
                                    showCancelButton: false,
                                    allowOutsideClick: false,
                                }).then((result) => {
                                    swal.hideLoading()
                                    window.location.replace(
                                        @json(route('regulasi.index')))
                                })
                                swal.hideLoading()
                            }
                        },
                        error: function(response) {
                            showError(response)
                        }
                    });
                }
            })

        });
    </script>
@endpush
