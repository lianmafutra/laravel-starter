@extends('admin.layouts.master')
@push('css')
@endpush
@section('header')
    <x-header title=""></x-header>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="#" id="btn_create_kanban_group" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Buat Kanban</a>
                {{-- <a href="#" id="btn_arsip_kanban" class="btn btn-sm btn-secondary"><i class="fas fa-archive"></i> Arsip</a> --}}
            </div>
            <div class="card-body">
                <div id="kanban_group_list" class="row">
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    @include('app.kanban_group.modal-create-edit', ['modal_create_edit'])
    <script>
        $('#btn_create_kanban_group').click(function(e) {
            e.preventDefault();
            clearInput()
            $('#modal_create_edit').modal('show')
            $('.modal-title').text('Tambah Data')
        })
        getKanbanBoardLIst()

        function getKanbanBoardLIst() {
            $.get(@json(route('kanban-group.list')), function(response) {
                $('#kanban_group_list').empty();
                console.log(response)
                response.data.forEach(element => {
                    let url = ('{{ route('kanban-group.show', ':id') }}')
                    url = url.replace(':id', element.id)
                    $data = `<div class="col-lg-3 col-6">
                     <div class="small-box bg-info">
                         <div style="padding-bottom: 25px" class="inner">
                           <span class="float-right badge badge-success">${element.bidang.nama}</span>
                             <h4>${element.nama}</h4>
                             <p>${element.desc}</p>
                             <span class="float-left badge badge-warning">${element.kanban.length } Task</span>
                         </div>
                         <div class="icon">
                             <i class="ion ion-bag"></i>
                         </div>
                         <a href="${url}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>`;
                    $("#kanban_group_list").append($data)
                })
            })
        }
        $("#form_modal_create_edit").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: @json(route('kanban-group.store')),
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
                        this.reset()
                        $('#modal_create_edit').modal('hide')
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showCancelButton: true,
                            allowEscapeKey: false,
                            showCancelButton: false,
                            allowOutsideClick: false,
                        }).then((result) => {
                            swal.hideLoading()
                            datatable.ajax.reload()
                        })
                        swal.hideLoading()
                        getKanbanBoardLIst()
                    }
                },
                error: function(response) {
                    showError(response)
                }
            });
        });
    </script>
@endpush
