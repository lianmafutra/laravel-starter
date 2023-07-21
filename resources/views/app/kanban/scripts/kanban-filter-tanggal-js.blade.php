<script>


    $('#btn_filter_tanggal_refresh').click(function(e) {
        e.preventDefault()
        location.reload();
    })


     const tanggal = flatpickr("#tgl_filter_kanban", {
        allowInput: true,
        dateFormat: "d-m-Y",
        mode: "range",
        locale: "id",
    })

</script>
