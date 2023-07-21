<div class="modal fade" id="modal_create_edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Mobil Baru</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_tambah">
                @csrf
                <div class="modal-body">
                    <input hidden id="id" name="id" value="" />
                    <x-select2 id="kepala_bidang" label="Kepala Bidang" required="true" placeholder="Pilih ">
                        <option selected value="">-- Pilih --</option>
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                        @endforeach
                    </x-select2>
                    <x-input id='nama' name='nama' placeholder='Nama Bidang' label='Nama Bidang'
                        required=true />
                    <x-input id='desc' name='desc' placeholder='Deskripsi' label='Deskripsi Singkat'
                        required=true />
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn_submit btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
