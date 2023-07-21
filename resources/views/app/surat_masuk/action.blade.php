<style>
    .dropdown-menu>li>a:hover {
        background-color: rgba(127, 75, 223, 0.189);
    }
</style>
<div class="btn-group-vertical">
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        </button>
        <ul class="dropdown-menu">
          
                <li><a href='{{ route('surat_masuk.edit', $data) }}' class="btn_edit dropdown-item">Detail</a> </li>
       
            @can('surat_masuk_destroy')
                <div class="dropdown-divider"></div>
                <li><a data-hapus="{{ $data->no_surat }}" data-url="{{ route('surat_masuk.destroy', $data->id) }}"
                        class="btn_hapus dropdown-item" href="#">Hapus
                        <form hidden id="form-delete" action="{{ route('surat_masuk.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </a> </li>
            @endcan

        </ul>
    </div>
</div>
