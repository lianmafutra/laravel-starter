<script>
    $('#btn_hapus_kanban').click(function(e) {
            e.preventDefault();
            let url2 = ('{{ route('kanban-group.destroy', ':id') }}')
            url2 = url2.replace(':id', $(this).attr('data-id'))
            Swal.fire({
                title: 'Hapus Kanban ?',
                text: "Perhatian, Menghapus kanban ini akan mengahpus seleuruh Task yang ada, Apakah anda yakin ?",
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
                        url: url2,
                        beforeSend: function() {
                            showLoading()
                        },
                        success: (response) => {
                            Swal.fire({
                                icon: 'Deleted !',
                                text: 'Berhasil Hapus Kanban',
                                title: response.message,
                                showCancelButton: true,
                                allowEscapeKey: false,
                                showCancelButton: false,
                                allowOutsideClick: false,
                            }).then((result) => {
                                window.location.replace(@json(route('kanban-group.index')))
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
</script>