<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #008dff;
    }
</style>
<div class="modal fade" id="modal_tambah_anggota">
    <div class="modal-dialog modal-md modal-dialog-bottom">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Anggota</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form name="form_tambah_anggota" id="form_tambah_anggota" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <input hidden value="" name="kanban_group_id" class="kanban_group_id">
                    <x-select2_multi id="user_id" label='Pilih User' required="true" placeholder='Pilih User'>
                    </x-select2_multi>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn_submit_anggota btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
