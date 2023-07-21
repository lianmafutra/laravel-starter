<style>
    .dropdown-menu>li>a:hover {
        background-color: rgba(127, 75, 223, 0.189);
    }
</style>


   



@if (auth()->user()->getRoleName() == "inspektur")
<div class="btn-group-vertical">
   <div class="btn-group">
       <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
       </button>
       <ul class="dropdown-menu">
           @can('verifikasi pengawasan')
               <a target="_blank" href="#" class="btn_verifikasi  dropdown-item"
                   data-verifikasi="{{ $data->verifikasi_status_ins }}"
                   data-url="{{ route('pengawasan.verifikasi', $data->id) }}">
                   @if ($data->verifikasi_status_ins == 'sudah')
                       Batalkan Verifikasi
                   @else
                       Verifikasi
                   @endif
               </a>
               <div class="dropdown-divider"></div>

               <a data-verifikasi="{{ $data->verifikasi_status_ins }}" target="_blank" href="#"
                   class="btn_tolak dropdown-item" data-url="{{ route('pengawasan.tolak', $data->id) }}">
                   Tolak
               </a>
               <div class="dropdown-divider"></div>
           @endcan


           <a target="_blank" href="{{ route('pengawasan.edit', $data->id) }}"
               class="btn_edit  dropdown-item">Detail/Ubah Data</a>

           <div class="dropdown-divider"></div>
           <li>
               <a data-hapus="{{ $data->surat_tugas_no }}" data-url="{{ route('pengawasan.destroy', $data->id) }}"
                   class="btn_hapus dropdown-item" href="#">Hapus
                   <form hidden id="form-delete" action="{{ route('pengawasan.destroy', $data->id) }}" method="POST">
                       @csrf
                       @method('DELETE')
                   </form>
               </a>
           </li>
       </ul>
   </div>
</div>
@else
<div class="btn-group-vertical">
   <div class="btn-group">
       <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
       </button>
       <ul class="dropdown-menu">
           @can('verifikasi pengawasan')
               <a target="_blank" href="#" class="btn_verifikasi  dropdown-item"
                   data-verifikasi="{{ $data->verifikasi_status_kabid }}"
                   data-url="{{ route('pengawasan.verifikasi', $data->id) }}">
                   @if ($data->verifikasi_status_kabid == 'sudah')
                       Batalkan Verifikasi
                   @else
                       Verifikasi
                   @endif
               </a>
               <div class="dropdown-divider"></div>

               <a data-verifikasi="{{ $data->verifikasi_status_kabid }}" target="_blank" href="#"
                   class="btn_tolak dropdown-item" data-url="{{ route('pengawasan.tolak', $data->id) }}">
                   Tolak
               </a>
               <div class="dropdown-divider"></div>
           @endcan


           <a target="_blank" href="{{ route('pengawasan.edit', $data->id) }}"
               class="btn_edit  dropdown-item">Detail/Ubah Data</a>

           <div class="dropdown-divider"></div>
           <li>
               <a data-hapus="{{ $data->surat_tugas_no }}" data-url="{{ route('pengawasan.destroy', $data->id) }}"
                   class="btn_hapus dropdown-item" href="#">Hapus
                   <form hidden id="form-delete" action="{{ route('pengawasan.destroy', $data->id) }}" method="POST">
                       @csrf
                       @method('DELETE')
                   </form>
               </a>
           </li>
       </ul>
   </div>
</div>
@endif
