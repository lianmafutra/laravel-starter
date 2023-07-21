@php
    $data = [];
@endphp
@if (isset($kanban_1))
    @php
        $data = $kanban_1;
    @endphp
@endif
@if (isset($kanban_2))
    @php
        $data = $kanban_2;
    @endphp
@endif
@if (isset($kanban_3))
    @php
        $data = $kanban_3;
    @endphp
@endif
@if (isset($kanban_4))
    @php
        $data = $kanban_4;
    @endphp
@endif
<style>
    .card-title {
        float: left;
        font-size: 1.3rem;
        font-weight: 600;
        margin: 0;
    }
</style>
@foreach ($data->kanban as $item)
    <div id="{{ $item->kode }}" style="" class="item_kanban card card-info card-outline">
        <div class="card-header">
            <div class="d-flex flex-column justify-content-start">
                <div class="d-flex">
                    <div class="p-0">
                        <div class="p-1"> <span style="font-size: 11px" class="badge badge-primary">
                                #{{ $item->kode }} </span></div>
                    </div>
                    <div class="p-0">
                        @if ($item->surat_masuk)
                            @if ($item->surat_masuk->surat_tugas_r)
                                <div class="p-1"> <span style="font-size: 11px" class="badge badge-warning">
                                        Surat Masuk
                                        ({{ $item->surat_masuk->surat_tugas_r->jenis_pengawasan }})
                                    </span></div>
                            @else
                                @if ($item->pengawasan)
                                    <div class="p-1"> <span style="font-size: 11px" class="badge badge-warning">
                                            Pengawasan - ({{ $item->pengawasan->jenis_pengawasan }})
                                        </span></div>
                                @else
                                    <div class="p-1"> <span style="font-size: 11px" class="badge badge-warning">
                                            Surat Masuk ({{ $item->surat_masuk->surat_tujuan->nama }})
                                        </span></div>
                                @endif
                            @endif
                        @else
                            @if ($item->pengawasan)
                                <div class="p-1"> <span style="font-size: 11px" class="badge badge-warning">
                                        Pengawasan - ({{ $item->pengawasan->jenis_pengawasan }})
                                    </span></div>
                            @else
                                <div class="p-1"> <span style="font-size: 11px" class="badge badge-warning">
                                        Surat Masuk
                                    </span></div>
                            @endif
                        @endif
                    </div>
                    <div class="ml-auto p-2">
                        <a data-id="{{ $item->id }}" href="#" class="btn_edit_task btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                    </div>
                </div>
                <div class="p-1 card-title"> <span style="p-1"> {{ $item->judul }}</span></div>
            </div>
            <div class="card-tools">
                {{-- <a href="#" class="btn btn-tool btn-link">#3</a> --}}
            </div>
        </div>
        <div class="card-body">
        </div>
        <div class="card-footer">
            <button type="button" data-id="{{ $item->id }}"
                class="btn_card_footer btn_card_detail mr-1 float-right mt-2 btn btn-outline-secondary btn-md">
                <i class="fas fa-angle-right"></i> </button>
            <button type="button" data-id="{{ $item->id }}"
                class="btn_card_footer btn_card_komen mr-1 float-right mt-2  btn btn-outline-secondary btn-md">
                {{ $item->komentar->count() }} <i class="fas fa-comments" style="color: #8f8f8f;"></i> </button>
            @if ($item->verifikasi_status == 'sudah')
                <button data-toggle="tooltip" data-placement="top"
                    title="Diverifikasi oleh : {{ $item->user_verifikasi->getRoleName() }} ( {{ $item->user_verifikasi->nama_lengkap }} ), Tgl : {{ $item->verifikasi_tgl }} "
                    type="button" data-id="{{ $item->id }}"
                    class="btn_card_footer btn_verifikasi_card  mr-1 float-right mt-2 btn btn-outline-secondary btn-md">
                    <i style="color: green" class="fas fa-check-circle"></i> </button>
            @endif
        </div>
    </div>
@endforeach
