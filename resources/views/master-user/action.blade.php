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
            <li><a data-url='{{ route('master-user.edit', $data->id) }}' data-update='{{ route('master-user.update', $data->id) }}'  href="#" class="btn_edit dropdown-item" >Ubah Data</a> </li>
            <div class="dropdown-divider"></div>
            <li><a data-name="{{ $data->username }}" data-id="{{ $data->id }}"  href="#" class="btn_reset_password dropdown-item">Reset Password</a></li>
        </ul>
    </div>
</div>
</td>
</tr>
