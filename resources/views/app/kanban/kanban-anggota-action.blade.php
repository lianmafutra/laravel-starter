@if ($kanbangroup->created_by != $data->user->id &&  $data->user->id != $inspektur->id)
<button data-id="{{ route('kanban-anggota.destroy', $data->user->kanban_anggota->id ) }}"
    class="btn_hapus_anggota btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
@endif

