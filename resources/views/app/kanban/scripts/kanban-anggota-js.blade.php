<script>
        $('#datatable').on('click', '.btn_hapus_anggota', function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Hapus Anggota ?',
                text: "Perhatian, Apakah anda ingin menghapus anggota ini ?",
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
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted !',
                                text: response.message,
                                showCancelButton: true,
                                allowEscapeKey: false,
                                showCancelButton: false,
                                allowOutsideClick: false,
                            }).then((result) => {
                                datatable.ajax.reload()
                            })
                            swal.hideLoading()
                        },
                        error: function(response) {
                            showError(response)
                        }
                    })
                }
            })
        })

        $('#btn_tambah_anggota').click(function(e) {
            e.preventDefault()
            $("#user_id").val(null).change()
            $('#modal_tambah_anggota').modal('show')
            $('#modal_tambah_anggota .kanban_group_id').val($('.home_kanban_group_id').val())
            $('#modal_anggota').modal('hide')
            let url = '{{ route('kanban-anggota.data_create_anggota', ':id') }}'
            url = url.replace(':id', @json($id))
            $("#user_id").select2({
                theme: 'bootstrap4',
                multiple: true,
                placeholder: "Pilih User ...",
                allowClear: true,
                ajax: {
                    url: url,
                    dataType: 'json',
                    type: "GET",
                    data: function(term) {
                        return {
                            term: term
                        }
                    },
                    processResults: function(data) {
                        var transformedData = data.data.map(
                            function(item) {
                                return {
                                    text: item.nama_lengkap,
                                    id: item.id
                                }
                            })
                        return {
                            results: transformedData
                        }
                    },
                }
            })
        })

        $("#form_tambah_anggota").submit(function(e) {
            e.preventDefault()
            const formData = new FormData(this)
            $.ajax({
                type: 'POST',
                url: @json(route('kanban-anggota.store')),
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
                        $('#modal_tambah_anggota').modal('hide')
                        $('#modal_anggota').modal('show')
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showCancelButton: true,
                            allowEscapeKey: false,
                            showCancelButton: false,
                            allowOutsideClick: false,
                        }).then((result) => {
                            swal.hideLoading()
                            renderViewTask()
                            datatable.ajax.reload()
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

  

