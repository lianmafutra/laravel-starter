<div style=" gap:5px;" class="d-flex justify-content-center">
  
   <a href="#" data-group="{{ $data->permission_group_id }}" data-action="{{ $data->name }}" data-url="{{ route('permission.show', $data->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Data" class="btn btn-sm btn-primary btn_edit"
       data-id=""><i class="fas fa-pencil-alt"></i></a>
   <a href="#" data-action="{{ $data->name }}" data-url="{{ route('permission.destroy', $data->id) }}" data-toggle="tooltip" data-placement="bottom" title="Delete Data" class="btn btn-sm btn-danger btn_delete" data-id="" data-name=""><i class="fas fa-trash"></i></a>
</div>
