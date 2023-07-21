<div class="modal fade" id="modal_filter">
    <div class="modal-dialog modal-md modal-dialog-bottom">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Filter Data Jadwal Aktifitas</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="modal_filter" id="modal_filter" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">

                    <x-select2 required="false" id='bidang' name='bidang' label='Bidang Kerja'
                        placeholder="Pilih Bidang">
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                        @endforeach
                    </x-select2>
                  
                    {{-- <x-select2 required="false" id='verifikasi_status' name='verifikasi_status' label='Status Task'
                        placeholder="Pilih Status" /> --}}
                    <x-datepicker id='filter_tanggal' label='Rentang Tanggal' required='false' />
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn_submit_filter btn-primary">Terapkan</a>
                </div>
            </form>
        </div>
    </div>
</div>
