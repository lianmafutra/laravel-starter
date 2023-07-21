<div class="modal fade" id="modal_edit_kanban">
   <div class="modal-dialog modal-md">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title">Input Data</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <form autocomplete="off" id="form_modal_create_edit" method="POST">
               @csrf

               
               @method('POST')
               <div class="modal-body">
                   <section class="content">
                       <div class="container-fluid">
                           <div class="row">
                               <div class="col-md-12">
                                   <input hidden id="id" name="id" value="" />
                                   <x-input name='nama' id='nama' placeholder='Judul Kanban'  label='Judul' required=true />
                                   <x-input  name='desc' id='desc' placeholder='Deskripsi Kanban'  label='Deskripsi Singkat' required=true  />
                               </div>
                           </div>
                       </div>
                   </section>
               </div>
               <div class="modal-footer ">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                   <button id="btn_action" type="submit" class="float-right btn btn-primary">Simpan</button>

               </div>
           </form>
       </div>
   </div>
</div>
