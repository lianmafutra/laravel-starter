<div class="modal fade" id="modal_create_edit_komentar">
    <div class="modal-dialog modal-md modal-dialog-bottom">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Modal Title</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="form_kanban_komentar" id="form_kanban_komentar"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                  <div class="mt-4 form-group">
                     <label hidden>komentar_id</label>
                     <input hidden name="komentar_id" class="komentar_id" value="">
                     <label hidden>kanban_id</label>
                     <input hidden  name="kanban_id" class="kanban_id" value="">
                     <textarea required name="komentar" class="komentar form-control" rows="3" placeholder="Tulis Komentar"></textarea>
                 </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn_submit_task btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
