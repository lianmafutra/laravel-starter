<script>
    // show modal upload file
    $('.btn_upload_file_task').click(function(e) {
        e.preventDefault()
        if ($(".filepond")) {
            let filePond = FilePond.find(document.querySelector('.filepond'));
            if (filePond != null) {
                filePond.removeFiles();
            }
        }
        $('#modal_upload_file_task').modal('show')
        $('#modal_upload_file_task .modal-title').text('Upload File')
        $('#modal_upload_file_task #kanban_file_id').val($(this).attr('data-id'))
    })

    // hapus file datatable
    $('#datatable_file_task').on('click', '.btn_hapus_file_task', function(e) {
        e.preventDefault()
        Swal.fire({
            title: 'Hapus File Task',
            text: "Apakah Anda Yakin Ingin Menghapus File Task ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6 ',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _method: 'DELETE'
                    },
                    url: $(this).attr('data-id'),
                    beforeSend: function() {
                        showLoading()
                    },
                    success: (response) => {
                        renderViewTask()
                        Swal.fire(
                            'Deleted!',
                            'Berhasil Hapus File',
                            'success'
                        )
                        swal.hideLoading()
                        $('#datatable_file_task').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        showError(response)
                    }
                })
            }
        })
    })

    //show datatable file upload task
    function getDatatableFileTask() {
        let kanban_id = $('#modal_detail_task .kanban_id').val()

        let url = '{{ route('kanban.show', ':id') }}';
        url = url.replace(':id', kanban_id);
        $.get(url, function(response) {

            let url3 = '{{ route('file-task.show', ':id') }}';
            url3 = url3.replace(':id', $('#modal_detail_task .file_task').val());
            $("#datatable_file_task").DataTable({
                serverSide: true,
                destroy: true,
                processing: true,
                searching: false,
                lengthChange: false,
                paging: false,
                info: false,
                ordering: false,
                bAutoWidth: false,
                fixedColumns: true,
                ajax: url3,
                columns: [{
                        data: 'name_origin',
                        width: '40%',
                    },
                    {
                        data: 'user.nama_lengkap',
                        width: '25%',
                    },
                    {
                        data: 'created_at',
                        width: '20%',
                    },
                    {
                        data: 'action',
                        width: '15%',
                        orderable: false,
                        searchable: false,
                    },
                ]
            })
            // if (datatable_file_task != null) {
            //     datatable_file_task.clear();
            //     datatable_file_task.destroy();
            // }
            setTimeout(() => {
               $('#datatable_file_task').css('visibility', 'visible')
            }, "500");
           
        })

    }

    //  submit store file upload
    $('#form_upload_file_task').submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: @json(route('file-task.store')),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {
                showLoading()
            },
            success: (response) => {
                if (response) {
                    let filePond = FilePond.find(document.querySelector('#file_task'));
                    if (filePond != null) {
                        filePond.removeFiles();
                    }
                    $('#modal_upload_file_task').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showCancelButton: true,
                        allowEscapeKey: false,
                        showCancelButton: false,
                        allowOutsideClick: false,
                    }).then((result) => {
                        swal.hideLoading()
                        let url = '{{ route('kanban.show', ':id') }}';
                        url = url.replace(':id', $('#modal_detail_task .kanban_id').val());
                        $.get(url, function(response) {
                            console.log(response)
                            $('#modal_detail_task .file_task').val(response.data
                                .file_task)
                            getDatatableFileTask()
                            $('#datatable_file_task').DataTable().ajax.reload();
                        })
                    })
                    swal.hideLoading()
                }
            },
            error: function(response) {
                showError(response)
            }
        })
    })
</script>
