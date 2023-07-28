<div style=" gap:5px;" class="d-flex justify-content-center">
    <a href="{{ route('permission.edit', $data->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Data"
        class="btn btn-sm btn-primary" data-id=""><i class="fas fa-pencil-alt"></i></a>
    @if ($data->name != 'ungroup')
        <a href="#" data-action="{{ $data->name }}" data-url="{{ route('permission-group.destroy', $data->id) }}"
            data-toggle="tooltip" data-placement="bottom" title="Delete Data" class="btn btn-sm btn-danger btn_delete"
            data-iddata-name=""><i class="fas fa-trash"></i></a>
    @endif
</div>
