<div class="d-flex flex-row">
    <div class="p-2">
        <a href="{{ $data->getFileUrlAttribute() }}" target="_blank" class="btn_preview_file_task btn btn-secondary"><i class="fas fa-eye"></i></a>
    </div>
    <div class="p-2">
        <a data-id="{{ route('file-task.destroy', $data->id) }}" class="btn_hapus_file_task btn btn-danger"><i
                class="fas fa-trash-alt"></i></a>

    </div>

</div>


<script>
  
</script>
