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
            <li><a data-url='{{ route('master-user.edit', $data->id) }}' href="#" class="btn_edit dropdown-item">
                    <i class="fas fa-edit"></i> Edit</a> </li>
            @if ($data->status == 'NONAKTIF')
                @php
                    $text_status = 'Aktifkan';
                    $status = 'AKTIF';
                @endphp
            @elseif ($data->status == 'AKTIF')
                @php
                    $text_status = 'Nonaktifkan';
                    $status = 'NONAKTIF';
                @endphp
            @endif
            <div class="dropdown-divider"></div>
            <li><a data-status="{{ $text_status }}" data-user="{{ $data->username }}"
                    data-url="{{ route('user.destroy', $data->id) }}" class="btn_nonaktifkan dropdown-item"
                    href="#"><i class="fas fa-user-slash"></i> {{ $text_status }}
                    <form hidden id="form-nonaktifkan" action="{{ route('master-user.active-status', $data->id) }}"
                        method="POST"> @csrf
                        @method('PUT')
                        <input name="id" hidden value="{{ $data->id }}">
                        <input name="status" hidden value="{{ $status }}">
                    </form>
                </a> </li>
            <div class="dropdown-divider"></div>
            <li><a data-url='{{ route('user.edit', $data->id) }}' data-name="{{ $data->username }}"
                    data-id="{{ $data->id }}" href="#" class="btn_reset_password dropdown-item">
                    <i class="fas fa-lock-open"></i> Reset
                    Password</a> </li>
            <div class="dropdown-divider"></div>
            <li><a data-url='{{ route('user.edit', $data->id) }}' data-name="{{ $data->username }}"
                    data-id="{{ $data->id }}" href="{{ route('master-user.show', $data->id) }}" class="dropdown-item">
                    <i class="fas fa-lock-open"></i> Detail </a> </li>
            <div class="dropdown-divider"></div>
            <li><a data-hapus="{{ $data->user }}" data-url="{{ route('master-user.destroy', $data->id) }}"
                    class="btn_delete dropdown-item" href="#"> <i class="fas fa-trash-alt"></i> Delete
                    <form hidden id="form-delete" action="{{ route('master-user.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </a> </li>
        </ul>
    </div>
</div>
