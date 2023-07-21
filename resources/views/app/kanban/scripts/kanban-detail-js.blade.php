<script>
    $(document).on('click', '.btn_card_detail, .btn_card_komen', function() {
        $('.komentar_list').empty()
        $('#datatable_file_task').css('visibility', 'hidden')
        $('#modal_detail_task .btn_detail_data_pengawasan').css('display', 'none');
        $('#modal_detail_task .btn_detail_data_surat').css('display', 'none');

        let url = '{{ route('kanban.show', ':id') }}';
        url = url.replace(':id', $(this).attr('data-id'))

        $.get(url, function(response) {
            $('#modal_detail_task').modal('show')
            $('.modal_detail_task_title').text(response.data.judul)
            $('.modal_detail_task_tanggal_input').text('Tanggal Input : ' + response.data.created_at)
            $('.modal_detail_task').val(response.data.detail)
            $('.creator').html(response.data.user.nama_lengkap)
            $('.btn_hapus_task').attr('data-id', response.data.id)
            $('.btn_upload_file_task').attr('data-id', response.data.id)
            $('#modal_detail_task .kanban_id').val(response.data.id)
            $('#modal_detail_task .file_task').val(response.data.file_task)
            $('#modal_detail_task .btn_create_komentar').attr('data-id', response.data.id)
            $('#modal_create_edit_komentar .kanban_id').val(response.data.id)
            // $('#modal_detail_task .tanggal_estimasi').html('Tanggal Estimasi : ' + response.data
            //     .tgl_estimasi)


            //  pengawasan
            if (response.data.pengawasan_id) {
                $('#modal_detail_task .btn_detail_data_pengawasan').css('display', 'block');
                $('#modal_detail_task .btn_detail_data_pengawasan').attr('data-id', response.data
                    .pengawasan_id)
            }

            //  surat masuk
            if (response.data.surat_masuk_id) {
                $('#modal_detail_task .btn_detail_data_surat').css('display', 'block');
                $('#modal_detail_task .btn_detail_data_surat').attr('data-id', response.data
                    .surat_masuk_id)
            }

            if (typeof(response.data.pengawasan) !== "undefined" && response.data.pengawasan !== null) {
               let verifikator ="";
                if (response.data.pengawasan.verifikasi_status_ins) {
                    if (response.data.pengawasan.verifikasi_status_ins == "sudah") {
                        $('.btn_verifikasi').css('display', 'none')
                        $('.verifikasi_info').css('display', 'block')
                        verifikator += response.data.pengawasan.verifikator_nama_ins + "( Inspektur ) ,"
                    } else {
                        $('.btn_verifikasi').css('display', 'none')
                    
                        $('#modal_detail_task .verifikasi_info_text').text("")
                    }
                }

                if (response.data.pengawasan.verifikasi_status_kabid) {
                    if (response.data.pengawasan.verifikasi_status_kabid == "sudah") {
                        $('.btn_verifikasi').css('display', 'none')
                        $('.verifikasi_info').css('display', 'block')
                       verifikator += response.data.pengawasan.verifikator_nama_kabid 
                    } else {
                        $('.btn_verifikasi').css('display', 'none')
                     
                        $('#modal_detail_task .verifikasi_info_text').text("")
                    }
                }


               //  $('.verifikasi_info').css('display', 'none')
                $('#modal_detail_task .verifikasi_info_text').html(verifikator)
            }



            renderViewKomentar(response.data.id)
            getDatatableFileTask()
        })
    })

    $('.btn_detail_data_pengawasan').click(function(e) {
        e.preventDefault()
        let url = '{{ route('pengawasan.edit', ':id') }}';
        url = url.replace(':id', $(this).attr('data-id'))
        window.open(url, '_blank');
    })


    // hapus task detail
    $('.btn_arsipkan').click(function(e) {
        e.preventDefault()
        let url = ('{{ route('kanban.destroy', ':id') }}')
        url = url.replace(':id', $(this).attr('data-id'))
        Swal.fire({
            title: 'Hapus Task ?',
            text: "Apakah Anda Yakin Ingin Menghapus Task Ini ?",
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
                    url: url,
                    beforeSend: function() {
                        showLoading()
                    },
                    success: (response) => {
                        renderViewTask()
                        Swal.fire(
                            'Deleted!',
                            'Berhasil Hapus Task',
                            'success'
                        )
                        $('#modal_detail_task').modal('hide')
                        swal.hideLoading()
                    },
                    error: function(response) {
                        showError(response)
                    }
                })
            }
        })
    })

    $('.btn_detail_data_surat').click(function(e) {
        e.preventDefault()
        let url = '{{ route('surat_masuk.edit', ':id') }}';
        url = url.replace(':id', $(this).attr('data-id'))
        window.open(url, '_blank');
    })

    // hapus task detail
    $('.btn_hapus_task').click(function(e) {
        e.preventDefault()
        let url = ('{{ route('kanban.destroy', ':id') }}')
        url = url.replace(':id', $(this).attr('data-id'))
        Swal.fire({
            title: 'Hapus Task ?',
            text: "Apakah Anda Yakin Ingin Menghapus Task Ini ?",
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
                    url: url,
                    beforeSend: function() {
                        showLoading()
                    },
                    success: (response) => {
                        renderViewTask()
                        Swal.fire(
                            'Deleted!',
                            'Berhasil Hapus Task',
                            'success'
                        )
                        $('#modal_detail_task').modal('hide')
                        swal.hideLoading()
                    },
                    error: function(response) {
                        showError(response)
                    }
                })
            }
        })
    })

    $('.btn_verifikasi').click(function(e) {
        e.preventDefault()
        let url = ('{{ route('kanban.update_verifikasi') }}')
        Swal.fire({
            title: 'Verifikasi Task',
            text: "Apakah Anda Yakin Ingin Verifikasi Task Ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '',
            cancelButtonColor: '#3085d6 ',
            confirmButtonText: 'Ya, Vefikasi'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        kanban_id: $('.kanban_id').val()
                    },
                    url: url,
                    beforeSend: function() {
                        showLoading()
                    },
                    success: (response) => {
                        renderViewTask()
                        Swal.fire(
                            'Success',
                            'Berhasil Verifikasi Task',
                            'success'
                        )
                        $('#modal_detail_task').modal('hide')
                        swal.hideLoading()
                    },
                    error: function(response) {
                        showError(response)
                    }
                })
            }
        })
    })
</script>
