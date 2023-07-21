<div class="modal fade" id="modal_upload_file_task">
   <div class="modal-dialog modal-md modal-dialog-bottom">
       <div class="modal-content">
           <div class="modal-header">
               <h6 class="modal-title">Modal Title</h6>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <form name="form_upload_file_task" id="form_upload_file_task" method="POST" enctype="multipart/form-data">
               @csrf
               @method('POST')
               <div class="modal-body">
                   <div class="form-group">
                       <input hidden  name="kanban_file_id" id='kanban_file_id' required='true' value="{{ $id }}" />
                   </div>
                   <input required type="file" class="filepond" name="file_task[]" id="file_task" multiple
                       data-max-file-size="300MB" data-max-files="5" />
               </div>
               <div class="modal-footer">
                   <button type="submit" class="btn btn-primary">Upload File</button>
               </div>
           </form>
       </div>
   </div>
</div>
