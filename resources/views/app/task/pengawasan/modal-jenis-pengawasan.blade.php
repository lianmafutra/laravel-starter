<div class="modal fade" id="{{ $id }}">
   <div class="modal-dialog modal-md">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title">Jenis Pengawasan</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <section class="content">
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-12">
                               <div class="form-group">
                                   <select id="jenis_pengawasan" name="" required type=""
                                       class="select2 select2-status-pengajuan form-control select2bs4" style="width: 100%;">
                                       <option value="pemeriksaan">Pemeriksaan</option>
                                       <option value="pembinaan">Pembinaan</option>
                                   </select>
                               </div>
                           </div>
                       </div>
                   </div>
               </section>
           </div>
           <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
               <button id="btn_lanjut" type="button" class="btn btn-primary">Lanjut</button>
           </div>
       </div>
   </div>
</div>
