<div class="modal fade" id="modal_create_edit">
   <div class="modal-dialog modal-md">
       <div class="modal-content">
           <div class="modal-header">
               <h6 class="modal-title">Tambah Kanban</h6>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <form id="form_modal_create_edit">
               @csrf
               <div class="modal-body">
                   <input hidden id="id" name="id" value="" />
                   <x-input id='nama'  name='nama' placeholder='Nama Kanban'  label='Nama Kanban' required=true />
                   <x-input id='desc' name='desc' placeholder='Deskripsi'  label='Deskripsi Singkat' required=true />
               </div>
               <div class="modal-footer">
                   <button type="submit" class="btn_submit btn btn-primary">Simpan</button>
               </div>
           </form>
       </div>
   </div>
</div>
