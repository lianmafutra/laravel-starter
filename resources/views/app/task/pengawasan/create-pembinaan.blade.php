@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('plugins/flatpicker/flatpickr.min.css') }}">
@endpush
@section('header')
    <x-header title="Input Task Consulting (Pembinaan)"></x-header>
@endsection
@section('content')
    <div class="col-lg-6">
        <form id="form_pembinaan" enctype="multipart/form-data">
            @csrf
            @if ($surat_masuk)
                <input hidden id='surat_masuk_id' name="surat_masuk_id" value="{{ $surat_masuk->id }}" />
                <div class="card">
                    <div class="card-header" style="background: cornflowerblue">
                        <span style="color: white; font-weight: 700">Data Surat Masuk</span>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <th>No Surat</th>
                                    <td class="pl-3 pr-3">:</td>
                                    <th>{{ $surat_masuk->no_surat }}</th>
                                </tr>
                                <tr>
                                    <th>Uraian</th>
                                    <td class="pl-3 pr-3">:</td>
                                    <th>{{ $surat_masuk->uraian }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <input hidden value="consulting" name="jenis_pengawasan">
            @endif
            @if ($surat_masuk == null)
                <div style="display: none" class="card">
                    <div class="card-header" style="background: cornflowerblue">
                        <span style="color: white; font-weight: 700">Jenis Pengawasan</span>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <select id="jenis_pengawasan" name="jenis_pengawasan" required type=""
                                class="select2 select2-status-pengajuan form-control select2bs4" style="width: 100%;">
                                <option value="assurance">Assurance (Pemeriksaan)</option>
                                <option  value="consulting">Consulting (pembinaan)</option>
                            </select>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header" style="background: cornflowerblue">
                    <span style="color: white; font-weight: 700">Input Data Pembinaan</span>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <x-select2 id="consulting_jenis_id" label="Jenis Consulting" required="true"
                                placeholder="Pilih Jenis Penugasan">
                                <option  value="">-- Pilih Jenis Consulting --</option>
                                @foreach ($consulting_jenis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </x-select2>
                            <x-select2 id="pemohon_opd" label="Pilih OPD Pemohon" required="true"
                                placeholder="Pilih OPD">
                                <option  value="">-- Pilih OPD Pemohon --</option>
                                @foreach ($opd as $item)
                                    <option value="{{ $item->id }}">{{ $item->nunker }}</option>
                                @endforeach
                            </x-select2>
                            <x-input id='pemohon_nama' label='Nama Pemohon' required=true />
                            <x-input id='pemohon_perihal' label='Uraian Pemohon' required=true />
                            <x-datepicker id='pemohon_tgl' label='Tanggal Permohonan' required=true />
                            <x-input id='nodis_no' label='Nomor Nota Dinas' required=true />
                            <x-datepicker id='nodis_tgl' label='Tanggal Nota Dinas' required=true />
                            <x-textarea id="nodis_uraian" label="Uraian Nota Dinas" hint="" required="true">
                            </x-textarea>
                            <x-filepond label='File Nodis' required='true' info='( Format File PDF , Maks 5 MB)'>
                                <input required type="file" class="filepond" name="file_nodis" id="file_nodis"
                                    data-max-file-size="5MB" accept='application/pdf' />
                            </x-filepond>
                            <x-filepond data-allow-reorder="true" label='File PK (Program Kerja)' required='true'
                                info='( Format File PDF , Maks 5 MB)'>
                                <input id="file_pk" type="file" name="file_pk[]" multiple data-max-file-size="5 MB"
                                    required class="filepond" accept='application/pdf'>
                            </x-filepond>

                            <x-filepond data-allow-reorder="true" label='File Tindak Lanjut/Dokumentasi' required='true'
                            info='( Format File PDF , Maks 5 MB)'>
                            <input id="file_tindak_lanjut" type="file" name="file_tindak_lanjut[]" multiple data-max-file-size="5 MB"
                                required class="filepond" accept='application/pdf'>
                        </x-filepond>


                            <x-select2 id="kanban_group_id" label="Kanban Group" required="true"
                                placeholder="Pilih Kanban Group">
                                <option  value="">-- Pilih Kanban Group --</option>
                                @foreach ($kanban_group as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </x-select2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="button btn_submit float-right button btn btn-primary">Simpan</button>
            </div>

        </form>
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
        let file = FilePond.create(document.querySelector('#file_nodis'))
        let file2 = FilePond.create(document.querySelector('#file_surat_tugas'))
        let file_pk = FilePond.create(document.querySelector('#file_pk'))
        let file_tindak_lanjut = FilePond.create(document.querySelector('#file_tindak_lanjut'))

        file_tindak_lanjut.setOptions({
            storeAsFile: true
        });
        file.setOptions({
            storeAsFile: true
        });
        file2.setOptions({
            storeAsFile: true
        });
        file_pk.setOptions({
            storeAsFile: true
        });
        $('.select2bs4').select2({
            theme: 'bootstrap4',
        })
        const tanggal = flatpickr(".tanggal", {
            allowInput: true,
            dateFormat: "d-m-Y",
            locale: "id",
        })
        $("#form_pembinaan").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: @json(route('pembinaan.store')),
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
                        // this.reset()
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showCancelButton: true,
                            allowEscapeKey: false,
                            showCancelButton: false,
                            allowOutsideClick: false,
                        }).then((result) => {
                            swal.hideLoading()
                            window.location.replace(@json(route('pembinaan.index')))
                        })
                        swal.hideLoading()
                    }
                },
                error: function(response) {
                    showError(response)
                }
            });
        });
        $('#jenis_pengawasan').change(function() {
            let val = $(this).val()
            if (val == 'assurance') {
                window.location.replace(
                    @json(route('pemeriksaan.create'))
                )
            } else if (val == 'consulting') {
                window.location.replace(
                    @json(route('pembinaan.create'))
                )
            }
        })
    </script>
@endpush
