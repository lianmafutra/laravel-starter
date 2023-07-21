<div class="modal fade" id="modal_detail_task">
    <div class="modal-dialog modal-lg modal-dialog-bottom">
        <div class="p-4 modal-content">
            <div class="modal-header">
                <h3 class="modal_detail_task_title modal-title"><i class="fas fa-file-invoice"></i> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="section-detail">
                        <style>
                            .section-detail {
                                margin-bottom: 20px;
                            }
                            .section-body {
                                margin-left: 30px;
                                margin-bottom: 30px;
                            }
                        </style>
                        <h5><i style="color: blue" class="mr-3 fas fa-user-cog"></i>Dibuat Oleh : <span
                                class="creator"></span></h5>
                        <h5><i style="color: orange" class=" mr-3 far fa-calendar-plus"></i><span
                                class="modal_detail_task_tanggal_input"></span> </h5>
                        <h5 class="" style="display: block">
                            {{-- <i class="fas fa-stopwatch mr-3" style="color: #36e0ec;"></i> <span
                                class="tanggal_estimasi">Tanggal Estimasi : </span> --}}
                        </h5>
                        <h5 class="verifikasi_info" style="display: none"><i style="color: green;"
                                class="mr-3 fas fa-check-circle"></i>Diverifikasi Oleh : <span
                                class="verifikasi_info_text"></span></h5>
                        <div class="section-body"></div>
                        <h5><i class="mr-3 fas fa-align-left"></i> Detail Kegiatan</h5>
                        <div class="section-body">
                            <div class="form-group">
                                <textarea style="min-height: 50px; max-height: 300px" disabled spellcheck="false" name="detail"
                                    class="modal_detail_task form-control" rows="3">
                           </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="section-detail">
                        <div class="d-flex">
                            <div class="p-2">
                                <h5><i class="mr-3 fas fa-folder-open"></i> File Lampiran</h5>
                            </div>
                            <div class="ml-auto p-2">
                                <a data-id="" style="font-size: 11px" href="" target="_blank"
                                    class="btn_upload_file_task btn btn-secondary"><i class="fas fa-file-upload"></i>
                                    Upload File</a>
                            </div>
                        </div>
                        <input hidden class="file_task" value="" name="file_task">
                        <input hidden class="kanban_id" value="" name="kanban_id">
                        <x-datatable id="datatable_file_task" :th="['File', 'Upload By', 'Date Upload', 'Action']"></x-datatable>
                    </div>
                    <div class="section-detail">
                        <h5><i class="mr-3 fas fa-comments"></i> Komentar</h5>
                        <div class="section-body">
                            <div class="card-footer card-comments ">
                                <div class="komentar_list">
                                </div>
                                <h6 class="komentar_empty" style="color: gray; display: none">Belum Ada Komentar</h6>
                            </div>
                            {{-- <x-filepond data-allow-reorder="true" label='Upload File' required='true'
                                info='(Ukuran Maks 5 MB)'>
                                <input id="file_komen" type="file" multiple data-max-file-size="5 MB" required
                                    class="filepond" accept='application/pdf'>
                            </x-filepond> --}}
                            <a href="" data-id="" class="mt-4 btn_create_komentar btn btn-primary"><i
                                    class="fas fa-paper-plane"></i> Kirim Komentar</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button data-id="" type="submit" class="btn_hapus_task btn btn-danger"><i
                     class="fas fa-trash"></i> Hapus Task</button>
                  {{-- <a style="display: block" href="#" data-id="" type="submit"
                  class="btn_arsipkan btn btn-warning"><i class="fas fa-archive"></i> Arsipkan</a> --}}
                    {{-- <a style="display: block" href="#" data-id="" type="submit"
                        class="btn_input_data_pengawasan btn btn-secondary"><i class="fas fa-plus"></i> Input Data Pengawasan</a> --}}

                        <a style="display: none" href="#" data-id="" type="submit"
                        class="btn_detail_data_surat btn btn-secondary"><i class="fas fa-database"></i> Detail Data Surat</a>

                    <a style="display: none" href="#" data-id="" type="submit"
                        class="btn_verifikasi btn btn-success"><i class="fas fa-check-circle"></i> Verifikasi Task</a>
               

                            <a style="display: none" href="#" data-id="" type="submit"
                            class="btn_detail_data_pengawasan btn btn-secondary"><i class="fas fa-database"></i> Detail Data Pengawasan</a>
    
                </div>
            </form>
        </div>
    </div>
</div>
