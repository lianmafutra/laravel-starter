<div class="modal fade" id="modal_anggota">
    <div class="modal-dialog modal-md modal-dialog-bottom">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">List Anggota</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-header">
                <a href="#" id="btn_tambah_anggota" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>
                    Tambah Anggota</a>
            </div>
            <div class="modal-body">
                <x-datatable id="datatable" :th="['No', 'Foto', 'Nama', 'Bidang', 'Action']"></x-datatable>
            </div>
        </div>
    </div>
</div>
<script>
    let url = '{{ route('kanban-anggota.show', ':id') }}'
    url = url.replace(':id', @json($id))
    let datatable = $("#datatable").DataTable({
        serverSide: true,
        processing: true,
        ordering: true,
        order: [
            [4, 'desc']
        ],
        bAutoWidth: false,
        fixedColumns: true,
        ajax: url,
        columns: [{
                data: "DT_RowIndex",
                orderable: false,
                searchable: false,
                width: '1%'
            },
            {
                data: 'foto',
                width: '10%',
                orderable: false,
                searchable: false
            },
            {
                data: 'nama_lengkap',
                orderable: true,
            },
            {
                data: 'bidang',
                nama: 'bidang.nama',
                orderable: true,
            },
            {
                data: "action",
                orderable: false,
                searchable: false,
            },
        ]
    })
</script>
