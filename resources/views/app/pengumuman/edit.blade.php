@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@section('header')
    <x-header title="Edit Data Pengumuman"></x-header>
@endsection
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <x-input id='' label='Nama Tim Kerja' required=true />
                        <x-select2_multi id="anggota" label="Anggota" required="true" placeholder="Pilih Anggota">
                           
                            <option value="1"> Hj. Tin Suhartini</option>
                            <option value="2">Yunita Indrawati</option>
                            <option value="2"> Siska Octora</option>
                       
                        </x-select2_multi>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="" class="button btn_submit float-right button btn btn-primary">Simpan</a>
            </div>
            {{-- <div class="card-footer">
                  <button type="submit" class="float-right btn_submit btn btn-primary">Simpan</button>
               </div> --}}
        </div>
    </div>
@endsection
@push('js')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
       $('.select2bs4').select2({
            theme: 'bootstrap4',
        })
        $('.btn_submit').click(function(e) {
            e.preventDefault();
            Swal.fire({
                icon: 'success',
                title: "Success",
                html: 'Berhasil Menyimpan Data',
                showCancelButton: true,
                allowEscapeKey: false,
                showCancelButton: false,
                allowOutsideClick: false,
            }).then((result) => {
                window.location = @json(route('time_kerja.index'))
            })
        });
    </script>
@endpush
