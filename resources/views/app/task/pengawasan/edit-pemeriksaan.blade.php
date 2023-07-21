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
    <x-header title="Edit Data Assurance (Pemeriksaan)"></x-header>
@endsection
@section('content')
    <div class="col-lg-6">
        <form id="form_pemeriksaan" enctype="multipart/form-data">
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
            @endif
            @if ($surat_masuk == null)
                {{-- <div class="card">
                    <div class="card-header" style="background: cornflowerblue">
                        <span style="color: white; font-weight: 700">Jenis Pengawasan</span>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <select id="jenis_pengawasan" name="" required type=""
                                class="select2 select2-status-pengajuan form-control select2bs4" style="width: 100%;">
                                <option value="pemeriksaan">Assurance</option>
                                <option value="pembinaan">Consulting</option>
                            </select>
                        </div>
                    </div>
                </div> --}}
            @endif
            <div class="card">
                <div class="card-header" style="background: cornflowerblue">
                    <span style="color: white; font-weight: 700">Input Data Pemeriksaan</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <x-select2 id="assurance_jenis_id" label="Jenis Assurance" required="true"
                                placeholder="Pilih Jenis Penugasan">
                                <option selected value="">-- Pilih Jenis Assurance --</option>
                                @foreach ($assurance_jenis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </x-select2>
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
                            <x-select2 id="kanban_group_id" label="Kanban Group" required="true"
                                placeholder="Pilih Kanban Group">
                                <option selected value="">-- Pilih Kanban Group --</option>
                                @foreach ($kanban_group as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </x-select2>
                        </div>
                    </div>
                </div>
            </div>
            @if ($pengawasan->verifikasi_status_ins == 'sudah')
                <div class="card">
                    <div class="card-header" style="background: cornflowerblue">
                        <span style="color: white; font-weight: 700">Data Surat Tugas</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <x-input id='surat_tugas_no' label='Nomor Surat Tugas' required=false />
                                <x-datepicker id='surat_tugas_tgl' label='Tanggal Surat Tugas' required=false />
                                <x-textarea id="surat_tugas_uraian" label="Uraian Surat Tugas" hint=""
                                    required="false">
                                </x-textarea>
                                <x-filepond label='File Surat Tugas' required="false" info='( Format File PDF , Maks 5 MB)'>
                                    <input type="file" class="filepond" name="file_surat_tugas" id="file_surat_tugas"
                                        data-max-file-size="5MB" accept='application/pdf' />
                                </x-filepond>
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <x-datepicker id='tgl_penugasan_mulai' label='Tanggal Penugasan' required=false />
                                    </div>
                                    <div class="col-1 ">
                                        <p class="align-middle pt-3" style=" margin: auto; text-align: center;">S/D</p>
                                    </div>
                                    <div class="col-5">
                                        <x-datepicker id='tgl_penugasan_selesai' label='' required=false />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" style="background: cornflowerblue">
                        <span style="color: white; font-weight: 700">Pilih
                            Tim Pemeriksaan</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <x-select2 id="penanggung_jawab" label="Penanggung Jawab" required="false"
                                    placeholder="Pilih">
                                    <option selected value="">-- Pilih Penanggung Jawab --</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                    @endforeach
                                </x-select2>
                                <x-select2 id="pengandali_teknis" label="Pengendali Teknis" required="false"
                                    placeholder="Pilih ">
                                    <option selected value="">-- Pilih --</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                    @endforeach
                                </x-select2>
                                <x-select2 id="ketua_tim" label="Ketua Tim" required="false" placeholder="Pilih">
                                    <option selected value="">-- Pilih --</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                    @endforeach
                                </x-select2>
                                <x-select2 id="anggota_1" label="Anggota Tim 1" required="false" placeholder="Pilih ">
                                    <option selected value="">-- Pilih --</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                    @endforeach
                                </x-select2>
                                <x-select2 id="anggota_2" label="Anggota Tim 2" required="false" placeholder="Pilih ">
                                    <option selected value="">-- Pilih --</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                    @endforeach
                                </x-select2>
                                <x-select2 id="anggota_3" label="Anggota Tim 3" required="false" placeholder="Pilih ">
                                    <option selected value="">-- Pilih --</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                    @endforeach
                                </x-select2>
                                <x-select2 id="anggota_4" label="Anggota Tim 4" required="false" placeholder="Pilih ">
                                    <option selected value="">-- Pilih --</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                    @endforeach
                                </x-select2>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card-footer">
                <button style="display: none" type="submit"
                    class="button btn_submit float-right button btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header" style="background: cornflowerblue">
                <span style="color: white; font-weight: 700">Status Verifikasi</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table>
                            <th style="color: blue">Verifikasi Inspektur</th>
                            <tr>
                                <th>Status</th>
                                <td class="pr-2 pl-2"> : </td>
                                <td>{{ $pengawasan->verifikasi_status_ins }}</td>
                            </tr>
                            <tr>
                                <th>Verifikator </th>
                                <td class="pr-2 pl-2"> : </td>
                                <td>{{ $pengawasan->verifikator_ins->nama_lengkap }}</td>
                                @if ($pengawasan->verifikator_ins->njab)
                                    ( {{ $pengawasan->verifikator_ins->njab }} )
                                @endif
                            </tr>
                            <tr>
                              <th>Tanggal </th>
                              <td class="pr-2 pl-2"> : </td>
                              <td>{{ \Carbon\Carbon::make($pengawasan->verifikasi_tgl_ins)?->format('d-m-Y H:m') ?? '' }}
                              </td>
                          </tr>
                            <tr>
                                <th>Catatan : </th>
                                <td class="pr-2 pl-2"> : </td>
                                <td>{{ $pengawasan->verifikasi_pesan_ins }}</td>
                            </tr>
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table>
                            <th style="color: blue; padding-right: 22px">Verifikasi Kabid</th>
                            <tr>
                                <th>Status</th>
                                <td class="pr-2 pl-2"> : </td>
                                <td>{{ $pengawasan->verifikasi_status_kabid }}</td>
                            </tr>
                            <tr>
                                <th>Verifikator </th>
                                <td class="pr-2 pl-2"> : </td>
                                <td>{{ $pengawasan->verifikator_kabid->nama_lengkap }}</td>
                                @if ($pengawasan->verifikator_kabid->njab)
                                    ( {{ $pengawasan->verifikator_kabid->njab }} )
                                @endif
                            </tr>
                            <tr>
                              <th>Tanggal </th>
                              <td class="pr-2 pl-2"> : </td>
                              <td>{{ \Carbon\Carbon::make($pengawasan->verifikasi_tgl_kabid)?->format('d-m-Y H:m') ?? '' }}
                              </td>
                          </tr>
                            <tr>
                                <th>Catatan : </th>
                                <td class="pr-2 pl-2"> : </td>
                                <td>{{ $pengawasan->verifikasi_pesan_kabid }}</td>
                            </tr>
                         
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dd($pengawasan->file_pk_r) }} --}}
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
    <script src="{{ asset('plugins/filepond/filepond-button.js') }}"></script>
    <script>
        $(document).ready(function() {
            FilePond.registerPlugin(
                FilePondPluginFileEncode,
                FilePondPluginImagePreview,
                FilePondPluginFileValidateType,
                FilePondPluginButton,
                FilePondPluginFileValidateSize)
            let file = FilePond.create(document.querySelector('#file_nodis'))
            let file2 = FilePond.create(document.querySelector('#file_surat_tugas'))
            let file_pk = FilePond.create(document.querySelector('#file_pk'))
            file.setOptions({
                storeAsFile: true
            });
            file2.setOptions({
                storeAsFile: true
            });
            file_pk.setOptions({
                storeAsFile: true
            });
            if (@json($pengawasan->file_nodis) != null) {
                file.setOptions({
                    storeAsFile: true,
                    allowDownloadByUrl: true,
                    files: [{
                        source: @json($pengawasan->file_nodis_r != null ? $pengawasan->file_nodis_r->file_url : ''),
                    }]
                });
            }
            if (@json($pengawasan->file_surat_tugas) != null) {
                file2.setOptions({
                    storeAsFile: true,
                    allowDownloadByUrl: true,
                    files: [{
                        source: @json($pengawasan->file_surat_tugas_r != null ? $pengawasan->file_surat_tugas_r->file_url : ''),
                    }]
                });
            }
            if (@json($pengawasan->file_pk_r) != null) {
                file_pk.setOptions({
                    storeAsFile: true,
                    instantUpload: false,
                    allowMultiple: true,
                    storeAsFile: true,
                    files: @json($pengawasan->file_pk_r->pluck('file_url')),
                    allowDownloadByUrl: true,
                })
            }
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            })
            const tgl_nota_dinas = flatpickr("#nodis_tgl", {
                allowInput: true,
                dateFormat: "d-m-Y",
                locale: "id",
            })
            @if ($pengawasan->verifikasi_status_ins == 'sudah')
                const tgl_surat_tugas = flatpickr("#surat_tugas_tgl", {
                    allowInput: true,
                    dateFormat: "d-m-Y",
                    locale: "id",
                })
                tgl_surat_tugas.setDate(@json($pengawasan->surat_tugas_tgl))
                const tgl_penugasan_mulai = flatpickr("#tgl_penugasan_mulai", {
                    allowInput: true,
                    dateFormat: "d-m-Y",
                    locale: "id",
                })
                const tgl_penugasan_selesai = flatpickr("#tgl_penugasan_selesai", {
                    allowInput: true,
                    dateFormat: "d-m-Y",
                    locale: "id",
                })
                tgl_penugasan_mulai.setDate(@json($pengawasan->tgl_penugasan_mulai))
                tgl_penugasan_selesai.setDate(@json($pengawasan->tgl_penugasan_selesai))
            @endif
            $("#form_pemeriksaan").submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                formData.append('_method', 'PUT')
                let url = '{{ route('pemeriksaan.update', ':id') }}';
                url = url.replace(':id', @json($pengawasan_id))
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
            $('#jenis_pengawasan').change(function() {
                let val = $(this).val()
                if (val == 'pemeriksaan') {
                    window.location.replace(
                        @json(route('pemeriksaan.create'))
                    )
                } else if (val == 'pembinaan') {
                    window.location.replace(
                        @json(route('pembinaan.create'))
                    )
                }
            })
            //   set value
            $('#assurance_jenis_id').val(@json($pengawasan->assurance_jenis_id)).trigger("change")
            $('#kanban_group_id').val(@json($pengawasan->kanban_group_id)).trigger("change")
            $('#nodis_no').val(@json($pengawasan->nodis_no))
            $('#nodis_uraian').val(@json($pengawasan->nodis_uraian))
            $('#surat_tugas_no').val(@json($pengawasan->surat_tugas_no))
            $('#surat_tugas_uraian').val(@json($pengawasan->surat_tugas_uraian))
            tgl_nota_dinas.setDate(@json($pengawasan->nodis_tgl))
            $('#penanggung_jawab').val(@json($pengawasan->tim_kerja->penanggung_jawab)).trigger("change")
            $('#pengandali_teknis').val(@json($pengawasan->tim_kerja->pengandali_teknis)).trigger("change")
            $('#ketua_tim').val(@json($pengawasan->tim_kerja->ketua_tim)).trigger("change")
            $('#anggota_1').val(@json($pengawasan->tim_kerja->anggota_1)).trigger("change")
            $('#anggota_2').val(@json($pengawasan->tim_kerja->anggota_2)).trigger("change")
            $('#anggota_3').val(@json($pengawasan->tim_kerja->anggota_3)).trigger("change")
            $('#anggota_4').val(@json($pengawasan->tim_kerja->anggota_4)).trigger("change")
            $(window).on('load', function() {
                setTimeout(() => {
                    $('.btn_submit').css('display', 'block');
                }, 1000);
            });
        });
    </script>
@endpush
