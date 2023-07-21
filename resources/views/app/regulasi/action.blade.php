<style>
    .dropdown-menu>li>a:hover {
        background-color: rgba(127, 75, 223, 0.189);
    }
</style>
@if ($data->created_by == auth()->user()->id)
    <div class="btn-group-vertical">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            </button>
            <ul class="dropdown-menu">

                <li><a href='{{ route('regulasi.edit', $data) }}' class="btn_edit dropdown-item">Ubah Data</a> </li>
                <div class="dropdown-divider"></div>
                <li><a data-hapus="{{ $data->judul }}" data-url="{{ route('regulasi.destroy', $data->id) }}"
                        class="btn_hapus dropdown-item" href="#">Hapus
                        <form hidden id="form-delete" action="{{ route('regulasi.destroy', $data->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @else
    <center>-</center>
@endif
