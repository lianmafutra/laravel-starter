@extends('admin.layouts.master')
@push('css')
    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
@endpush
<style>
    .filepond--drop-label {
        color: #4c4e53;
    }

    .filepond--label-action {
        text-decoration-color: #babdc0;
    }

    .filepond--panel-root {
        border-radius: 2em;
        background-color: #edf0f4;
        height: 1em;
    }

    .filepond--item-panel {
        background-color: #595e68;
    }

    .filepond--drip-blob {
        background-color: #7f8a9a;
    }
</style>
@section('header')
    <x-header title="Jadwal Aktifitas"></x-header>
@endsection
@section('content')
    <div class="col-lg-12">

    </div>
@endsection
@push('js')
    <script></script>
@endpush
