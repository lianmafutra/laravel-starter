@if (in_array($view, ['surat_tugas']))

    @if ($data->surat_tugas_r->surat_tugas_no)
        @if ($data->surat_tugas_r->jenis_pengawasan == 'assurance')
            <a target="_blank" href="{{ route('pemeriksaan.edit', $data->id) }}" class="" href="">No : {{ $data->surat_tugas_r->surat_tugas_no }}</a><br>
           
        @elseif ($data->surat_tugas_r->jenis_pengawasan == 'consulting')
            <a target="_blank" href="{{ route('pembinaan.edit', $data->id) }}" class="" href="">No : {{ $data->surat_tugas_r->surat_tugas_no }}</a><br>
          
        @endif
    @else
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <a href="#" class=""> Input Pengawasan <i class="fas fa-edit"></i> </a>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('pemeriksaan.create.surat_masuk', $data->id) }}">Pemeriksaan
                        (Assurance)</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('pembinaan.create.surat_masuk', $data->id) }}">Pembinaan
                        (Consulting)</a>
                </div>
            </div>
        </div>
    @endif


    {{-- <center><a class="" href="">PEG.00.XX/XX/XX/XX</a><br> <a
                        href="{{ route('pemeriksaan.create.surat_masuk', $data->id) }}"
                        class="mt-2 btn-info button btn"> Input Pengawasan <i class="fas fa-edit"></i> </a></center> --}}
@endisset



@if (in_array($view, ['file_surat_masuk']))
    <a target="_blank" href="{{ $data->file_surat_masuk_r->getFullPath() }}" class="btn_file btn btn-default"><i
            class="far fa-file-alt"></i> File Surat</a>
@endisset
