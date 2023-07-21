@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('plugins/flatpicker/flatpickr.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond-button.css') }}" rel="stylesheet">
@endpush
@section('header')
    <x-header title="Edit Data Surat Masuk"></x-header>
@endsection
@section('content')
    <div class="col-lg-6">
        <div class="card">

            <form id="form_surat_masuk" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <input hidden id='surat_masuk_id' name="surat_masuk_id" value="" />
                            <x-input id='no_surat' label='Nomor Surat' required=true />
                            <x-datepicker id='tgl_surat' label='Tanggal Surat' required=true />
                            <x-textarea id="uraian" label="Uraian" hint="" required="true"></x-textarea>
                            <x-select2 id="surat_tujuan_id" label="Tujuan Surat" required="true"
                                placeholder="Pilih Sifat Penugasan">
                                <option selected value="">-- Pilih Tujuan Surat --</option>
                                @foreach ($surat_tujuan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </x-select2>
                            <x-filepond label='File Surat Masuk' required='true' info='( Format File PDF , Maks 5 MB)'>
                                <input required type="file" class="filepond" name="file_surat_masuk"
                                    id="file_surat_masuk" data-max-file-size="5MB" />
                            </x-filepond>
                        </div>
                    </div>
                </div>
                @can('surat_masuk_update', $suratMasuk)
                    @if ($suratMasuk->created_by == auth()->user()->id)
                        <div class="card-footer">
                            <button type="submit" class="button btn_submit float-right button btn btn-primary">Simpan</button>
                        </div>
                    @endif
                @endcan
            </form>
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
    <script src="{{ asset('plugins/filepond/filepond-button.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpicker/flatpickr.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpicker/id.min.js') }}"></script>
    <script>
        FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginImagePreview,
            FilePondPluginButton,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize)
        let file_surat_masuk = FilePond.create(document.querySelector('#file_surat_masuk'))

        $('.select2bs4').select2({
            theme: 'bootstrap4',
        })

        file_surat_masuk.setOptions({
            storeAsFile: true,
        });


        if (@json($suratMasuk->file_surat_masuk) != null) {
            file_surat_masuk.setOptions({
                storeAsFile: true,
                allowDownloadByUrl: true,
                files: [{
                    source: @json($suratMasuk->file_surat_masuk_r != null ? $suratMasuk->file_surat_masuk_r->file_url : ''),
                }]
            });
        }


        const tgl_surat = flatpickr(".tanggal", {
            allowInput: true,
            dateFormat: "d-m-Y",
            locale: "id",
        })

        // set value 
        $('#surat_masuk_id').val(@json($suratMasuk->id))
        $('#no_surat').val(@json($suratMasuk->no_surat))

        tgl_surat.setDate(@json($suratMasuk->tgl_surat))

        $('#uraian').val(@json($suratMasuk->uraian))
        $('#surat_tujuan_id').val(@json($suratMasuk->surat_tujuan_id)).trigger("change")

        let url = '{{ route('surat_masuk.update', ':id') }}';
        url = url.replace(':id', @json($suratMasuk->id))

        $("#form_surat_masuk").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('_method', 'PUT')
            $.ajax({
                type: 'POST',
                url: url,
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
                            window.location.reload()
                        })
                        swal.hideLoading()
                    }
                },
                error: function(response) {
                    showError(response)
                }
            });
        });
    </script>
@endpush
