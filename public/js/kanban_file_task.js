$('#form_upload_file_task').submit(function(e) {
   e.preventDefault();
   const formData = new FormData(this);
   $.ajax({
       type: 'POST',
       url: @json(route('file-task.store')),
       data: formData,
       cache: false,
       contentType: false,
       processData: false,
       dataType: 'json',
       beforeSend: function() {
           showLoading()
       },
       success: (response) => {
           if (response) {
               let filePond = FilePond.find(document.querySelector('#file_task'));
               if (filePond != null) {
                   filePond.removeFiles();
               }
               $('#modal_upload_file_task').modal('hide')
               Swal.fire({
                   icon: 'success',
                   title: response.message,
                   showCancelButton: true,
                   allowEscapeKey: false,
                   showCancelButton: false,
                   allowOutsideClick: false,
               }).then((result) => {
                   swal.hideLoading()

                   let url = '{{ route('kanban.show', ':id') }}';
                   url = url.replace(':id', $('#modal_detail_task .kanban_id').val());

                   $.get(url, function(response) {
                       console.log(response)
                       $('#modal_detail_task .file_task').val(response.data.file_task)

                       getDatatableFileTask()
                       $('#datatable_file_task').DataTable().ajax.reload();
                   })




               })
               swal.hideLoading()
           }
       },
       error: function(response) {
           showError(response)
       }
   })
})