<script>
    // show modal create komentar
    $('.btn_create_komentar').click(function(e) {
        e.preventDefault()
        $('#modal_create_edit_komentar .komentar').text("")
        $('.komentar_id').val("")
        $('.komentar').val("")
        $('.kanban_id').val($(this).attr('data-id'))
        $('#modal_create_edit_komentar').modal('show')
        $('#modal_create_edit_komentar .modal-title').text("Kirim Komentar")
    })

    //  Hapus Komentar
    $('.komentar_list').on('click', '.btn_hapus_komentar', function(e) {

        e.preventDefault()
        let url5 = ('{{ route('kanban-komentar.destroy', ':id') }}')
        url5 = url5.replace(':id', $(this).attr('data-id'))

        Swal.fire({
            title: 'Hapus Komentar',
            text: "Apakah Anda Yakin Ingin Menghapus Komentar Ini ?",
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
                    url: url5,
                    beforeSend: function() {
                        showLoading()
                    },
                    success: (response) => {
                        renderViewTask()
                        Swal.fire(
                            'Deleted!',
                            'Berhasil Hapus Komentar',
                            'success'
                        )
                        swal.hideLoading()
                        renderViewKomentar($('.btn_hapus_task').attr('data-id'))
                    },
                    error: function(response) {
                        showError(response)
                    }
                })
            }
        })
    })

    //  edit Komentar
    $('.komentar_list').on('click', '.btn_edit_komentar', function(e) {
        e.preventDefault()
        $('#modal_create_edit_komentar').modal('show')
        $('.komentar').val("")
        $('#modal_create_edit_komentar .modal-title').text("Kirim Komentar")
        $('.komentar').val($(this).attr('data-komentar'))
        $('.komentar_id').val($(this).attr('data-id'))
        $('.kanban_id').val($(this).attr('data-kanban_id'))
    })

    //  store komentar
    $('#form_kanban_komentar').submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: @json(route('kanban-komentar.store')),
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
                    this.reset()
                    $('#modal_create_edit_komentar').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showCancelButton: true,
                        allowEscapeKey: false,
                        showCancelButton: false,
                        allowOutsideClick: false,
                    }).then((result) => {
                        swal.hideLoading()
                    })
                    renderViewTask()
                    renderViewKomentar($('.btn_hapus_task').attr('data-id'))
                    swal.hideLoading()
                }
            },
            error: function(response) {
                showError(response)
            }
        })
    })

   //  render html view komentar item list
    function renderViewKomentar(kanban_id) {
        $(".komentar_list").empty()
        let url = '{{ route('kanban-komentar.show', ':id') }}'
        url = url.replace(':id', kanban_id)
        $.get(url, function(response) {
            if (response.html) {
                $(".komentar_empty").css('display', 'none');
                $(".komentar_list").append(response.html)
            } else {
                $(".komentar_empty").css('display', 'block');
            }
        })
    }
</script>
