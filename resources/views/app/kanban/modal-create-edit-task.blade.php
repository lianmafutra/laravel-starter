<div class="modal fade" id="modal_create_edit_task">
    <div class="modal-dialog modal-md modal-dialog-bottom">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Modal Title</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="form_create_edit_task" id="form_create_edit_task" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="card-footer card-comments">

                    </div>
                    <div class="form-group">
                        <input hidden name='kanban_task_id' id='kanban_task_id' value="" />
                        <x-input id='judul' label='Judul Kegiatan' required='true' />
                        <input hidden name="kanban_group_id" class='kanban_group_id' value="" />
                    </div>
                    <div class="form-group">
                        <label>Detail Kegiatan</label>
                        <textarea  id="detail" name="detail" class="form-control input" rows="3" placeholder="Detail Kegiatan"></textarea>
                    </div>
                     <div class="row">
                     <div class="col">  
                        <x-datepicker id='tgl_deadline' label='Estimasi Deadline'
                           required='false'/>
                     </div>
                   
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn_submit_task btn btn-primary">Submit Task</button>
                </div>
            </form>
        </div>
    </div>
</div>