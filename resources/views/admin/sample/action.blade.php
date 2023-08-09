<div style=" gap:5px;" class="d-flex justify-content-center">
   <a href="{{ route('sample-crud.edit', $data->hashId) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Data" class="btn btn-sm btn-primary btn-edit"
       data-id=""><i class="fas fa-pencil-alt"></i></a>
   <a href="#" data-url="{{ route('sample-crud.destroy', $data->hashId) }}" data-action="{{ $data->title }}" data-toggle="tooltip" data-placement="bottom" title="Delete Data" class="btn btn-sm btn-danger btn_delete"><i class="fas fa-trash"></i></a>
</div>
