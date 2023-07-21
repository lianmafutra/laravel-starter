@foreach ($data->get() as $item)
<div style="border-radius: 10px !important" class="card-comment">
   <img class="img-circle img-sm" src="https://picsum.photos/seed/picsum/200/300"
       alt="User Image">
   <div class="comment-text">
       <span class="username">
            {{ $item->user->nama_lengkap }}
            <div style="margin-top: -10px" class="d-flex flex-row-reverse">
               <div class="">  <a data-id="{{ $item->id }}" data-kanban_id='{{ $item->kanban_id }}' data-komentar="{{ $item->komentar }}"  href="#" class="float-right btn_edit_komentar btn btn-tool">
                  <i class="fas fa-pen"></i></div>
                  <div class="">  <a data-id="{{ $item->id }}" data-kanban_id='{{ $item->kanban_id }}' data-komentar="{{ $item->komentar }}"  href="#" class="float-right btn_hapus_komentar btn btn-tool">
                     <i class="fas fa-trash"></i></div>
               <div class="">  <span class="text-muted float-right"> {{ $item->created_at }}</span></div>
             </div>
        </a>
       </span>
      <h5 style="margin-top: 10px" class="pl-2"> {{ $item->komentar }}</h5>
       {{-- <br> --}}
       {{-- <a target="_blank" href="https://www.africau.edu/images/default/sample.pdf"
           type="button" class="mt-2 btn btn-outline-secondary btn-md">
           <i class="fas fa-file " style="color: #8f8f8f;"></i> File Dokumen
           Revisi</a> --}}
   </div>
</div>
@endforeach
