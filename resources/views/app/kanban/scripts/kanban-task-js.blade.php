<script>
    
    const kanban_filter_tanggal = {
        tgl_mulai: null,
        tgl_akhir: null
    }
    // datepicker dateline task item
    const tanggal_dateline = $("#tgl_deadline").flatpickr({
        allowInput: true,
        dateFormat: "d/m/Y",
        mode: "range",
        locale: "id",
        onChange: function(dates, dateStr, instance) {
            if (dates.length == 2) {
                var dateStart = instance.formatDate(dates[0], "Y-m-d");
                var dateEnd = instance.formatDate(dates[1], "Y-m-d");
                kanban_filter_tanggal.tgl_mulai = dateStart;
                kanban_filter_tanggal.tgl_akhir = dateEnd;
            }
        }
    })


    //  create task open modal 
    $('#btn_create_task').click(function(e) {
        e.preventDefault()
        clearInput()
        tanggal_dateline.clear()
        $('#detail').text("")
        $('#modal_create_edit_task').modal('show')
        $('#modal_create_edit_task .modal-title').text("Input Task")
        $('#modal_create_edit_task .btn_submit_task').text("Submit")
        $('#modal_create_edit_task .kanban_group_id').val($('.home_kanban_group_id').val())
    })


    // edit Task open modal 
    $(document).on('click', '.btn_edit_task', function() {
        $('#modal_create_edit_task').modal('show')
        $('#modal_create_edit_task .modal-title').text("Edit Task")
        $('#modal_create_edit_task .btn_submit_task').text("Submit")
        $('#modal_create_edit_task .kanban_group_id').val($('.home_kanban_group_id').val())
        let url = '{{ route('kanban.show', ':id') }}'
        url = url.replace(':id', $(this).attr('data-id'))
        $.get(url, function(response) {
            $('#judul').val(response.data.judul)
            $('#detail').text(response.data.detail)
            $('#kanban_task_id').val(response.data.id)
            tanggal_dateline.setDate([new Date(response.data.tgl_mulai), new Date(response.data
                .tgl_akhir)], true)
        })
    })
    
    
    //  submit update & store
    $('#form_create_edit_task').submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        formData.append("tgl_mulai", kanban_filter_tanggal.tgl_mulai);
        formData.append("tgl_akhir", kanban_filter_tanggal.tgl_akhir);
        $.ajax({
            type: 'POST',
            url: @json(route('kanban.store')),
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
                    $('#modal_create_edit_task').modal('hide')
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
                    swal.hideLoading()
                }
            },
            error: function(response) {
                showError(response)
            }
        })
    })
    
    renderViewTask()
    function renderViewTask() {
        $("#kanban_1").empty()
        $("#kanban_2").empty()
        $("#kanban_3").empty()
        $("#kanban_4").empty()
        let url = '{{ route('kanban.view_data_task', ':id') }}'
        url = url.replace(':id', @json($id))
        $.get(url, function(response) {
            $("#kanban_1").append(response.kanban_1)
            $("#kanban_2").append(response.kanban_2)
            $("#kanban_3").append(response.kanban_3)
            $("#kanban_4").append(response.kanban_4)
            $('#kanban_board_nama').text('Kanban / ' + response.data.nama);
            $('#modal_info #created_by').text(response.data.user.nama_lengkap)
            $('#modal_info #created_at').text(response.data.created_at)
            $('#modal_info #btn_hapus_kanban').attr('data-id', response.data.id)
            $('#modal_create_edit #id').val(response.data.id)
            $('#modal_create_edit #nama').val(response.data.nama)
            $('#modal_create_edit #desc').val(response.data.desc)
            $('#btn_anggota .jumlah_anggota').html("Anggota ( " + response.data.jumlah_anggota + " )")
            $('.home_kanban_group_id').val(response.data.id)

            console.log(response)
        })
    }
    $(document).on('click', '.btn_verifikasi_card', function() {
        alert($(this).attr('title'))
    })
</script>
